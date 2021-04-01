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

    // FONCTIONS UTILES POUR TOUS
    public function showJson()
    {
        $data = $this->userModelPro->ReadOne($data['id']);
        header("content-type: application/json");
        $json = json_encode($data, JSON_PRETTY_PRINT);
        if ($json) {
            die($json);
        } else {
            die('error in json encoding');
        }
    }

    public function showSingle($data) {
        $user = $this->userModelPro->ReadOne($data['id']);
        $this->render('single',[
            'user' => $user
        ]);
    }

    public function isLogged()
    {
        if (!empty($_SESSION['user'])) {
            if (!empty($_SESSION['user']['id']) && is_numeric($_SESSION['user']['id'])) {
                if (!empty($_SESSION['user']['email'])) {
                    if (!empty($_SESSION['user']['ip']) && $_SESSION['user']['ip'] == $_SERVER['REMOTE_ADDR']) {
                        return true;
                    }
                }
            }
        }
        return false;
    }

    public function isLoggedPro()
    {
        if (!empty($_SESSION['user'])) {
            if (!empty($_SESSION['user']['id']) && is_numeric($_SESSION['user']['id'])) {
                if (!empty($_SESSION['user']['email'])) {
                    if ($_SESSION['user']['role'] == 'creche' || $_SESSION['user']['role'] == 'assistantemater' || $_SESSION['user']['role'] == 'babysitter')
                        if (!empty($_SESSION['user']['ip']) && $_SESSION['user']['ip'] == $_SERVER['REMOTE_ADDR']) {
                            return true;
                        }
                }
            }
        }
        return false;
    }

    public function isLoggedParent()
    {
        if (!empty($_SESSION['user'])) {
            if (!empty($_SESSION['user']['id']) && is_numeric($_SESSION['user']['id'])) {
                if (!empty($_SESSION['user']['email'])) {
                    if ($_SESSION['user']['role'] == 'parent')
                        if (!empty($_SESSION['user']['ip']) && $_SESSION['user']['ip'] == $_SERVER['REMOTE_ADDR']) {
                            return true;
                        }
                }
            }
        }
        return false;
    }

    public function logout()
    {
        session_destroy();
        header("Location:index.php");
    }

    // FONCTIONS POUR LES PRO
    public function signup_pro($data)
    {

        $success = false;
        $errors = array();
        if (isset($data['nom']) && isset($data['prenom']) && isset($data['tel_portable']) && isset($data['email']) && isset($data['mot_de_passe'])) {

            $user = $this->encodeChars($data);

            /*    CLEAN XSS     */
            $name = $this->cleanXss($user['nom']);
            $firstname = $this->cleanXss($user['prenom']);
            $entreprise = $this->cleanXss($user['nom_entreprise']);
            $role = $this->cleanXss($user['role']);
            $tel = $this->cleanXss($user['tel_portable']);
            $tel2 = $this->cleanXss($user['tel_fixe']);
            $email = $this->cleanXss($user['email']);
            $password = $this->cleanXss($user['mot_de_passe']);
            $password_confirm = $this->cleanXss($user['password_confirm']);

            /*    VERIFICATION TEXTE     */
            $errors = $this->validationText($errors, $name, 'nom', 2, 50);
            $errors = $this->validationText($errors, $firstname, 'prenom', 2, 50);
            if (!empty($entreprise)) {
                $errors = $this->validationText($errors, $entreprise, 'nom_entreprise', 2, 50);
            }


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


                $this->userModelPro->create($user);
                header('Location: index.php?page=login_pro');
            }
        }
        $this->render("auth.signup_pro", [
            'errors' => $errors
        ]);
    }

    public function login_pro($data)
    {
        $errors = array();

        if (isset($data['email']) && isset($data['mot_de_passe'])) {

            // Faille XSS
            $email = $this->cleanXss($data['email']);
            $password = $this->cleanXss($data['mot_de_passe']);
            if (!empty($email) && !empty($password)) {
                // request  users si il ya un user qui a soit email
                $user = $this->userModelPro->getUserByEmail($email);
                if (!empty($user)) { // $user existe pas => $error = 'erreur credentials'
                    if (password_verify($password, $user->mot_de_passe)) {
                        $_SESSION['user'] = array(
                            'id' => $user->id,
                            'email' => $user->email,
                            'prenom' => $user->prenom,
                            'nom' => $user->nom,
                            'nom_entreprise' => $user->entreprise,
                            'role' => $user->role,
                            'ip' => $_SERVER['REMOTE_ADDR'] // ::1
                        );
                        // redirection index.php
                        header('Location: index.php');
//                        die();
                    } else {
                        $errors['login'] = 'Le mot de passe et l\'email ne correspondent pas.';
                    }
                } else {
                    $errors['login'] = 'Le mot de passe et l\'email ne correspondent pas.';
                }
            } else {
                $errors['login'] = 'Veuillez renseigner les champs.';
            }
        }
        $this->render("auth.login_pro", [
            'errors' => $errors
        ]);

    }

    public function getAllPro()
    {
        return $this->userModelPro->ReadAll();
    }

    // FONCTIONS POUR LES PARENTS
    public function signup_parent($data)
    {
        $success = false;
        $errors = array();
        if (isset($data['nom']) && isset($data['prenom']) && isset($data['tel_portable']) && isset($data['tel_fixe']) && isset($data['email']) && isset($data['mot_de_passe'])) {

            $user = $this->encodeChars($data);

            /*    CLEAN XSS     */
            $name = $this->cleanXss($user['nom']);
            $firstname = $this->cleanXss($user['prenom']);
            $tel = $this->cleanXss($user['tel_portable']);
            $tel2 = $this->cleanXss($user['tel_fixe']);
            $email = $this->cleanXss($user['email']);
            $password = $this->cleanXss($user['mot_de_passe']);
            $password_confirm = $this->cleanXss($user['password_confirm']);

            /*    VERIFICATION TEXTE     */
            $errors = $this->validationText($errors, $name, 'nom', 2, 50);
            $errors = $this->validationText($errors, $firstname, 'prenom', 2, 50);

            /*    VERIFICATION EMAIL     */
            if (!empty($email)) {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = 'Veuillez renseigner un e-mail valide.';
                } else {
                    $verifEmail = $this->userModelParent->getIdByMail($email);
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


                $this->userModelParent->create($user);
                header('Location: index.php?page=login_parent');
            }
        }
        $this->render("auth.signup_parent", [
            'errors' => $errors
        ]);

    }

    public function login_parent($data)
    {
        $errors = array();

        if (isset($data['email']) && isset($data['mot_de_passe'])) {

            // Faille XSS
            $email = $this->cleanXss($data['email']);
            $password = $this->cleanXss($data['mot_de_passe']);
            if (!empty($email) && !empty($password)) {
                // request  users si il ya un user qui a soit email
                $user = $this->userModelParent->getUserByEmail($email);
                if (!empty($user)) { // $user existe pas => $error = 'erreur credentials'
                    if (password_verify($password, $user->mot_de_passe)) {
                        $_SESSION['user'] = array(
                            'id' => $user->id,
                            'email' => $user->email,
                            'prenom' => $user->prenom,
                            'nom' => $user->nom,
                            'role' => $user->role,
                            'ip' => $_SERVER['REMOTE_ADDR'] // ::1
                        );
                        // redirection index.php
                        header('Location: index.php');
//                        die();
                    } else {
                        $errors['login'] = 'Le mot de passe et l\'email ne correspondent pas.';
                    }
                } else {
                    $errors['login'] = 'Le mot de passe et l\'email ne correspondent pas.';
                }
            } else {
                $errors['login'] = 'Veuillez renseigner les champs.';
            }
        }
        $this->render("auth.login_parent", [
            'errors' => $errors
        ]);

    }

    public function getAllParent()
    {
        return $this->userModelParent->ReadAll();
    }
}