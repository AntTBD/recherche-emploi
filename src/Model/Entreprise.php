<?php


namespace App\Model;


class Entreprise extends Utilisateur
{
    private $siteInternet;
    private $description;
    private $adresse;


    public function __toString()
    {
        $toString = 'Entreprise [ ';
        foreach($this as $key => $value){
            $method = 'get'.ucfirst($key);
            if(method_exists($this,$method)){
                $toString .= $key.' => "'.$this->$method($value).'", ';
            }
        }
        return $toString.']';
    }

    public function getClassName()
    {
        return substr(strrchr(__CLASS__, "\\"), 1);
    }

    /**
     * @return mixed
     */
    public function getSiteInternet()
    {
        return $this->siteInternet;
    }

    /**
     * @param mixed $siteInternet
     */
    public function setSiteInternet($siteInternet)
    {
        $this->siteInternet = $siteInternet;
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
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
}