<?php


namespace App\Model;


class Candidat extends Utilisateur
{
    private $prenom;
    private $civilite;

    public function __toString()
    {
        $toString = 'Candidat [ ';
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
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * @param mixed $civilite
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;
    }
}
