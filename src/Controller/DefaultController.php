<?php


namespace App\Controller;


class DefaultController
{
    public static function index()
    {
        $emplacement = $_SERVER["DOCUMENT_ROOT"];
        require __DIR__ . '/../View/base.php';
    }

    public static function mentionsLegales()
    {
        require __DIR__ . '/../View/mentionsLegales.php';
    }


    public static function erreur404()
    {
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
        require __DIR__ . '/../View/erreur404.php';
    }
}
