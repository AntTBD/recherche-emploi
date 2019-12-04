<?php


namespace App\Model\Repository;

use PDO;
use App\Model\Annonce;

class AnnonceRepository
{
    private $base;

    public function __construct(Repository $base){
        $this->base = $base;
    }

    public function add(Annonce $annonce)
    {
        //Le $this->base conrrespond a notre object PDO passer dans le __construct pour rappel.
        $response = $this->base->prepare('INSERT INTO annonces (intitule, domaine, dateDebut, dateFin, description, salaire, tempsTravail, idEntreprise, idVille, idTypeContrat) VALUES(:intitule, :domaine, :dateDebut, :dateFin, :description, :salaire, :tempsTravail, :idEntreprise, :idVille, :idTypeContrat);');
        $response->bindValue(':intitule',       $annonce->getIntitule());
        $response->bindValue(':domaine',        $annonce->getDomaine());
		$response->bindValue(':dateDebut',      $annonce->getDateDebut());
		$response->bindValue(':dateFin',        $annonce->getDateFin());
		$response->bindValue(':description',    $annonce->getDescription());
		$response->bindValue(':salaire',        $annonce->getSalaire());
        $response->bindValue(':tempsTravail',   $annonce->getTempsTravail());
		$response->bindValue(':idEntreprise',   $annonce->getIdEntreprise());
		$response->bindValue(':idVille',        $annonce->getIdVille());
		$response->bindValue(':idTypeContrat',  $annonce->getIdTypeContrat());

		$response->execute();

		$annonce->hydrate(['id' => $this->base->lastInsertId()]);
        return $annonce;
	}

     public function delete($id)
    {
        $response = $this->base->prepare('DELETE FROM annonces  WHERE id = :id;');
        $response->bindValue(':id', $id);

        $response->execute();
        if($response->rowcount()==null) {
            return false;
        }else{
            return true;
        }
    }

	public function findAll()
    {
    	$listeAnnonces=array();
    	$reponse = $this->base->prepare('SELECT * FROM annonces;');
    	$resultats = $reponse->execute();
    	if($resultats==true){
    	    $listeAnnonces=$reponse->fetchAll(PDO::FETCH_CLASS, 'App\Model\Annonce');
    	    return $listeAnnonces;
        }
    	return false;
    }

    public function findLastThree()
    {
        $listeAnnonces=array();
        $reponse = $this->base->prepare('SELECT * FROM annonces LIMIT 3;');
        $resultats = $reponse->execute();
        if($resultats==true){
            $listeAnnonces=$reponse->fetchAll(PDO::FETCH_CLASS, 'App\Model\Annonce');
            return $listeAnnonces;
        }
        return false;
    }

    public function findById($id)
    {
        $annonce=null;
        $req = 'SELECT * FROM annonces WHERE id = '.$id.';';
        $query = $this->base->query($req);
        if ($query == true) {
            if ($annonce_temp = $query->fetch()){
                $annonce = new Annonce($annonce_temp);
                return $annonce;
            }
            return false;
        }
        return false;

    }

    public function findByEntreprise($idEntreprise)
    {
        $listeAnnonces=array();
        $response = $this->base->query('SELECT * FROM annonces WHERE idEntreprise = '.$idEntreprise.';');
        while($row = $response->fetch(PDO::FETCH_ASSOC)){
            $annonce = new Annonce([
                'id' => $row['id'],
                'intitule'      => $row['intitule'],
                'domaine'       => $row['domaine'], // le bug été ici avec l'_ entre resume et article
                'dateFin'       => $row['dateFin'], // et ici aussi
                'salaire'       => $row['salaire'],
                'tempsTravail'  => $row['tempsTravail'],
                'idEntreprise'  => $row['idEntreprise'],
                'idVille'       => $row['idVille'],
                'idTypeContrat' => $row['idTypeContrat']
            ]);
            array_push($listeAnnonces,$annonce);
        }
        return $listeAnnonces;
    }

    public function modify(int $id, Annonce $annonce){
        if(findById($id)){
            $response = $this->base->prepare('UPDATE annonces SET intitule = :intitule, domaine = :domaine, dateDebut = :dateDebut, dateFin = :dateFin, description = :description, salaire = :salaire, tempsTravail = :tempsTravail, idEntreprise = :idEntreprise, idVille = :idVille, idTypeContrat = :idTypeContrat WHERE id = :id');
            $response->bindValue(':id',         $id);
            $response->bindValue(':intitule',       $annonce->getIntitule());
            $response->bindValue(':domaine',        $annonce->getDomaine());
            $response->bindValue(':dateDebut',      $annonce->getDateDebut());
            $response->bindValue(':dateFin',        $annonce->getDateFin());
            $response->bindValue(':description',    $annonce->getDescription());
            $response->bindValue(':salaire',        $annonce->getSalaire());
            $response->bindValue(':tempsTravail',   $annonce->getTempsTravail());
            $response->bindValue(':idEntreprise',   $annonce->getIdEntreprise());
            $response->bindValue(':idVille',        $annonce->getIdVille());
            $response->bindValue(':idTypeContrat',  $annonce->getIdTypeContrat());

            $response->execute();
            return true;
        }else{
            return false;
        }

    }


    //ajouter les focntions : add / remove / modifier / getAllAnnonces / getUneAnnonce / getAllAnnoncesWhere(en fonction des differents requetes)
}