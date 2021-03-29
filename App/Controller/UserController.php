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

        $success = false;
        $errors = array();
        if (isset($data['nom']) && isset($data['prenom']) && isset($data['nom_entreprise']) && isset($data['tel_portable']) && isset($data['tel_fixe']) && isset($data['email']) && isset($data['mot_de_passe'])) {

            $user = $this->encodeChars($data);

            /*    CLEAN XSS     */
            $name = $this->cleanXss($user['nom']);
            $firstname = $this->cleanXss($user['prenom']);
            $entreprise = $this->cleanXss($user['nom_entreprise']);
            $tel = $this->cleanXss($user['tel_portable']);
            $tel2 = $this->cleanXss($user['tel_fixe']);
            $email = $this->cleanXss($user['email']);
            $password = $this->cleanXss($user['mot_de_passe']);
            $password_confirm = $this->cleanXss($user['password_confirm']);

            /*    VERIFICATION TEXTE     */
            $errors = $this->validationText($errors, $name, 'nom', 2, 50);
            $errors = $this->validationText($errors, $firstname, 'prenom', 2, 50);
            $errors = $this->validationText($errors, $entreprise, 'nom_entreprise', 2, 50);

            /*    VERIFICATION EMAIL     */
            if (!empty($email)) {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = 'Veuillez renseigner un e-mail valide.';
                } else {
                    $verifEmail = $this->userModelPro->getIdByMail($email);
                    if (!empty($verifEmail)) {
                        $errors['email'] = 'Cet e-mail est déjà utilisé.';
                    }
                }
            } else {
                $errors['email'] = 'Veuillez renseigner un e-mail.';
            }

            /*    VERIFICATION PASSWORD     */
            if (!empty($password) && !empty($password_confirm)) {

                if ($password != $password_confirm) {
                    $errors['password_confirm'] = 'Veuillez renseigner des mots de passe identiques.';
                } elseif (mb_strlen($password) < 6) {
                    $errors['mot_de_passe'] = 'Minimum 6 caractères';
                }
            } else {
                $errors['mot_de_passe'] = 'Veuillez renseigner vos mots de passe.';
            }
            /*    VERIFICATION TELEPHONE     */

            /*  CONVERTIR ADRESSE => COORDONNEES   */

            /*   0 ERREUR   */
            if (count($errors) === 0) {
                $success = true;

                // insertion BDD
                $hashPassword = password_hash($password, PASSWORD_DEFAULT);
                $user['mot_de_passe'] = $hashPassword;

                unset($user['password_confirm']);

                $user['created_at'] = new \Datetime(); // FORMATER LA DATE

                $this->userModelPro->create($user);
            }
        }
        $this->render("auth.signup_pro");
    }

    public function login_pro($data)
    {
        /*if (isset($data["email"])) {

            $user = $this->userModelPro->getUserByEmail($data["email"]);

            if ($user && password_verify($data["password"], $user->password)) {
                $_SESSION["user"] = $user;
                $_SESSION["user"]->role = json_decode($user->role);
                header("Location:index.php");
            } else {
                $error = "Utilisateur ou mot de passe incorrect.";
            }

        }*/
        $errors = array();

        if(isset($data['email']) && isset($data['mot_de_passe'])) {

            // Faille XSS
            $email    = $this->cleanXss($data['email']);
            $password = $this->cleanXss($data['mot_de_passe']);
            if(!empty($email) && !empty($password)) {
                // request  users si il ya un user qui a soit email
                $user = $this->userModelPro->getUserByEmail($email);
                if(!empty($user)) { // $user existe pas => $error = 'erreur credentials'
                    if (password_verify($password, $user['mot_de_passe'])) {
                        $_SESSION['user'] = array(
                            'id'     => $user['id'],
                            'email'  => $user['email'],
                            'prenom' => $user['prenom'],
                            'nom' => $user['nom'],
                            'ip'     => $_SERVER['REMOTE_ADDR'] // ::1
                        );
                        // redirection index.php
                        header('Location: index.php');
                        die();
                    } else {
                        $errors['login'] = 'Erreur 1.';
                    }
                } else {
                    $errors['login'] = 'Erreur 1.';
                }
            } else {
                $errors['login'] = 'Veuillez renseigner les champs.';
            }
        }
        $this->render("auth.login_pro");

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
}