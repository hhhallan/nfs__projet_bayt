<?php

namespace App\Controller;

use Core\Controller\Controller;

class HomeController extends Controller {


    public function home()
    {
        $userControllerPro = new UserController();
        $proUsers = $userControllerPro->getAllPro();
        /*echo '<pre>';
        print_r($proUsers);
        echo '</pre>';*/

        /*foreach ($proUsers as $proUser) {
            echo $proUser->prenom;
            echo $proUser->nom;
            echo $proUser->email;
            echo $proUser->tel_fixe;
        }*/

        $this->render("home", [
            "proUsers" => $proUsers
        ]);
    }

    public function about() {
        $this->render('about');
    }

    public function us() {
        $this->render('us');
    }
}

