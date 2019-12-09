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
            header("Location: /index.php/afficherAnnonce?id=".$_GET['id']."&success=true");
        }else{

            header("Location: /index.php/afficherAnnonce?id=".$_GET['id']."&success=dejaPostule");

        }
    }
}