<?php


namespace App\Model\Repository;

use App\Model\Entreprise;
use PDO;


class EntrepriseRepository extends UtilisateurRepository
{
    //retourne l’oject du personnage hydrater ainsi que remplir mes sessions
    //Cette fonction renvoie soit false, soit l’object du personnage.
    public function find(int $id) {
        //Je cherche un personnage par rapport à son id, et si il existe je lui retourne l’oject hydrater
        $response = $this->base->prepare('SELECT *
                                                FROM entreprises
                                                INNER JOIN utilisateurs ON entreprises.id = utilisateurs.id
                                                WHERE utilisateurs.id = :id;');
        $response->bindValue(':id', $id);
        $result = $response->execute();
        if ($result == true) {
            if ($user_temp = $response->fetch()){
                $user = new Entreprise($user_temp);
                return $user;
            }
            return false;
        }

        return false;
    }

    public function findAll()
    {
    	$listeEntreprises=array();
    	$query = $this->base->query('SELECT utilisateurs.id, mail, mdp, nom, tel, siteInternet, description, adresse  FROM 
    		utilisateurs INNER JOIN entreprises ON utilisateurs.id = entreprises.id');
    	$resultats = $query->fetchAll(PDO::FETCH_ASSOC);
    	foreach ($resultats as $resultat) {
    		array_push($listeEntreprises,new Entreprise($resultat));
    	}
    	return $listeEntreprises;
    }




}
