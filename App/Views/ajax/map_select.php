<?php

// FAIRE LE SELECT POUR ALLER CHERCHER LONGITUDE ET LATITUDE DE CHAQUE USER
use Core\Database;
use Core\Model\Model;

$user = new Database();
$user->getData("SELECT * FROM user_pro, true");
var_dump($user);