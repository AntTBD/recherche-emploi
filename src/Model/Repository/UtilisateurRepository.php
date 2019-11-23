<?php


namespace App\Model\Repository;
use App\Model\Utilisateur;
use App\Model\Candidat;
use App\Model\Entreprise;


class UtilisateurRepository
{
    protected $base;

    public function __construct(Repository $base){
        $this->base = $base;
    }

    //on insert les données dans la table (trader_demander dans inscription.php)
    public function add(Utilisateur $user)
    {
        //Le $this->base conrrespond a notre object PDO passer dans le __construct pour rappel.
        $response = $this->base->prepare('INSERT INTO utilisateurs (mail, mdp, nom, tel) VALUES(:mail, :mdp, :nom, :tel);');
        $response->bindValue(':mail', $user->getMail());
        $response->bindValue(':mdp', $user->getMdp());
        $response->bindValue(':nom', $user->getNom());
        $response->bindValue(':tel', $user->getTel());

        $response->execute();

        $user->hydrate(['id' => $this->base->lastInsertId()]);

        if( $user instanceof Candidat){
            $resp = $this->base->prepare('INSERT INTO candidats(id, prenom, civilite) VALUES(:id, :prenom, :civilite);');
            $resp->bindValue(':id', $user->getId());
            $resp->bindValue(':prenom', $user->getPrenom());
            $resp->bindValue(':civilite', $user->getCivilite());

            $resp->execute();
            $resp = null;
        } else if( $user instanceof Entreprise){
            $resp = $this->base->prepare('INSERT INTO entreprises(id, siteInternet, description, adresse) VALUES(:id, :siteInternet, :description, :adresse);');
            $resp->bindValue(':id', $user->getId());
            $resp->bindValue(':siteInternet', $user->getSiteInternet());
            $resp->bindValue(':description', $user->getDescription());
            $resp->bindValue(':adresse', $user->getAdresse());

            $resp->execute();
            $resp = null;
        }
    }


    //Ici nous allons coté en bdd voir si il y des personnages avec le même nom
    //Le type boolean (http://php.net/manual/fr/language.types.boolean.php)
    //va nous permettre de que notre fonction renvoie true ou false
    //suivant si il y a un résultat dans la base ou non.
    public function exists(Utilisateur $user) {
        $response = $this->base->prepare('SELECT COUNT(*) FROM utilisateurs WHERE mail = :mail;');
        $response->bindValue(':mail', $user->getMail());
        $response->execute();

        return (bool) $response->fetchColumn();
    }
    //Une fonction login qui va me servir à comparer les mots de passe
    //pour me connecter pour determiner si je remplis la $_SESSION
    public function findByEmail(string $mail) {
        $response = $this->base->prepare('SELECT * FROM utilisateurs WHERE mail = :mail;');
        $response->bindValue(':mail', $mail);
        $response->execute();

        return $response->fetch();
    }

    //fonction login
    public function login(string $mail, string $mdp, string $typeUtilisateur) {
        //Si jamais il ne trouve pas le nom ou bien le mot de passe ne correspond pas je retourne false.
        if ($result = $this->findByEmail($mail)) {
            //Ici je test le resultat de findByName pour voir si il existe puis si c’est le cas je fais
            // un password_verify http://php.net/manual/fr/function.password-verify.php
            if (password_verify($mdp, $result['mdp'])) {
                //return true;
                //au lieu qu’il me retourne true, il me retourne l’oject du personnage hydrater ainsi que remplir mes sessions
                if($user = $this->find($result['id'])){
                    if($user->getClassName()==$typeUtilisateur){
                        $_SESSION['id'] = $user->getId();
                        $_SESSION['nom'] =  $user->getNom();
                        $_SESSION['type'] =  $user->getClassName();

                        //vu que j'utilise $_SESSION on rajoute session_start(); dans le header
                        return $user;
                    }
                    return false;
                }
              return false;
            }
            return false;
        }
        return false;
    }

    //retourne l’oject du personnage hydrater ainsi que remplir mes sessions
    //Cette fonction renvoie soit false, soit l’object du personnage.
    public function find(int $id) {
        //Je cherche un personnage par rapport à son id, et si il existe je lui retourne l’oject hydrater
        $response = $this->base->prepare('SELECT * FROM utilisateurs WHERE id = :id;');
        $response->bindValue(':id', $id);
        $result = $response->execute();
        if ($result == true) {
            if ($user_temp = $response->fetch()){
                $user = new Utilisateur($user_temp);
                return $user;
            }
            return false;
        }

        return false;

    }
}
