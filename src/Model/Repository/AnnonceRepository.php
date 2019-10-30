<?php


namespace App\Model\Repository;

use PDO;
use App\Model\Repository\Repository;
use App\Model\Annonce;

class AnnonceRepository
{
    private $base;

    public function __construct(repository $base){
        $this->base = $base;
    }

    //ajouter les focntions : add / remove / modifier / getAllAnnonces / getUneAnnonce / getAllAnnoncesWhere(en fonction des differents requetes)
}