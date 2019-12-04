<?php

namespace App\Controller;
use App\Model\Candidat;
use App\Model\Entreprise;
use App\Model\Utilisateur;
use App\Model\Repository\CandidatRepository;
use App\Model\Repository\EntrepriseRepository;
use App\Model\Repository\UtilisateurRepository;

class ProfilController
{
    public static function mon_profil($base) {
        if(isset($_SESSION['type'])){
            if($_SESSION['type'] === 'Candidat'){
                $userRepository = new CandidatRepository($base);
            } else if(($_SESSION['type']) === 'Entreprise'){
                $userRepository = new EntrepriseRepository($base);
            }

            if (isset($_POST['email']) && isset($_POST['nom']) && isset($_POST['tel'])) {
                if(isset($_POST['prenom'])){
                    $user = new Candidat([
                        'mail' => $_POST['email'],
                        'mdp' => 'ui',
                        'nom' => $_POST['nom'],
                        'tel' => $_POST['tel'],
                        'prenom' => $_POST['prenom'],
                        'civilite' => 'ui'
                    ]);
                } else if(isset($_POST['description'])){
                    $user = new Entreprise([
                        'mail' => $_POST['email'],
                        'mdp' => 'ui',
                        'nom' => $_POST['nom'],
                        'tel' => $_POST['tel'],
                        'adresse' => $_POST['adresse'],
                        'siteInternet' => $_POST['siteInternet'],
                        'description' => $_POST['description']
                    ]);
                }
                $result=$userRepository->modify($_SESSION['id'],$user);
                if($result){
                    //envoi d'un message
                    $typeAlert="success";
                    $messageAlert="Votre profil a bien été modifié.";
                    require __DIR__ . '/../View/messages.php';
                }else{
                    //envoi d'un message
                    $typeAlert="danger";
                    $messageAlert="Une erreur s'est produite. Veuillez nous en excuser.";
                    require __DIR__ . '/../View/messages.php';
                }
            }

            $user = $userRepository->find($_SESSION['id']);
            if($user===null){
                //envoi d'un message
                $typeAlert="danger";
                $messageAlert="Cet utilisateur n'existe pas";
                require __DIR__ . '/../View/messages.php';
            }else{
                require __DIR__ . '/../View/Profil/mon_profil_'.strtolower($_SESSION['type']).'.php';
            }
        }else{
            //envoi d'un message
            $typeAlert="danger";
            $messageAlert="Vous n'avez pas accès à cette page.";
            require __DIR__ . '/../View/messages.php';
        }


    }
}