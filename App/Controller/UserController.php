<?php

namespace App\Controller;

use App\Model\UserModelParent;
use App\Model\UserModelPro;
use Core\Controller\Controller;

class UserController extends Controller
{

    public function __construct()
    {
        $this->userModelParent = new UserModelParent();
        $this->userModelPro = new UserModelPro();
    }

    public function signup_parent($data)
    {
        if (isset($data["email"])) {
            $user = $this->encodeChars($data);
            $user["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
            $user["role"] = json_encode(['user']);
            $this->userModelParent->create($user);
        }

        $this->render("auth.signup_parent");
    }

    public function signup_pro($data)
    {
        if (isset($data["email"])) {
            $user = $this->encodeChars($data);
            $user["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
            $user["role"] = json_encode(['user']);
            $this->userModelPro->create($user);
        }

        $this->render("auth.signup_pro");
    }

    public function login($data)
    {
        if (isset($data["email"])) {

            $user = $this->userModelPro->getUserByEmail($data["email"]);

            if ($user && password_verify($data["password"], $user->password)) {
                $_SESSION["user"] = $user;
                $_SESSION["user"]->role = json_decode($user->role);
                header("Location:index.php");
            } else {
                $error = "Utilisateur ou mot de passe incorrect.";
            }
        }
        $this->render("auth.login");
    }

    public function logout()
    {
        session_destroy();
        header("Location:index.php");
    }

    public function getAllPro()
    {
        return $this->userModelPro->ReadAll();
    }

    public function getAllParent()
    {
        return $this->userModelParent->ReadAll();
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
