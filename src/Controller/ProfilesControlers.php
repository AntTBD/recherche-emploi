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
  public static function mon_profil($base) {
    //protected $user;
    if(($_SESSION['type']) == 'Candidat'){
        $user = new Candidat();
        $userRepository = new CandidatRepository($base);
      } else {
        $user = new Entreprise();
        $userRepository = new EntrepriseRepository($base);
      }
      if (isset($_POST['email']) && isset($_POST['nom']) && isset($_POST['tel'])) {
          if(isset($_POST['prenom'])){
              $user = new Candidat([
              'mail' => $_POST['email'],
              'mdp' => 'ui',
              'nom' => $_POST['nom'],
              'tel' => $_POST['tel'],
              'prenom' => $_POST['prenom'],
              'civilite' => 'ui'
            ]);
          } else {
            $user = new Entreprise([
            'mail' => $_POST['email'],
            'mdp' => 'ui',
            'nom' => $_POST['nom'],
            'tel' => $_POST['tel'],
            'adresse' => $_POST['adresse'],
            'siteInternet' => $_POST['siteInternet'],
            'description' => $_POST['description']
          ]);
          }

          $userRepository->modify($_SESSION['id'],$user);



      }
            //$user = new Utilisateur();

      $user = $userRepository->find($_SESSION['id']);

      //$user = UtilisateurRepository::find($_SESSION['id']);
      require __DIR__ . '/../View/Profil/mon_profil_'.strtolower($_SESSION['type']).'.php';
    }
}
