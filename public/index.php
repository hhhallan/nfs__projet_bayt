<?php
use Core\App;

define("ROOT", dirname(__DIR__)."/");
require ROOT."Core/App.php";
App::load();

include ROOT."Config/routeur.php";

/**
 * |---------------------------------------------------------------------|
 * |         Model         |        Controller      |        View        |
 * |-----------------------|------------------------|--------------------|
 * |Connexion à la BDD     |Récupération des        |Affichage des pages |
 * |                       |données du Model        |                    |
 * |                       |                        |Récupération des    |
 * |Insertion de données   |Modification des données|données pour les    |
 * |                       |pour les envoyer        |afficher sur la page|
 * |Récupération de données|à la vue                |                    |
 * |                       |                        |                    |
 * |Transmission au        |Récupération des        |                    |
 * |controller             |informations du         |                    |
 * |                       |formulaire pour les     |                    |
 * |                       |traiter et les envoyer  |                    |
 * |                       |au Model                |                    |
 * |                       |                        |                    |
 * |                       |                        |                    |
 * |                       |                        |                    |
 * |---------------------------------------------------------------------|
 */