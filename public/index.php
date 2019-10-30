<?php
require __DIR__.'/../src/View/Commons/header.php';

use App\Controller\DefaultController;



// route the request internally
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ('/index.php' == $uri) {
    DefaultController::index();
}
elseif ('/index.php/mentionsLegales' == $uri) {
    DefaultController::mentionsLegales();
}
/*elseif ('/index.php/show' == $uri && isset($_GET['id'])) {
    ArticleController::show($_GET['id']);
}
elseif ('/index.php/add' == $uri) {
    ArticleController::add();
} */
elseif ('/index.php/deconnexion' == $uri) {
    DefaultController::deconnexion();
}
else {
    DefaultController::erreur404();
}



require __DIR__ . '/../src/View/Commons/footer.php';
