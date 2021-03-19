<?php

namespace App\Controller;

use Core\Controller\Controller;
use App\Model\UserModelPro;

class HomeController extends Controller {


    public function home() {

        $userControllerPro = new UserControllerPro();
//        $proUsers = $userControllerPro->();
        debug($proUsers);

        foreach ($proUsers as $proUser) {
            debug($proUser);
        }

        $this->render("home", [
            "proUsers" => $proUsers
        ]);
    }

}
function debug($tableau)
{
    echo '<pre>';
    print_r($tableau);
    echo '</pre>';
}