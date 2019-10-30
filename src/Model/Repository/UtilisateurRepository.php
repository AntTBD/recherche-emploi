<?php


namespace App\Model\Repository;

use PDO;
use App\Model\Repository\Repository;
use App\Model\Utilisateur;

class UtilisateurRepository
{
    private $base;

    public function __construct(repository $base){
        $this->base = $base;
    }

    //ajouter les fonctions : add / remove / modifier / findByEmail -> verifier si un email et dejà utilisé / login -> initialise les sessions
}