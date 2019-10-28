<?php
namespace App\Model\Repository;

use PDO;
use App\Model\Repository\Repository;
use App\Model\Candidat;

class CandidatRepository {
  private $base;

  public function __construct(repository $base){
    $this->base = $base;
  }

}
