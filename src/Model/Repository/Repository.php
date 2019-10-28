<?php
namespace App\Model\Repository;

require __DIR__.'/../../../includes/config.inc.php';
use PDO;

class Repository{
    protected $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public static function connect(){
        try {
            $pdo = new PDO("mysql:host=".$database["host"].";dbname=".$database["base"].";charset=UTF8",$database["user"],$database["pass"]);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return new self($pdo);
        } catch (PDOException $e) {
            echo 'Échec lors de la connexion : ' . $e->getMessage();
            return null;

        }
    }


    public function query($query){
        return $this->pdo->query($query);
    }

    public function prepare($query, $parameter = null)
    {
        $response =  $this->pdo->prepare($query);
        if (null !== $parameter) {
            $response->execute($parameter);
        }
        return $response;
    }



}
