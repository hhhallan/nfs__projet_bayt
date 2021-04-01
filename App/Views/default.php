<?php 

include '../Core/Test/Func.php';

function isLoggedUser()
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

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- STYLE CSS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Heebo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../App/Views/assets/css/style.css">
    <title>Document</title>
</head>

<body>
<header id="header">
    <div class="logo">
        <a class="navlogo" href="index.php">BAYT</a>
    </div>
    <div class="navbar">
        <a class="navlink" href="index.php?page=home">Home</a>
<!--        <a class="navlink" href="index.php?page=home">Contact</a>-->
        <a class="navlink" href="index.php?page=about">A propos</a>
        <a class="navlink" href="index.php?page=us">L'équipe</a>
    </div>
    <div>
    <?php if(isLoggedUser()) { ?>
        <li><a href="">Déconnexion</a></li>
        <?php } else { ?>
        <a id="loginbtn" class="navlink" href="../login.php">Log in</a>
        <a id="loginbtn" class="navlink" href="../signup_parent.php">Sign up</a>
        <?php } ?>
    </div>
</header>

<main>
    <div class="container">
        <?= $content; ?>
    </div>
</main>


<!--    SCRIPT JAVASCRIPT     -->
    <script src=""></script>
<footer>
    <!-- <a href="">En savoir plus</a> -->
    <!-- <a href="">Qui sommes-nous?</a> -->
    <p>Copyright BAYT</p>
    <a href="">Mentions légales</a>
    <a href="#header">Back to top</a>
</footer>
</body>

</html>