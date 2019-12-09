<?php


namespace App\Controller;

use App\Model\Postuler;
use App\Model\Repository\PostulerRepository;

class PostulerController
{
    public static function addPostuler($base){
        if(isset($_SESSION['id']) && isset($_SESSION['type']) && $_SESSION['type']==="Candidat"){
            if(isset($_GET['id'])){
                $postulerRepository = new PostulerRepository($base);
                $res = $postulerRepository->exists($_GET['id'], $_SESSION['id']);
                if(!$res){
                    $result = $postulerRepository->add($_GET['id'], $_SESSION['id']);
                    header("Location: /index.php/afficherAnnonce?id=".$_GET['id']."&successAddPostuler=true");
                }else{

                    header("Location: /index.php/afficherAnnonce?id=".$_GET['id']."&successAddPostuler=dejaPostule");

                }
            }else{
                //envoi d'un message
                $typeAlert = "danger";
                $messageAlert = "Vous devez selectionner une annonce avant de postuler.";
                require __DIR__ . '/../View/messages.php';
            }
        }else{
            //envoi d'un message
            $typeAlert = "danger";
            $messageAlert = "Vous devez etre connecté en tant que candidat pour accéder à cette page.";
            require __DIR__ . '/../View/messages.php';
        }
    }

    public static function deletePostuler($base){
        if(isset($_SESSION['id']) && isset($_SESSION['type']) && $_SESSION['type']==="Candidat"){
            if(isset($_GET['id'])){
                $postulerRepository = new PostulerRepository($base);
                $res = $postulerRepository->exists($_GET['id'], $_SESSION['id']);
                if($res){
                    $result = $postulerRepository->delete($_GET['id'], $_SESSION['id']);
                    header("Location: /index.php/afficherAnnonce?id=".$_GET['id']."&successDeletePostuler=true");
                }else{
                    header("Location: /index.php/afficherAnnonce?id=".$_GET['id']."&successDeletePostuler=pasPostule");
                }
            }else{
                //envoi d'un message
                $typeAlert = "danger";
                $messageAlert = "Vous devez selectionner une annonce avant de ne plus y postuler.";
                require __DIR__ . '/../View/messages.php';
            }
        }else{
            //envoi d'un message
            $typeAlert = "danger";
            $messageAlert = "Vous devez etre connecté en tant que candidat pour accéder à cette page.";
            require __DIR__ . '/../View/messages.php';
        }

    }
}
