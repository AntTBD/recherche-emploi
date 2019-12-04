<?php


namespace App\Model;


class Annonce
{
    private $id;
    private $intitule;
    private $domaine;
    private $dateDebut;
    private $dateFin;
    private $description;
    private $salaire;
    private $tempsTravail;
    private $idEntreprise;
    private $idVille;
    private $idTypeContrat;


    public function __construct(array $arrayOfValues = null){
        if($arrayOfValues != null){
            $this->hydrate($arrayOfValues);
        }
    }


    public function hydrate(array $donnees){
        foreach($donnees as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }

    public function __toString()
    {
        $toString = 'Annonce [ ';
        foreach($this as $key => $value){
            $method = 'get'.ucfirst($key);
            if(method_exists($this,$method)){
                $toString .= $key.' => "'.$this->$method($value).'", ';
            }
        }
        return $toString.']';
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * @param mixed $intitule
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;
    }

    /**
     * @return mixed
     */
    public function getDomaine()
    {
        return $this->domaine;
    }

    /**
     * @param mixed $domaine
     */
    public function setDomaine($domaine)
    {
        $this->domaine = $domaine;
    }

    /**
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @param mixed $dateDebut
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @param mixed $dateFin
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getSalaire()
    {
        return $this->salaire;
    }

    /**
     * @param mixed $salaire
     */
    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;
    }

    /**
     * @return mixed
     */
    public function getTempsTravail()
    {
        return $this->tempsTravail;
    }

    /**
     * @param mixed $tempsTravail
     */
    public function setTempsTravail($tempsTravail)
    {
        $this->tempsTravail = $tempsTravail;
    }

    /**
     * @return mixed
     */
    public function getIdEntreprise()
    {
        return $this->idEntreprise;
    }

    /**
     * @param mixed $idEntreprise
     */
    public function setIdEntreprise($idEntreprise)
    {
        $this->idEntreprise = $idEntreprise;
    }

    /**
     * @return mixed
     */
    public function getIdVille()
    {
        return $this->idVille;
    }

    /**
     * @param mixed $idVille
     */
    public function setIdVille($idVille)
    {
        $this->idVille = $idVille;
    }

    /**
     * @return mixed
     */
    public function getIdTypeContrat()
    {
        return $this->idTypeContrat;
    }

    /**
     * @param mixed $idTypeContrat
     */
    public function setIdTypeContrat($idTypeContrat)
    {
        $this->idTypeContrat = $idTypeContrat;
    }
}