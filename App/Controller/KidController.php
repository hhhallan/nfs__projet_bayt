<?php

namespace App\Controller;

use App\Model\KidModel;
use Core\Controller\Controller;

class KidController extends Controller
{

    public function __construct()
    {
        $this->kidModel = new KidModel();
    }

    public function addKid($data)
    {
        $errors = array();
        if (isset($data['nom']) && isset($data['prenom']) && isset($data['date_naissance']) && isset($data['personne_1']) /*&& isset($data['tel_1'])*/) {

            $kid = $this->encodeChars($data);
            $user_id = $_SESSION['user']['id'];
            /*    CLEAN XSS     */
            $nom = $this->cleanXss($kid['nom']);
            $prenom = $this->cleanXss($kid['prenom']);
            $date_naissance = $this->cleanXss($kid['date_naissance']);
            $prob_medicaux = $this->cleanXss($kid['prob_medicaux']);
            $allergies = $this->cleanXss($kid['allergies']);
            $personne_1 = $this->cleanXss($kid['personne_1']);
            $personne_2 = $this->cleanXss($kid['personne_2']);
            $tel_1 = $this->cleanXss($kid['tel_1']);
            $tel_2 = $this->cleanXss($kid['tel_2']);


            /*    VERIFICATION TEXTE     */
            $errors = $this->validationText($errors, $nom, 'nom', 2, 25);
            $errors = $this->validationText($errors, $prenom, 'prenom', 2, 25);
            if (!empty($prob_medicaux)) {
                $errors = $this->validationText($errors, $prenom, 'prob_medicaux', 5, 500);
            }
            if (!empty($allergies)) {
                $errors = $this->validationText($errors, $prenom, 'allergies', 5, 500);
            }
            $errors = $this->validationText($errors, $personne_1, 'personne_1', 2, 25);
            if (!empty($personne_2)) {
                $errors = $this->validationText($errors, $personne_2, 'personne_2', 2, 25);
            }


            /*      VERIFICATION TEL    */
            if (!empty($personne_1)) {
                if ($tel_1) {
                    if (is_numeric($tel_1)) {
                        if (mb_strlen($tel_1) != 10) {
                            $errors['tel_1'] = 'Le numéro de téléphone doit comporter 10 chiffres.';
                        }
                    } else {
                        $errors['tel_1'] = 'Veuillez rentrer un numéro de téléphone valide.';
                    }
                } else {
                    $errors['tel_1'] = 'Veuillez renseigner un numéro de téléphone.';
                }
            }

            if (!empty($personne_2)) {
                if ($tel_2) {
                    if (is_numeric($tel_2)) {
                        if (mb_strlen($tel_2) != 10) {
                            $errors['tel_2'] = 'Le numéro de téléphone doit comporter 10 chiffres.';
                        }
                    } else {
                        $errors['tel_2'] = 'Veuillez rentrer un numéro de téléphone valide.';
                    }
                } else {
                    $errors['tel_2'] = 'Veuillez renseigner un numéro de téléphone.';
                }
            }

            /*   0 ERREUR   */
            if (count($errors) === 0) {
                var_dump('insertion');

                $kid['user_id'] = $user_id;
                // insertion BDD
                $this->kidModel->create($kid);
                header('Location: index.php?page=all_kid');
            }
        }
        $this->render("kid", [
            'errors' => $errors
        ]);
    }

    public function getAllKid()
    {

        $kids = $this->kidModel->ReadAll();
        $this->render('allKids', [
            'kids' => $kids
        ]);
    }
}