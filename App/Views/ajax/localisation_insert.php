<?php

use App\Controller\LocalisationController;

$loca = new LocalisationController();
$loca->insert($_POST);

$lat = $_POST['lat'];
$lon = $_POST['lon'];