<form action="index.php?page=login_parent" method="post">
    <h1>Connexion</h1>

    <span class="error"><?php if(!empty($errors['login'])) { echo $errors['login']; } ?></span>

<!-- EMAIL -->
<label for="email">Email:</label>
<input type="email" name="email" id="email">

<!-- MOT DE PASSE -->
<label for="mot_de_passe">Mot de passe:</label>
<input type="password" name="mot_de_passe" id="mot_de_passe">

<button> Se connecter </button>
</form>