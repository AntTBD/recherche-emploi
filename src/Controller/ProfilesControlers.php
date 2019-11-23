<?php


namespace App\Controller;


use App\Model\Candidat;
use App\Model\Entreprise;
use App\Model\Utilisateur;
use App\Model\Repository\CandidatRepository;
use App\Model\Repository\EntrepriseRepository;
use App\Model\Repository\UtilisateurRepository;

class ProfilesControlers
{
//protected $user;
  public static function mon_profil($base) {
      $user = new Utilisateur();
      $userRepository = new CandidatRepository($base);
      $user = $userRepository->find($_SESSION['id']);
      //$user = UtilisateurRepository::find($_SESSION['id']);
      require __DIR__ . '/../View/Profil/mon_profil_'.strtolower($_SESSION['type']).'.php';
    }

    public static function majProfil(){

    }
}
