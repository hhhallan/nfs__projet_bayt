<?php

namespace App\Controller;

use Core\Controller\Controller;

class HomeController extends Controller {


    public function home()
    {
        $userControllerPro = new UserController();
        $proUsers = $userControllerPro->getAllPro();

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

