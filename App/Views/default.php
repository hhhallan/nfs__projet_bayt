<?php
function isLogged()
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

function isLoggedPro()
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


/*<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- STYLE CSS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Heebo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!--MAP-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
          integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
          crossorigin=""/>

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
        <?php if (isLogged()) { ?>
            <a id="loginbtn" class="navlink" href="index.php?page=logout">DECONNEXION</a>
        <?php } else { ?>
            <a id="loginbtn" class="navlink" href="index.php?page=sign">INSCRIPTION</a>
            <a id="loginbtn" class="navlink" href="index.php?page=log">CONNEXION</a>
        <?php }

        if (isLoggedPro()) { ?>
            <a href="index.php?page=localisation">Localisation</a>
        <?php } ?>


    </div>
</header>

<main>
    <div class="container">
        <?= $content; ?>
    </div>
</main>


<footer>
    <!-- <a href="">En savoir plus</a> -->
    <!-- <a href="">Qui sommes-nous?</a> -->
    <p>Copyright BAYT</p>
    <a href="">Mentions légales</a>
    <a href="#header">Back to top</a>
</footer>

<!--    SCRIPT JAVASCRIPT     -->
<!--MAP-->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../App/Views/assets/js/main.js"></script>
<script src="../App/Views/assets/js/form_loc.js"></script>
</body>

</html>*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!--MAP-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
          integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
          crossorigin=""/>

    <link rel="stylesheet" href="../App/Views/assets/css/style_2.css">
    <title>BAYT - Accueil</title>
</head>

<body>
<header>
    <div class="burger"><img src="assets/img/burger icon.jpg" alt=""></div>
    <h1>BAYT</h1>
    <?php if (isLogged()) { ?>
        <a id="loginbtn" class="login" href="index.php?page=logout">DECONNEXION</a>
    <?php } else { ?>
        <a id="loginbtn" class="login" href="index.php?page=sign">INSCRIPTION</a>
        <a id="loginbtn" class="login" href="index.php?page=log">CONNEXION</a>
    <?php }

    if (isLoggedPro()) { ?>
        <a href="index.php?page=show">Localisation</a>
    <?php } ?>
</header>

<main>
    <div class="container">
        <?= $content; ?>
    </div>
</main>


<!--    SCRIPT JAVASCRIPT     -->
<!--MAP-->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../App/Views/assets/js/main.js"></script>
<script src="../App/Views/assets/js/form_loc.js"></script>
</body>

</html>

