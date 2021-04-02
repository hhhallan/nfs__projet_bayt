<?php
    $day = new DateTime();
?>

<div class="formcontainer">

    <form action="index.php?page=kid" method="post">
        <h1 class="formtitle">Enfant</h1>

        <!-- NOM -->
        <div class="names">
            <div class="surname">
                <label for="nom">Nom:</label><br>
                <input type="text" name="nom"><br>
                <span class="error"><?php if(!empty($errors['nom'])) { echo $errors['nom']; } ?></span>
            </div>

            <!-- PRENOM -->
            <div class="name">
                <label for="prenom">Prénom:</label><br>
                <input type="text" name="prenom"><br>
                <span class="error"><?php if(!empty($errors['prenom'])) { echo $errors['prenom']; } ?></span>
            </div>
        </div>

        <!-- DATE DE NAISSANCE -->
        <div class="birthdate">
            <label for="date_naissance">Date de naissance:</label><br>
            <input type="date" name="date_naissance"
                   max="<?= date_format($day, 'Y-m-d'); ?>">
        </div>

        <div class="infoKid">
            <p>Si plusieurs allergies ou problèmes médicaux, séparez-les par des virgules (,).</p>
        </div>

        <!-- PROBLEMES MEDICAUX -->
        <div class="health">
            <div class="medicalissues">
                <label for="prob_medicaux">Problèmes médicaux:</label><br>
                <textarea name="prob_medicaux" cols="30" rows="10"></textarea><br>
                <span class="error"><?php if(!empty($errors['prob_medicaux'])) { echo $errors['prob_medicaux']; } ?></span>
            </div>

            <!-- ALLERGIES -->
            <div class="allergies">
                <label for="allergies">Allergies:</label><br>
                <textarea name="allergies" cols="30" rows="10"></textarea><br>
                <span class="error"><?php if(!empty($errors['allergies'])) { echo $errors['allergies']; } ?></span>
            </div>
        </div>

        <h2 class="emergencytitle">Personnes à contacter en cas d'urgence</h2>
        <!-- PERSONNE 1 -->
        <div class="emergencypeople">
            <div class="personne1">
                <label for="personne_1">Personne 1:</label><br>
                <input type="text" name="personne_1"><br>
                <span class="error"><?php if(!empty($errors['personne_1'])) { echo $errors['personne_1']; } ?></span>
            </div>

            <!-- PERSONNE 2 -->
            <div class="personne2">
                <label for="personne_2">Personne 2: <span class="little">(optionnel)</span></label><br>
                <input type="text" name="personne_2"><br>
                <span class="error"><?php if(!empty($errors['personne_2'])) { echo $errors['personne_2']; } ?></span>
            </div>
        </div>

        <!-- NUMERO DE TELEPHONE PERSONNE 1 -->
        <div class="emergencycontacts">
            <div class="contact1">
                <label for="tel_1">Numéro de portable:</label><br>
                <input type="tel" name="tel_1"><br>
                <span class="error"><?php if(!empty($errors['tel_1'])) { echo $errors['tel_1']; } ?></span>
            </div>

            <!-- NUMERO DE TELEPHONE PERSONNE 2 -->
            <div class="contact2">
                <label for="tel_2">Numéro de portable: <span class="little">(optionnel)</span></label><br>
                <input type="tel" name="tel_2"><br>
                <span class="error"><?php if(!empty($errors['tel_2'])) { echo $errors['tel_2']; } ?></span>
            </div>
        </div>

        <div class="btnvalidate">
<!--            <input class="submitbtn" type="submit" name="submit" value="Valider">-->
            <button class="buttonz"> Enregistrer </button>
        </div>
    </form>
</div>