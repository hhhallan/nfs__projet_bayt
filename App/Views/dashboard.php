<div class="wrap_dashboard">

    <p class="text_dashboard">Bienvenue chez vous !</p>

        <div class="boutons">

            <a href="index.php?page=dashboard" class="tuile">Mon compte</a>

            <?php if ($loggedPro === true) { ?>
                <a href="#" class="tuile">Mes factures</a>
                <a href="#" class="tuile">Planning</a>
                <a href="index.php?page=show" class="tuile">Localisation</a>
            <?php } else if ($loggedParent === true) { ?>
                <a href="index.php?page=all_kid" class="tuile">Mes enfants</a>
                <a href="#" class="tuile">Mes paiements</a>
            <a href="index.php" class="tuile">Trouver un garde d'enfant</a>
            <?php } ?>
        </div>
    </div>