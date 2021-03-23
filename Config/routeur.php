<?php

/**
 * Mettre les use des class
 */
use App\Controller\HomeController;
use App\Controller\UserController;

/**
 * Si page est vide => on revient sur la home
 */
if (!empty($_GET["page"])) {
$page = $_GET["page"];
} else {
    $page = "home";
}

switch ($page) {
    case 'home':
        $home = new HomeController();
        $home->home();
//        require '../App/Views/home.php';
        break;
    case 'about':
        $about = new HomeController();
        $about->about();
//        require '../App/Views/about.php';
        break;
    case 'us':
        $us = new HomeController();
        $us->us();
//        require '../App/Views/us.php';
        break;
    default:
        require '../App/Views/default.php';
        break;
}