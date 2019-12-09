<?php


namespace App\Model\Repository;

use App\Model\Candidat;
use App\Model\Postuler;
use PDO;


class CandidatRepository extends UtilisateurRepository
{
    //retourne l’oject du personnage hydrater ainsi que remplir mes sessions
    //Cette fonction renvoie soit false, soit l’object du personnage.
    public function find(int $id) {
        //Je cherche un personnage par rapport à son id, et si il existe je lui retourne l’oject hydrater
        $response = $this->base->prepare('SELECT *
                                                FROM utilisateurs
                                                INNER JOIN candidats ON candidats.id = utilisateurs.id
                                                WHERE utilisateurs.id = :id;');
        $response->bindValue(':id', $id);
        $result = $response->execute();
        if ($result == true) {
            if ($user_temp = $response->fetch()){
                $user = new Candidat($user_temp);
                return $user;
            }
            return false;
        }
        return false;
    }

    public function findAllByAnnonce($idAnnonce){
        $postulerRepository = new PostulerRepository($this->base);
        $res = $postulerRepository->findById($idAnnonce);
        $listeCandidats=array();
        foreach ($res as $uneAnnonce){
            $response = $this->base->query('SELECT *
                                                FROM utilisateurs
                                                INNER JOIN candidats ON candidats.id = utilisateurs.id
                                                WHERE utilisateurs.id = '.$uneAnnonce->getIdCandidat().';');
            while($row = $response->fetch(PDO::FETCH_ASSOC)){
                $user = new Candidat($row);
                array_push($listeCandidats,$user);
            }
        }

        return $listeCandidats;
    }
}
