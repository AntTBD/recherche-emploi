<?php


namespace App\Model\Repository;

use PDO;
use App\Model\Repository\Repository;
use App\Model\Fichier;

class FichierRepository
{
    private $base;

    public function __construct(repository $base){
        $this->base = $base;
    }

    //ajouter les fonctions : add / remove / modifier / find
}