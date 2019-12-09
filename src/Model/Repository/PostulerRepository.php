<?php


namespace App\Model\Repository;

use App\Model\Repository\Repository;
use PDO;
use App\Model\Postuler;

class PostulerRepository
{
    private $base;

    public function __construct(Repository $base){
        $this->base = $base;
    }

    public function add($id, $idCandidat){
        $response = $this->base->prepare('INSERT INTO postuler (id, idCandidat) VALUES(:id, :idCandidat);');
        $response->bindValue(':id', $id);
        $response->bindValue(':idCandidat', $idCandidat);

        $response->execute();
    }

    public function exists($id, $idCandidat) {
        $response = $this->base->prepare('SELECT COUNT(*) FROM postuler WHERE id = :id AND idCandidat = :idCandidat;');
        $response->bindValue(':id', $id);
        $response->bindValue(':idCandidat', $idCandidat);
        $response->execute();
        return (bool) $response->fetchColumn();
    }

    public function delete($id, $idCandidat)
    {
        $response = $this->base->prepare('DELETE FROM postuler  WHERE id = :id AND idCandidat = :idCandidat;');
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
        $listePostuler=array();
        $response = $this->base->query('SELECT * FROM postuler WHERE idCandidat = '.$idCandidat.';');
        while($row = $response->fetch(PDO::FETCH_ASSOC)){
            $postuler = new Postuler([
                'id' => $row['id'],
                'idCandidat' => $row['idCandidat']
            ]);
            array_push($listePostuler,$postuler);
        }
        return $listePostuler;
    }

    public function findById($id)
    {
        $listePostuler=array();
        $response = $this->base->query('SELECT * FROM postuler WHERE id = '.$id.';');
        while($row = $response->fetch(PDO::FETCH_ASSOC)){
            $postuler = new Postuler([
                'id' => $row['id'],
                'idCandidat' => $row['idCandidat']
            ]);
            array_push($listePostuler,$postuler);
        }
        return $listePostuler;
    }
}
