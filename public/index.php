<?php
// on démarre la temporisation de sortie. Tant qu'elle est enclenchée, aucune donnée, hormis les en-têtes, n'est envoyée au navigateur, mais temporairement mise en tampon.
// https://www.php.net/manual/fr/function.ob-start.php
ob_start();

require __DIR__ . '/../src/View/Commons/header.php';

use App\Controller\ConnexionController;
use App\Controller\DefaultController;
use App\Controller\ProfilesControlers;


// route the request internally
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ('/index.php' == $uri || '/' == $uri) {
    DefaultController::index();
} elseif ('/index.php/mentionsLegales' == $uri) {
    DefaultController::mentionsLegales();
} /*elseif ('/index.php/show' == $uri && isset($_GET['id'])) {
    ArticleController::show($_GET['id']);
} elseif ('/index.php/add' == $uri) {
    ArticleController::add();
} */
elseif ('/index.php/inscription_candidat' == $uri) {
    ConnexionController::inscription($base, 'Candidat');
} elseif ('/index.php/inscription_entreprise' == $uri) {
    ConnexionController::inscription($base, 'Entreprise');
} elseif ('/index.php/connexion_candidat' == $uri) {
    ConnexionController::connexion($base, 'Candidat');
} elseif ('/index.php/connexion_entreprise' == $uri) {
    ConnexionController::connexion($base, 'Entreprise');
} elseif ('/index.php/deconnexion' == $uri) {
    ConnexionController::deconnexion();
}elseif ('/index.php/mon_profil' == $uri) {
    ProfilesControlers::mon_profil($base);
} else {
    DefaultController::erreur404();
}

require __DIR__ . '/../src/View/Commons/footer.php';

//on affiche le contenu de ce tampon
ob_end_flush();
