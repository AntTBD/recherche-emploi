
<center>
    <h1>It works</h1>
    <p>Dossier www : <?= $emplacement ?></p>
    <br>
    <h1>Test des héritages</h1>
</center>

<?php

use App\Model\Utilisateur;
use App\Model\Repository\UtilisateurRepository;
use App\Model\Candidat;
use App\Model\Entreprise;

$user = new Utilisateur([
        'id'=> 0,
    'mail'=> 'user@gmail.com',
    'mdp'=> 'jfndlsgnflsdngl',
    'nom'=> 'user',
    'tel'=> '055500',
    'adresse'=> '0 rue toto'
]);
$candidat = new Candidat([
        'id'=> 1,
    'mail'=> 'candidat@gmail.com',
    'mdp'=> 'jfndlsgnflsdngl',
    'nom'=> 'candidat',
    'tel'=> '055501',
    'adresse'=> '1 rue toto',
    'prenom'=> 'prenomC',
    'civilite'=> 'Mr.'
]);
$entreprise = new Entreprise([
        'id'=> 2,
    'mail'=> 'entreprise@gmail.com',
    'mdp'=> 'jfndlsgnflsdngl',
    'nom'=> 'entreprise',
    'tel'=> '055502',
    'adresse'=> '2 rue toto',
    'siteInternet'=> 'entreprise.com',
    'description'=> 'ceci est une entreprise'
]);

echo '<p><b>'.$user->getClassName().' :</b> '.$user->__toString().'</p><br>';
echo '<p><b>'.$candidat->getClassName().' :</b> '.$candidat->__toString().'</p><br>';
echo '<p><b>'.$entreprise->getClassName().' :</b> '.$entreprise->__toString().'</p><br>';