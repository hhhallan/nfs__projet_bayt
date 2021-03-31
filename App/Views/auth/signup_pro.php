<form action="index.php?page=registration_pro" method="post">
    <h1>Inscription</h1>

    <!-- NOM -->
    <label for="nom">Nom:</label>
    <input type="text" name="nom" id="nom">
    <span class="error"><?php if(!empty($errors['nom'])) { echo $errors['nom']; } ?></span>

    <!-- PRENOM -->
    <label for="prenom">Prénom:</label>
    <input type="text" name="prenom" id="prenom">
    <span class="error"><?php if(!empty($errors['prenom'])) { echo $errors['prenom']; } ?></span>

    <!-- NOM DE L'ENSEIGNE-->
    <label for="nom_entreprise">Nom de l'enseigne: (si vous êtes un organisme)</label>
    <input type="text" name="nom_entreprise" id="nom_entreprise">
    <span class="error"><?php if(!empty($errors['nom_entreprise'])) { echo $errors['nom_entreprise']; } ?></span>

    <!-- EMAIL -->
    <label for="email">Email:</label>
    <input type="email" name="email" id="email">
    <span class="error"><?php if(!empty($errors['email'])) { echo $errors['email']; } ?></span>

    <!-- ROLE -->
    <select name="role" id="role">
        <option value="">-- Role --</option>
        <option value="creche">Crèche</option>
        <option value="assistantemater">Assistante Maternelle</option>
        <option value="babysitter">Baby-sitter</option>
    </select>

    <!-- NUMERO DE TELEPHONE PORTABLE -->
    <label for="tel_portable">Numéro de téléphone:</label>
    <input type="tel" name="tel_portable" id="tel_portable">
    <span class="error"><?php if(!empty($errors['tel_portable'])) { echo $errors['tel_portable']; } ?></span>

    <!-- NUMERO DE TELEPHONE FIXE -->
    <label for="tel_fixe">Numéro de téléphone fixe: (optionnel)</label>
    <input type="tel" name="tel_fixe" id="tel_fixe">
    <span class="error"><?php if(!empty($errors['tel_fixe'])) { echo $errors['tel_fixe']; } ?></span>

    <!-- MOT DE PASSE -->
    <label for="mot_de_passe">Mot de passe:</label>
    <input type="password" name="mot_de_passe" id="mot_de_passe">
    <span class="error"><?php if(!empty($errors['mot_de_passe'])) { echo $errors['mot_de_passe']; } ?></span>

    <!-- CONFIRMATION MOT DE PASSE -->
    <label for="password_confirm">Confirmation du mot de passe:</label>
    <input type="password" name="password_confirm" id="password_confirm">
    <span class="error"><?php if(!empty($errors['password_confirm'])) { echo $errors['password_confirm']; } ?></span>

    <!--    LOCALISATION     -->



<!--    <input type="submit" id="submit" value="S'inscrire">-->
    <button> S'inscrire </button>
</form>
