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
    case 'registration_parent':
        require '../App/Views/auth/signup_parent.php';
        break;
    case 'registration_pro':
        $user = new UserController();
        $user->signup_pro($_POST);
        break;
    case 'login_pro':
        $user = new UserController();
        $user->login_pro($_POST);
        break;
    default:
        require '../App/Views/default.php';
        break;
}