<?php
$dir = 'index.php';
$i=0;
$menu[$i]['link'] = $dir;
$menu[$i]['nom'] = 'Accueil';

$i=1;
$menu[$i]['link'] = $dir.'/recherche_offres';
$menu[$i]['nom'] = 'Rechercher une offre';

$i=2;
$menu[$i]['link'] = $dir.'/poster_offres';
$menu[$i]['nom'] = 'Poster une offre';

if (isset($_SESSION['username'])) {
  $i=0;
  $menuConnexion[$i]['link'] = $dir.'/mon_profil';
  $menuConnexion[$i]['nom'] = 'Mon Profil';

  $i=1;
  $menuConnexion[$i]['link'] = $dir.'/deconnexion';
  $menuConnexion[$i]['nom'] = 'Déconnection';
} else {
  $i=0;
  $menuConnexion[$i]['link'] = $dir.'/connexion_candidat';
  $menuConnexion[$i]['nom'] = 'CANDIDAT';

  $i=1;
  $menuConnexion[$i]['link'] = $dir.'/connexion_entreprise';
  $menuConnexion[$i]['nom'] = 'ENTREPRISE';
}
