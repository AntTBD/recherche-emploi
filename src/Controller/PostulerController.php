<?php

namespace App\Controller;
use App\Model\Postuler;
use App\Model\Repository\PostulerRepository;


class PostulerController
{
    public static function postuler($base){
      $postulerRepository = new PostulerRepository($base);
      $res = $postulerRepository->exists($_GET['id'], $_SESSION['id']);
      if(!$res){
        $result = $postulerRepository->add($_GET['id'], $_SESSION['id']);
        $typeAlert="success";
        $messageAlert="Votre profil a bien été modifié.";
        require __DIR__ . '/../View/messages.php';
        //header('Location: /index.php/voirAnnonces');
      }else{
          //envoi d'un message
          $typeAlert="warning";
          $messageAlert="Il semble que vous avez déjà postulé à cette annonce.";
          require __DIR__ . '/../View/messages.php';
      }
    }
}
