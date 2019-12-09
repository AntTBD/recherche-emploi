<?php


namespace App\Model\Repository;

use App\Model\Repository\Repository;
use PDO;
use App\Model\Favoris;

class FavorisRepository
{
    private $base;

    public function __construct(Repository $base){
        $this->base = $base;
    }

    public function add($id, $idCandidat){
        $response = $this->base->prepare('INSERT INTO favoris (id, idCandidat) VALUES(:id, :idCandidat);');
        $response->bindValue(':id', $id);
        $response->bindValue(':idCandidat', $idCandidat);

        $response->execute();
    }

    public function exists($id, $idCandidat) {
        $response = $this->base->prepare('SELECT COUNT(*) FROM favoris WHERE id = :id AND idCandidat = :idCandidat;');
        $response->bindValue(':id', $id);
        $response->bindValue(':idCandidat', $idCandidat);
        $response->execute();
        return (bool) $response->fetchColumn();
    }

    public function delete($id, $idCandidat)
    {
        $response = $this->base->prepare('DELETE FROM favoris  WHERE id = :id AND idCandidat = :idCandidat;');
        $response->bindValue(':id', $id);
        $response->bindValue(':idCandidat', $idCandidat);
        $response->execute();
        if($response->rowcount()==null) {
            return false;
        }else{
            return true;
        }
    }

    public function findByCandidat($idCandidat)
    {
        $listeFavoris=array();
        $response = $this->base->query('SELECT * FROM favoris WHERE idCandidat = '.$idCandidat.';');
        while($row = $response->fetch(PDO::FETCH_ASSOC)){
            $favoris = new Favoris([
                'id' => $row['id'],
                'idCandidat' => $row['idCandidat']
            ]);
            array_push($listeFavoris,$favoris);
        }
        return $listeFavoris;
    }
}
