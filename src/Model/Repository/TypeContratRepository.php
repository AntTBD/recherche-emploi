<?php


namespace App\Model\Repository;

use PDO;
use App\Model\TypeContrat;

class TypeContratRepository
{
    private $base;

    public function __construct(repository $base){
        $this->base = $base;
    }

    public function findAll()
    {
    	$listeTypesContrat=array();
    	$query = $this->base->query('SELECT * FROM typescontrat;');
    	$resultats = $query->fetchAll();
    	foreach ($resultats as $resultat) {
    		array_push($listeTypesContrat,new TypeContrat($resultat));
    	}
    	return $listeTypesContrat;
    }

    public function findById($id)
    {
        $contrat=array();
        $req = 'SELECT * FROM typescontrat WHERE id = '.$id.';';
        $query = $this->base->query($req);
        $resultats = $query->fetchAll();
        foreach ($resultats as $resultat) {
            array_push($contrat, new TypeContrat($resultat));
        }
        return $contrat;
    }

    public function find(int $id) {
        //Je cherche un personnage par rapport à son id, et si il existe je lui retourne l’oject hydrater
        $response = $this->base->prepare('SELECT *
                                                FROM typescontrat
                                                WHERE id = '.$id.';');
        $response->bindValue(':id', $id);
        $result = $response->execute();
        if ($result == true) {
            if ($contrat_temp = $response->fetch()){
                $contrat = new TypeContrat($contrat_temp);
                return $contrat;
            }
            return false;
        }

        return false;
    }
}