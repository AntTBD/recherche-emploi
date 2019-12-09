<?php


namespace App\Controller;

use App\Model\Favoris;
use App\Model\Repository\FavorisRepository;

class FavorisController
{
    public static function addFavoris($base){
        if(isset($_SESSION['id']) && isset($_SESSION['type']) && $_SESSION['type']==="Candidat"){
            if(isset($_GET['id'])){
                $favorisRepository = new FavorisRepository($base);
                $res = $favorisRepository->exists($_GET['id'], $_SESSION['id']);
                if(!$res){
                    $result = $favorisRepository->add($_GET['id'], $_SESSION['id']);
                    header("Location: /index.php/afficherAnnonce?id=".$_GET['id']."&successAddFavoris=true");
                }else{

                    header("Location: /index.php/afficherAnnonce?id=".$_GET['id']."&successAddFavoris=dejaPostule");

                }
            }else{
                //envoi d'un message
                $typeAlert = "danger";
                $messageAlert = "Vous devez selectionner une annonce avant de la mettre dans vos favoris.";
                require __DIR__ . '/../View/messages.php';
            }
        }else{
            //envoi d'un message
            $typeAlert = "danger";
            $messageAlert = "Vous devez etre connecté en tant que candidat pour accéder à cette page.";
            require __DIR__ . '/../View/messages.php';
        }

    }

    public static function deleteFavoris($base){
        if(isset($_SESSION['id']) && isset($_SESSION['type']) && $_SESSION['type']==="Candidat"){
            if(isset($_GET['id'])){
                $favorisRepository = new FavorisRepository($base);
                $res = $favorisRepository->exists($_GET['id'], $_SESSION['id']);
                if($res){
                    $result = $favorisRepository->delete($_GET['id'], $_SESSION['id']);
                    header("Location: /index.php/afficherAnnonce?id=".$_GET['id']."&successDeleteFavoris=true");
                }else{
                    header("Location: /index.php/afficherAnnonce?id=".$_GET['id']."&successDeleteFavoris=pasFavoris");
                }
            }else{
                //envoi d'un message
                $typeAlert = "danger";
                $messageAlert = "Vous devez selectionner une annonce avant de la supprimer dans vos favoris.";
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
