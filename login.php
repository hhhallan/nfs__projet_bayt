<?php
session_start();
include 'includes/Database.php';

?>
<form action="public/index.php?page=login" method="post">
    <h1>Connexion</h1>
    <?php if (isset($error)) { ?> <p style="color: red;"><?= $error ?></p> <?php } ?>
    <?php if (isset($success)) { ?> <p style="color: green;"><?= $success ?></p> <?php } ?>

    <!-- EMAIL -->
    <span>Email:</span>
    <input type="email" name="email" id="">

    <!-- MOT DE PASSE -->
    <span>Mot de passe:</span>
    <input type="password" name="password" id="">

    <input type="submit" name="submit" value="Se connecter">
</form>