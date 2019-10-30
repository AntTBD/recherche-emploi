<?php


namespace App\Model;


class Entreprise extends Utilisateur
{
    private $siteInternet;
    private $description;


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