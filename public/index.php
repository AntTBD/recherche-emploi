<?php
// on démarre la temporisation de sortie. Tant qu'elle est enclenchée, aucune donnée, hormis les en-têtes, n'est envoyée au navigateur, mais temporairement mise en tampon.
// https://www.php.net/manual/fr/function.ob-start.php
ob_start();

require __DIR__ . '/../src/View/Commons/header.php';

use App\Controller\ConnexionController;
use App\Controller\DefaultController;
use App\Controller\AnnonceController;
use App\Controller\ProfilController;
use App\Controller\PostulerController;
use App\Controller\FavorisController;

// route the request internally
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ('/index.php' == $uri || '/' == $uri) {
    DefaultController::index();
    AnnonceController::voirLastAnnonces($base);
} elseif ('/index.php/mentionsLegales' == $uri) {
    DefaultController::mentionsLegales();
} elseif ('/index.php/inscription_candidat' == $uri) {
    ConnexionController::inscription($base, 'Candidat');
} elseif ('/index.php/inscription_entreprise' == $uri) {
    ConnexionController::inscription($base, 'Entreprise');
} elseif ('/index.php/connexion_candidat' == $uri) {
    ConnexionController::connexion($base, 'Candidat');
} elseif ('/index.php/connexion_entreprise' == $uri) {
    ConnexionController::connexion($base, 'Entreprise');
} elseif ('/index.php/deconnexion' == $uri) {
    ConnexionController::deconnexion();
} elseif ('/index.php/ajoutAnnonce' == $uri){
    AnnonceController::ajoutAnnonce($base);
} elseif('/index.php/voirMesAnnonces' == $uri){
    AnnonceController::voirMesAnnonces($base);
} elseif('/index.php/voirMesAnnoncesLikes' == $uri){
    AnnonceController::voirMesAnnoncesLikes($base);
}elseif('/index.php/voirMesAnnoncesPostules' == $uri){
    AnnonceController::voirMesAnnoncesPostules($base);
} elseif('/index.php/voirAllAnnonces' == $uri){
    AnnonceController::voirAllAnnonces($base);
} elseif('/index.php/afficherAnnonce' == $uri){
    AnnonceController::afficherAnnonce($base);
} elseif('/index.php/modifierAnnonce' == $uri){
    AnnonceController::modifierAnnonce($base);
} elseif('/index.php/supprimerAnnonce' == $uri){
    AnnonceController::supprimerAnnonce($base);
}elseif ('/index.php/mon_profil' == $uri) {
    ProfilController::mon_profil($base);
}elseif ('/index.php/postuler' == $uri) {
    PostulerController::addPostuler($base);
}elseif ('/index.php/deletePostuler' == $uri) {
    PostulerController::deletePostuler($base);
}elseif ('/index.php/favoris' == $uri) {
    FavorisController::addFavoris($base);
}elseif ('/index.php/deleteFavoris' == $uri) {
    FavorisController::deleteFavoris($base);
} else {
    DefaultController::erreur404();
}

require __DIR__ . '/../src/View/Commons/footer.php';

//on affiche le contenu de ce tampon
ob_end_flush();
