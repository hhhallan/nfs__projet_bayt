<?php

namespace App\Controller;

use Core\Controller\Controller;

class HomeController extends Controller {


    public function home()
    {
        $userControllerPro = new UserController();
        $proUsers = $userControllerPro->getAllPro();

        $logged = $userControllerPro->isLogged();

        $this->render("home", [
            "proUsers" => $proUsers,
            "logged" => $logged
        ]);
    }

    public function about() {
        $this->render('about');
    }

    public function us() {
        $this->render('us');
    }

    public function sign() {
        $this->render('sign');
    }

    public function log() {
        $this->render('log');
    }
}

