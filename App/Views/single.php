<?php

//var_dump($user);

$lat = $user->lat;
$lon = $user->lon;

echo '<div id="latUserInfo" style="display: none;">' . $lat . '</div>';
echo '<div id="lonUserInfo" style="display: none;">' . $lon . '</div>';

switch ($user->role) {
    case 'creche':
        $user->role = 'Crèche';
        $role = $user->role;
        break;
    case 'assistantemater':
        $user->role = 'Assistant(e) Maternelle';
        $role = $user->role;
        break;
    case 'babysitter':
        $user->role = 'Baby-sitter';
        $role = $user->role;
        break;

}
?>

<div class="presentation">
    <h3><?= $role; ?></h3>
    <?php if ($user->nom_entreprise) { ?>
        <h1><?= $user->nom_entreprise; ?></h1>
    <?php } else { ?>
        <h1><?= $user->prenom . ' ' . $user->nom; ?></h1>
    <?php } ?>


    <h3>Direction: <?= $user->prenom . ' ' . $user->nom; ?></h3>
</div>
<div class="infocontainer">
    <h2>Contact :</h2>
    <p>
        <span>Adresse :</span>
        <a id="addressSingle" class="hoverSingle"
           href="https://www.google.com/maps/place/"
           target="blank"></a>
    </p>

    <p>
        <span>Email :</span>
        <a class="hoverSingle" href="mailto:<?= $user->email; ?>"><?= $user->email; ?></a>
    </p>

    <span>Téléphone :</span>
    <div>
        <a class="hoverSingle" href="tel:0<?= $user->tel_portable; ?>">0<?= $user->tel_portable; ?></a><br>
        <?php if ($user->tel_fixe) { ?>
            <a class="hoverSingle" href="tel:0<?= $user->tel_fixe; ?>">0<?= $user->tel_portable; ?></a>
        <?php } ?>
    </div>

    <?php if ($role == 'Crèche') { ?>
        <img class="creche" src="../App/Views/assets/img/creche.jpg" alt="crèche">
    <?php } else if ($role == 'Baby-sitter') { ?>
        <img class="creche" src="../App/Views/assets/img/alain_terrieur.jpg" alt="crèche">
    <?php } else { ?>
        <img class="creche" src="../App/Views/assets/img/eddy_don_michel.jpg" alt="crèche">
    <?php } ?>


</div>
