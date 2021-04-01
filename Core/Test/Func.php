<?php
namespace Core\Test;


/**
 * Class Function
 * Permet d'utiliser des fonctions
 */


class Func {

    public function debug($var) {
            echo '<pre style="height:200px;overflow-y: scroll;font-size:.8em;padding: 10px; font-family: Consolas, Monospace; background-color: #000; color: #fff;">';
            print_r($var);
            echo '</pre>';
    }

    public function isLoggedUser()
    {
        if (!empty($_SESSION['user'])) {
            if (!empty($_SESSION['user']['id']) && is_numeric($_SESSION['user']['id'])) {
                if (!empty($_SESSION['user']['nom'])) {
                    if (!empty($_SESSION['user']['role'])) {
                        if ($_SESSION['user']['role'] == 'user') {
                        }
                    }
                }
            }
        }
        return false;
    }

}