<?php


namespace App\Model;


class Fichier
{
    private $id;
    private $chemin;
    private $alt;
    private $idTypeFichier;
    private $idUtilisateur;


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
        $toString = 'Fichier [ ';
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
    public function getChemin()
    {
        return $this->chemin;
    }

    /**
     * @param mixed $chemin
     */
    public function setChemin($chemin)
    {
        $this->chemin = $chemin;
    }

    /**
     * @return mixed
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * @param mixed $alt
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;
    }

    /**
     * @return mixed
     */
    public function getIdTypeFichier()
    {
        return $this->idTypeFichier;
    }

    /**
     * @param mixed $idTypeFichier
     */
    public function setIdTypeFichier($idTypeFichier)
    {
        $this->idTypeFichier = $idTypeFichier;
    }

    /**
     * @return mixed
     */
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * @param mixed $idUtilisateur
     */
    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;
    }




}