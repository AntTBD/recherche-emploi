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
}
