<div class="formcontainerCO">
    <form action="index.php?page=login_parent" method="post">
        <h1 class="formtitle">Connexion</h1>
        <div class="connexionform">

            <span class="error"><?php if(!empty($errors['login'])) { echo $errors['login']; } ?></span>
            <!-- EMAIL -->
            <div class="email">
                <label for="email">Email:</label><br>
                <input type="email" name="email">
            </div>
            <!-- MOT DE PASSE -->
            <div class="password">
                <label for="mot_de_passe">Mot de passe:</label><br>
                <input type="password" name="mot_de_passe">
            </div>
        </div>
        <div class="loginbtn">
            <button> Se connecter </button>
        </div>
    </form>
</div>