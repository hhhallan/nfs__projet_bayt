<?php
session_start();
include 'includes/Database.php';
$host = $_SERVER['HTTP_HOST'];
$uri = $_SERVER['REQUEST_URI'];
$url = sprintf("%s%s%s", "http://", $host, $uri);

$http = explode('/', $url);
$http = $http[0] . '//' . $http[2] . '/' . $http[3];
$bdd = new Database();

if (isset($_POST['submit'])) {
    // Tous les champs ont été remplis ?
    if (!empty(['name', 'firstname','entreprise', 'tel', 'tel2', 'email', 'password', 'password_comfirm'])) {
        extract($_POST);
        if (mb_strlen($name) < 3) {
            $error = 'Nom trop court (minimum 2 caractères)';
        }
        if (mb_strlen($firstname) < 3) {
            $error  = 'Prénom trop court (minimum 2 caractères)';
        }
        if (mb_strlen($entreprise) < 5) {
            $error  = 'Nom de l\'enseigne trop court (minimum 5 caractères)';
        }
        if (mb_strlen($tel) < 10) {
            $error  = 'Numéro de téléphone invalide';
        }
        if (mb_strlen($tel2) < 10) {
            $error  = 'Numéro de téléphone fixe invalide';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Adresse email invalide';
        }
        if (mb_strlen($password) < 6) {
            $error = 'Mot de passe trop court (minimum 6 caractères';
        } else {
            if ($password != $password_comfirm) {
                $error = 'Les deux mots de passe ne correspondent pas';
            }
        }
        if ($bdd->is_already_in_use('email', $email, 'user_part')) {
            $error = 'Adresse email déjà utilisée';
        }
        if (empty($error)) {
            $token = sha1($firstname . $email . $password);
            // Envoi d'un courriel d'activation
            try {
                $saveIsOk = $bdd->prepare(
                    'INSERT INTO user_pro(nom, prenom, nom_entreprise, email, mot_de_passe,tel_portable,tel_fixe) 
                                        VALUE(:nom, :prenom, :nom_entreprise, :email, :mot_de_passe, :tel_portable,:tel_fixe)',
                    [
                        'nom'     => $name,
                        'prenom'   => $firstname,
                        'nom_entreprise' => $entreprise,
                        'email'    => $email,
                        'tel_portable'    => $tel,
                        'tel_fixe'    => $tel2,
                        'mot_de_passe' => sha1($password),
                        /* 'created_at' => '', */
                    ]
                );
            } catch (Exception $e) {
                var_dump($e);
            }
        }
    }
}

?>

<form action="" method="post">
    <h1>Inscription</h1>
    <?php if (isset($error)) { ?> <p style="color: red;"><?= $error ?></p> <?php } ?>
    <?php if (isset($success)) { ?> <p style="color: green;"><?= $success ?></p> <?php } ?>

    <!-- NOM -->
    <span>Nom:</span>
    <input type="text" name="name" id="">

    <!-- PRENOM -->
    <span>Prénom:</span>
    <input type="text" name="firstname" id="">

    <!-- NOM DE L'ENSEIGNE-->
    <span>Nom de l'enseigne:</span>
    <input type="text" name="entreprise" id="">

    <!-- EMAIL -->
    <span>Email:</span>
    <input type="email" name="email" id="">
    <!-- NUMERO DE TELEPHONE PORTABLE -->
    <span>Numéro de téléphone:</span>
    <input type="tel" name="tel" id="">

    <!-- NUMERO DE TELEPHONE FIXE -->
    <span>Numéro de téléphone fixe:</span>
    <input type="tel" name="tel2" id="">

    <!-- MOT DE PASSE -->
    <span>Mot de passe:</span>
    <input type="password" name="password" id="">

    <!-- CONFIRMATION MOT DE PASSE -->
    <span>Confirmation du mot de passe:</span>
    <input type="password" name="password_comfirm" id="">

    <input type="submit" name="submit" value="S'inscrire">
</form>