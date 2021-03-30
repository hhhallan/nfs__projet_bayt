<img class="maison" src="../App/Views/assets/img/joliemaison.jpg" alt="Jolie maison">
<h3>Intro du site</h3>
<p class="introtxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit,<br> sed do eiusmod tempor incididunt ut
    labore et dolore<br>
    magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
<div class="introbtns">
    <a href="">En savoir plus</a>
    <a href="">S'inscrire / Se connecter</a>
    <a href="">Qui sommes-nous ?</a> <br>
</div>


<?php


foreach ($proUsers as $proUser) : ?>

    <div class="person">
    <img class="oldman" src="../App/Views/assets/img/oldman.jpg" alt="Robert Fox">
    <div>
        <?php if (!empty($proUser->prenom && $proUser->nom)) { ?>
            <h3><?= $proUser->prenom . ' ' . $proUser->nom; ?></h3>
        <?php } ?>

        <?php if (!empty($proUser->nom_entreprise)) { ?>
            <h3><?= $proUser->nom_entreprise; ?></h3>
        <?php } ?>

        <h2><?= $proUser->role; ?></h2>

        <p>E-mail: <?= $proUser->email; ?></p>
        <p>Tél. fixe: 0<?= $proUser->tel_fixe; ?></p>
        <p>Tél. portable: 0<?= $proUser->tel_portable; ?></p>
        <p class="presentationtxt">"Attiré par les enfants depuis ma<br> sortie de prison, je suis devenu<br>
            assistant
            maternel."</p>

        <p><?= $proUser->lat ?></p>
        <p><?= $proUser->lon ?></p>
    </div>
</div>


 <?php endforeach; ?>

 <div STYLE="height: 100vh;width: 50%;" id="maCarte"></div>