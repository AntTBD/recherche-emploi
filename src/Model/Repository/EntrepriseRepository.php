<?php


namespace App\Model\Repository;

use PDO;
use App\Model\Repository\Repository;
use App\Model\Entreprise;

class EntrepriseRepository
{
    private $base;

    public function __construct(repository $base){
        $this->base = $base;
    }


}