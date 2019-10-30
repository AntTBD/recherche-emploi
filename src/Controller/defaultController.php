<?php


namespace App\Controller;


class DefaultController
{
    public static function index() {
        //$articles = ArticleRepository::findAll();
        //require __DIR__.'/../vue/article_list.php';
        $emplacement=$_SERVER["DOCUMENT_ROOT"];
        require __DIR__.'/../view/base.php';
    }

    public static function mentionsLegales() {
        require __DIR__.'/../view/mentionsLegales.php';
    }

    public static function deconnexion() {
        require __DIR__.'/../view/deconnexion.php';
    }

    public static function erreur404() {
        require __DIR__.'/../view/erreur404.php';
    }


/*
    public static function show($id) {
        $article = ArticleRepository::find($id);
        require __DIR__.'/../vue/article_show.php';
    }
    public static function add() {
        if (isset($_POST['title']) && isset($_POST['content'])) {
            $article = new Article();
            $article->setTitle($_POST['title']);
            $article->setContent($_POST['content']);
            ArticleRepository::add($article);
            $message = 'Votre article à bien été ajouter';
        }
        require __DIR__.'/../vue/article_add.php';
    }
*/
}
