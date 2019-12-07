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


                // les fichiers
                // Photo de Profil
                if(isset($_FILES['PP']) && $_FILES['PP']['name']!="")
                {
                    $dossier = 'DocumentsUtilisateurs/PhotoDeProfil/';
                    $fichier = basename($_FILES['PP']['name']);
                    $taille_maxi = 100000;
                    $taille = filesize($_FILES['PP']['tmp_name']);
                    $extensions = array('.png', '.jpg', '.jpeg');
                    $extension = strrchr($_FILES['PP']['name'], '.');
                    //Verification du fichier uploadé
                    if(!in_array($extension, $extensions)) //Verification de l'extention
                    {
                        $erreur = 'Photo de profil : Vous devez uploader un fichier de type png, jpg ou jpeg';
                        //envoi d'un message
                        $typeAlert="warning";
                        $messageAlert="<b>Photo de profil :</b><br>Vous devez uploader un fichier de type png, jpg ou jpeg";
                        require __DIR__ . '/../View/messages.php';
                    }
                    if($taille>$taille_maxi) //Verification de la taille
                    {
                        $erreur = 'Photo de profil : Le fichier est trop gros...';
                        //envoi d'un message
                        $typeAlert="warning";
                        $messageAlert="<b>Photo de profil :</b><br>Le fichier est trop gros...";
                        require __DIR__ . '/../View/messages.php';
                    }
                    if(!isset($erreur))
                    {
                        //On remplace les caractères spéciaux
                        $fichier = strtr($fichier,
                            'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

                        $temp = explode(".", $_FILES["PP"]["name"]);
                        $newfilename = $_SESSION['id'] . '.' . end($temp);


                        if(move_uploaded_file($_FILES["PP"]["tmp_name"], $dossier . $newfilename))
                        {
                            //echo 'Photo de profil : Upload effectué avec succès !';
                            //envoi d'un message
                            $typeAlert="success";
                            $messageAlert="<b>Photo de profil :</b><br>Upload effectué avec succès !";
                            require __DIR__ . '/../View/messages.php';
                        }
                        else
                        {
                            //echo 'Photo de profil : Echec de l\'upload !';
                            //envoi d'un message
                            $typeAlert="danger";
                            $messageAlert="<b>Photo de profil :</b><br>Echec de l'upload !";
                            require __DIR__ . '/../View/messages.php';
                        }
                    }
                }

                // CV
                if(isset($_FILES['CV']) && $_FILES['CV']['name']!="")
                {
                    $dossier = 'DocumentsUtilisateurs/CV/';
                    $fichier = basename($_FILES['CV']['name']);
                    $taille_maxi = 100000;
                    $taille = filesize($_FILES['CV']['tmp_name']);
                    $extensions = array('.png', '.pdf', '.jpg', '.jpeg');
                    $extension = strrchr($_FILES['CV']['name'], '.');
                    //Verification du fichier uploadé
                    if(!in_array($extension, $extensions)) //Verification de l'extention
                    {
                        $erreur = 'CV : Vous devez uploader un fichier de type pdf, png, jpg ou jpeg';
                        //envoi d'un message
                        $typeAlert="warning";
                        $messageAlert="<b>CV :</b><br>Vous devez uploader un fichier de type pdf, png, jpg ou jpeg";
                        require __DIR__ . '/../View/messages.php';
                    }
                    if($taille>$taille_maxi) //Verification de la taille
                    {
                        $erreur = 'CV : Le fichier est trop gros...';
                        //envoi d'un message
                        $typeAlert="warning";
                        $messageAlert="<b>CV :</b><br>Le fichier est trop gros...";
                        require __DIR__ . '/../View/messages.php';
                    }
                    if(!isset($erreur))
                    {
                        //On remplace les caractères spéciaux
                        $fichier = strtr($fichier,
                            'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

                        $temp = explode(".", $_FILES["CV"]["name"]);
                        $newfilename = $_SESSION['id'] . '.' . end($temp);


                        if(move_uploaded_file($_FILES["CV"]["tmp_name"], $dossier . $newfilename))
                        {
                            //echo 'CV : Upload effectué avec succès !';
                            //envoi d'un message
                            $typeAlert="success";
                            $messageAlert="<b>CV :</b><br>Upload effectué avec succès !";
                            require __DIR__ . '/../View/messages.php';
                        }
                        else
                        {
                            //echo 'CV : Echec de l\'upload !';
                            //envoi d'un message
                            $typeAlert="danger";
                            $messageAlert="<b>CV :</b><br>Echec de l'upload !";
                            require __DIR__ . '/../View/messages.php';
                        }
                    }
                }

                // Lettre de motivation
                if(isset($_FILES['LM']) && $_FILES['LM']['name']!="")
                {
                    $dossier = 'DocumentsUtilisateurs/LettreMotivation/';
                    $fichier = basename($_FILES['LM']['name']);
                    $taille_maxi = 100000;
                    $taille = filesize($_FILES['LM']['tmp_name']);
                    $extensions = array('.png', '.pdf', '.jpg', '.jpeg');
                    $extension = strrchr($_FILES['LM']['name'], '.');
                    //Verification du fichier uploadé
                    if(!in_array($extension, $extensions)) //Verification de l'extention
                    {
                        $erreur = 'Lettre de motivation : Vous devez uploader un fichier de type pdf, png, jpg ou jpeg';
                        //envoi d'un message
                        $typeAlert="warning";
                        $messageAlert="<b>Lettre de motivation :</b><br>Vous devez uploader un fichier de type pdf, png, jpg ou jpeg";
                        require __DIR__ . '/../View/messages.php';
                    }
                    if($taille>$taille_maxi) //Verification de la taille
                    {
                        $erreur = 'Lettre de motivation : Le fichier est trop gros...';
                        //envoi d'un message
                        $typeAlert="warning";
                        $messageAlert="<b>Lettre de motivation :</b><br>Le fichier est trop gros...";
                        require __DIR__ . '/../View/messages.php';
                    }
                    if(!isset($erreur))
                    {
                        //On remplace les caractères spéciaux
                        $fichier = strtr($fichier,
                            'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

                        $temp = explode(".", $_FILES["LM"]["name"]);
                        $newfilename = $_SESSION['id'] . '.' . end($temp);


                        if(move_uploaded_file($_FILES["LM"]["tmp_name"], $dossier . $newfilename))
                        {
                            //echo 'Lettre de motivation : Upload effectué avec succès !';
                            //envoi d'un message
                            $typeAlert="success";
                            $messageAlert="<b>Lettre de motivation :</b><br>Upload effectué avec succès !";
                            require __DIR__ . '/../View/messages.php';
                        }
                        else
                        {
                            //echo 'Lettre de motivation : Echec de l\'upload !';
                            //envoi d'un message
                            $typeAlert="danger";
                            $messageAlert="<b>Lettre de motivation :</b><br>Echec de l'upload !";
                            require __DIR__ . '/../View/messages.php';
                        }
                    }
                }

                //fin des fichiers


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