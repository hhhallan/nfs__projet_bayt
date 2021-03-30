<?php

/**
 * Mettre les use des class
 */

use App\Controller\HomeController;
use App\Controller\UserController;
use App\Controller\LocalisationController;

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
        break;
    case 'about':
        $about = new HomeController();
        $about->about();
        break;
    case 'us':
        $us = new HomeController();
        $us->us();
        break;
    case 'sign':
        $auth = new HomeController();
        $auth->sign();
        break;
    case 'log':
        $auth = new HomeController();
        $auth->log();
        break;
    case 'registration_parent':
        $user = new UserController();
        $user->signup_parent($_POST);
        break;
    case 'registration_pro':
        $user = new UserController();
        $user->signup_pro($_POST);
        break;
    case 'login_parent':
        $user = new UserController();
        $user->login_parent($_POST);
        break;
    case 'login_pro':
        $user = new UserController();
        $user->login_pro($_POST);
        break;
    case 'localisation':
        $localisation = new LocalisationController();
        $localisation->insert($_POST);
        break;
    case 'logout':
        $user = new UserController();
        $user->logout();
        break;
    default:
        require '../App/Views/default.php';
        break;
}