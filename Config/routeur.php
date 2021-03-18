<?php

/**
 * Mettre les use des class
 */

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
    default:
        require '../App/Views/default.php';
        break;
}