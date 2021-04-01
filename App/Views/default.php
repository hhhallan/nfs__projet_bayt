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

function isLoggedParent()
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
} ?>

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

    <link rel="stylesheet" href="../App/Views/assets/css/style.css">
    <title>BAYT - Accueil</title>
</head>

<body>


<header>
    <div class="headercontainer">
        <div class="headercontent"><img src="../App/Views/assets/img/burger_icon.jpg" alt=""></div>
        <div class="headercontent">
            <a href="index.php"><h1>BAYT</h1></a>
        </div>
        <div class="headercontent">
            <?php if (isLogged()) { ?>
                <a class="login" href="index.php?page=logout">DECONNEXION</a>
            <?php } else { ?>
                <a class="login" href="index.php?page=log">Se connecter</a>
                <a class="login" href="index.php?page=sign">S'inscrire</a>
            <?php }

            if (isLoggedPro()) { ?>
                <a href="index.php?page=show">Localisation</a>
            <?php }

            if (isLoggedParent()) { ?>
                <a href="">Mes Enfants</a>
            <?php } ?>

        </div>
    </div>
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

