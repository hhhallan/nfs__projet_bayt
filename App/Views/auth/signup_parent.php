<div class="formcontainerparents">
    <form action="index.php?page=registration_parent" method="post">
        <h1 class="formtitle">Inscription</h1>

        <!-- NOM -->
        <div class="parentnames">
            <div class="surname">
                <!-- NOM -->
                <label for="nom">Nom:</label><br>
                <input type="text" name="nom" id="nom"><br>
                <span class="error"><?php if(!empty($errors['nom'])) { echo $errors['nom']; } ?></span>
            </div>

            <!-- PRENOM -->
            <div class="name">
                <!-- PRENOM -->
                <label for="prenom">Prénom:</label><br>
                <input type="text" name="prenom" id="prenom"><br>
                <span class="error"><?php if(!empty($errors['prenom'])) { echo $errors['prenom']; } ?></span>
            </div>
        </div>

        <!-- EMAIL -->
        <div class="parentemail">
            <!-- EMAIL -->
            <label for="email">E-mail:</label><br>
            <input type="email" name="email" id="email"><br>
            <span class="error"><?php if(!empty($errors['email'])) { echo $errors['email']; } ?></span>
        </div>

        <!-- NUMERO DE TELEPHONE PORTABLE -->
        <div class="parentphones">
            <div class="mobile">
                <!-- NUMERO DE TELEPHONE PORTABLE -->
                <label for="tel_portable">Téléphone portable:</label><br>
                <input type="tel" name="tel_portable" id="tel_portable"><br>
                <span class="error"><?php if(!empty($errors['tel_portable'])) { echo $errors['tel_portable']; } ?></span>


            </div>

            <!-- NUMERO DE TELEPHONE FIXE -->
            <div class="fixe">
                <!-- NUMERO DE TELEPHONE FIXE -->
                <label for="tel_fixe">Téléphone fixe: <span class="little">(optionnel)</span></label><br>
                <input type="tel" name="tel_fixe" id="tel_fixe"><br>
                <span class="error"><?php if(!empty($errors['tel_fixe'])) { echo $errors['tel_fixe']; } ?></span>

            </div>
        </div>

        <!-- MOT DE PASSE -->
        <div class="parentpasswords">
            <div class="password">
                <!-- MOT DE PASSE -->
                <label for="mot_de_passe">Mot de passe:</label><br>
                <input type="password" name="mot_de_passe" id="mot_de_passe"><br>
                <span class="error"><?php if(!empty($errors['mot_de_passe'])) { echo $errors['mot_de_passe']; } ?></span>
            </div>

            <!-- CONFIRMATION MOT DE PASSE -->
            <div class="confirmpassword">
                <!-- CONFIRMATION MOT DE PASSE -->
                <label for="password_confirm">Confirmation du mot de passe:</label><br>
                <input type="password" name="password_confirm" id="password_confirm"><br>
                <span class="error"><?php if(!empty($errors['password_confirm'])) { echo $errors['password_confirm']; } ?></span>
            </div>
        </div>
        <div class="parentsignupbtn">
            <button class="buttonz"> S'inscrire </button>
        </div>
    </form>
</div>