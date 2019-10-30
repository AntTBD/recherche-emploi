<?php


namespace App\Model;


class TypeFichier
{
    private $id;
    private $nom;

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
        $toString = 'TypeFichier [ ';
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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }


}