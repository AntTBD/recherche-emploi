<?php


namespace App\Model;


class Entreprise extends Utilisateur
{
    private $siteInternet;
    private $description;

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
}