<?php
session_start();
include 'includes/Database.php';

if(isset($_POST['submit']))  {
    $email = htmlspecialchars($_POST['email']);
    $password = sha1($_POST['password']);

    if((!empty($email)) && (!empty($password))) {
        $requestUser = $bdd->prepare("SELECT * FROM user_part WHERE email = ? AND mot_de_passe = ?");
        $requestUser->execute(array($email, $password));
        $userCount = $requestUser->rowCount();
        if($userCount == 1) {
            $success = 'Vous êtes connecter.'
        } else {
            $error = 'Email ou mot de passe incorrect.';
        }

    } else {
        $error = 'Veuillez remplir tous les champs.';
    }
}
?>
<form action="" method="post">
    <h1>Connexion</h1>
    <?php if (isset($error)) { ?> <p style="color: red;"><?= $error ?></p> <?php } ?>
    <?php if (isset($success)) { ?> <p style="color: green;"><?= $success ?></p> <?php } ?>

    <!-- EMAIL -->
    <span>Email:</span>
    <input type="email" name="email" id="">

    <!-- MOT DE PASSE -->
    <span>Mot de passe:</span>
    <input type="password" name="password" id="">

    <input type="submit" name="submit" value="S'inscrire">
</form>