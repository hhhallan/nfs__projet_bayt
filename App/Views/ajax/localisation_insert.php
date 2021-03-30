<?php
function showJson($data)
{
    header("content-type: application/json");
    $json = json_encode($data, JSON_PRETTY_PRINT);
    if ($json) {
        die($json);
    } else {
        die('error in json encoding');
    }
}


//use App\Controller\LocalisationController;

print_r($_POST);

//$loca = new LocalisationController();
//$loca->insert($_POST);

$lat = $_POST['lat'];
$lon = $_POST['lon'];


// CREEER UNE NOUVELLE CLASSE


/*$data = array(
    'lat' => $lat,
    'lon' => $lon
);
showJson($data);*/

