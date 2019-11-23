<?php


namespace App\Controller;


use App\Model\Candidat;
use App\Model\Entreprise;
use App\Model\Utilisateur;
use App\Model\Repository\CandidatRepository;
use App\Model\Repository\EntrepriseRepository;
use App\Model\Repository\UtilisateurRepository;


class ConnexionController
{
    public static function connexion($base, $class){
        if (isset($_SESSION['id'])) {
            //envoi d'un message
            $typeAlert="warning";
            $messageAlert="Vous êtes déjà connecté";
            require __DIR__ . '/../View/messages.php';
        } else {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $userRepository = null;
                if($class=='Candidat'){
                    $userRepository = new CandidatRepository($base);
                }elseif($class=='Entreprise'){
                    $userRepository = new EntrepriseRepository($base);
                }elseif($class=='Utilisateur'){
                    $userRepository = new UtilisateurRepository($base);
                }
                if ($userRepository->login($_POST['email'], $_POST['password'], $class)) {
                    //envoi d'un message
                    $typeAlert="success";
                    $messageAlert="Vous êtes connecté.";
                    require __DIR__ . '/../View/messages.php';
                    //appel le fichier index.php
                    header('Location: /index.php');
                } else {
                    //envoi d'un message
                    $typeAlert="danger";
                    $messageAlert="Ce compte n'existe pas !";
                    require __DIR__ . '/../View/messages.php';
                }
            }
            require __DIR__ . '/../View/Connexion/connexion.php';
        }
    }


    public static function inscription($base, $class) {
        if (isset($_SESSION['id'])) {
            //envoi d'un message
            $typeAlert="warning";
            $messageAlert="Vous êtes déjà connecté";
            require __DIR__ . '/../View/messages.php';
        } else {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                if(isset($_POST['nom']) && isset($_POST['tel'])){
                    $user=null;
                    if($class=='Candidat'){
                        if(isset($_POST['prenom']) && isset($_POST['civilite'])){
                            $user = new Candidat([
                                'mail' => $_POST['email'],
                                'mdp' => password_hash($_POST['password'], PASSWORD_ARGON2I),
                                'nom' => $_POST['nom'],
                                'tel' => $_POST['tel'],
                                'prenom' => $_POST['prenom'],
                                'civilite' => $_POST['civilite']
                            ]);
                        }
                    }elseif($class=='Entreprise'){
                        if(isset($_POST['siteInternet']) && isset($_POST['description']) && isset($_POST['ville']) && isset($_POST['cp']) ){
                            $ville=null;
                            if($_POST['ville']!=null && $_POST['cp']!=null){
                                $ville=$_POST['ville'].'('.$_POST['cp'].')';
                            }
                            $user = new Entreprise([
                                'mail' => $_POST['email'],
                                'mdp' => password_hash($_POST['password'], PASSWORD_ARGON2I),
                                'nom' => $_POST['nom'],
                                'tel' => $_POST['tel'],
                                'adresse' => $ville,
                                'siteInternet' => $_POST['siteInternet'],
                                'description' => $_POST['description']
                            ]);
                        }
                    }elseif($class=='Utilisateur'){
                        $user = new Utilisateur([
                            'mail' => $_POST['email'],
                            'mdp' => password_hash($_POST['password'], PASSWORD_ARGON2I),
                            'nom' => $_POST['nom'],
                            'tel' => $_POST['tel']
                        ]);
                    }else{
                        //envoi d'un message
                        $typeAlert="danger";
                        $messageAlert="Une erreur s'est produite lors de la création de votre profil.";
                        require __DIR__ . '/../View/messages.php';
                    }
                    $userRepository = null;
                    if($class=='Candidat'){
                        $userRepository = new CandidatRepository($base);
                    }elseif($class=='Entreprise'){
                        $userRepository = new EntrepriseRepository($base);
                    }elseif($class=='Utilisateur'){
                        $userRepository = new UtilisateurRepository($base);
                    }
                    if ($userRepository->exists($user) == false) {
                        $userRepository->add($user);
                        $userRepository->login($user->getMail(),$_POST['password'], $user->getClassName());
                        //envoi d'un message
                        $typeAlert="success";
                        $messageAlert="Votre compte a bien été créé.<br>Bienvenu ";
                        if(isset($_SESSION['nom'])){
                            $messageAlert.=$_SESSION['nom'];
                        }
                        $messageAlert.=" !";
                        require __DIR__ . '/../View/messages.php';
                    } else {
                        //envoi d'un message
                        $typeAlert="danger";
                        $messageAlert="Ce compte existe déjà !<br>Veuillez vous connecter ou utiliser un autre compte.";
                        require __DIR__ . '/../View/messages.php';
                    }
                }
            }
         require __DIR__ . '/../View/Connexion/inscription_'.strtolower($class).'.php';
        }
    }

    public static function deconnexion() {
        session_destroy();
        $_SESSION = null;
        require __DIR__ . '/../View/Connexion/deconnexion.php';
    }
}
