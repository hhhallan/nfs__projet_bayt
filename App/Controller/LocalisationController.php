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

    public function insert($data)
    {
        if (!empty($data['lat']) && !empty($data['lon'])) {
            $loca = $this->encodeChars($data);
            debug('pas vide');

            if (is_numeric($data['lat']) && is_numeric($data['lon'])) {
                debug('numeric');
                $this->locaModel->create($loca);
            }
        }
        $this->render("localisation");
    }

}
