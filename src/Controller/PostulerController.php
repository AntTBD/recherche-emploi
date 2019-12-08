<?php

namespace App\Controller;
use App\Model\Postuler;
use App\Model\Repository\PostulerRepository;


class PostulerController
{
    public static function postuler($base){
      $postulerRepository = new PostulerRepository($base);
      $postuler = $postulerRepository->add($_GET['id'], $_SESSION['id']);
    }
}
