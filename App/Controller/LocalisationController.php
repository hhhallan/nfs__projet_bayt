<?php

namespace App\Controller;

use Core\Controller\Controller;
use App\Model\LocalisationModel;

class LocalisationController extends Controller
{


    public function __construct()
    {
        $this->locaModel = new LocalisationModel();
    }

    public function show()
    {
        $this->render('localisation');
    }

    public function insert($data)
    {
        $lat = $data['lat'];
        $lon = $data['lon'];
        if (!empty($lat) && !empty($lon)) {
            $loca = $this->encodeChars($data);

            if (is_numeric($lat) && is_numeric($lon)) {

                $this->locaModel->update($loca);
            }
        }
    }

    public function showJson()
    {
        $data = $this->locaModel->ReadAll();
        header("content-type: application/json");
        $json = json_encode($data, JSON_PRETTY_PRINT);
        if ($json) {
            die($json);
        } else {
            die('error in json encoding');
        }
    }

}
