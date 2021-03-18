<?php
namespace App\Controller;

use App\Model\ArticleModel;
use App\Model\UserModel;
use Core\Controller\Controller;

class UserController extends Controller{

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function signup_parent($data)
    {
        if (isset($data["email"])) {
            $user = $this->encodeChars($data);
            $user["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
            $user["role"] = json_encode(['user']);
            $this->userModel->create($user);

        }

        $this->render("auth.signup_parent");

    }

    public function signup_pro($data)
    {
        if (isset($data["email"])) {
            $user = $this->encodeChars($data);
            $user["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
            $user["role"] = json_encode(['user']);
            $this->userModel->create($user);

        }

        $this->render("auth.signup_pro");

    }

    public function login($data)
    {
        if (isset($data["email"])) {

            $user = $this->userModel->getUserByEmail($data["email"]);

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
}