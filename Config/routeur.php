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

use App\Controller\ArticleController;
use App\Controller\CommentController;
use App\Controller\CategorieController;
use App\Controller\DonController;
use App\Controller\UserController;

switch ($page) {
    case 'home':
        $home = new HomeController();
        $home->home();
//        require '../App/Views/home.php';
        break;
    case "login":
        $user = new UserController();
        $user->login($_POST);
        break;
    case "logout":
        $user = new UserController();
        $user->logout();
        break;
    default:
        require '../App/Views/default.php';
        break;
                case "registration":
            $user = new UserController();
            $user->signup($_POST);
            break; 
}
