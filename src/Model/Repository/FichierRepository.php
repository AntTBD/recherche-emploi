<?php


namespace App\Model\Repository;

use App\Model\Repository\Repository;
use PDO;
use App\Model\Fichier;

class FichierRepository
{
    private $base;

    public function __construct(Repository $base){
        $this->base = $base;
    }

    //ajouter les fonctions : add / remove / modifier / find
}