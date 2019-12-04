<?php

namespace App\Model\Repository;

use PDO;
use App\Model\Ville;

class VilleRepository
{
    private $base;

    public function __construct(repository $base){
        $this->base = $base;
    }

    public function findAll()
    {
    	$listeVilles=array();
    	$query = $this->base->query('SELECT * FROM villes ORDER BY nom;');
    	$resultats = $query->fetchAll();
    	foreach ($resultats as $resultat) {
    		array_push($listeVilles,new Ville($resultat));
    	}
    	return $listeVilles;
    }

    public function find(int $id) {
        //Je cherche un personnage par rapport à son id, et si il existe je lui retourne l’oject hydrater
        $base = Repository::connect();
        $response = $this->base->prepare('SELECT *
                                                FROM villes
                                                WHERE id = :id;');
        $response->bindValue(':id', $id);
        $result = $response->execute();
        if ($result == true) {
            if ($ville_temp = $response->fetch()){
                $ville = new Ville($ville_temp);
                return $ville;
            }
            return false;
        }

        return false;
    }
}