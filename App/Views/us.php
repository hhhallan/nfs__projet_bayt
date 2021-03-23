<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- STYLE CSS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Heebo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
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
        <a id="loginbtn" class="navlink" href="">Log in / Sign up</a>
    </div>
</header>
<div class="wrap">
    <div class="whoarewe">
        <h2 class="whoarewe">Qui sommes nous ?</h2>
        <p class="article">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, quia autem? Neque laborum necessitatibus expedita harum. Vel unde minima nesciunt quod molestiae dolor quibusdam iure cum repudiandae magni! Saepe, temporibus!</p>
    </div>

    <h2 class="lekip">L'équipe</h2>
    <!-- container ou table ? -->
    <!-- problème d'allignement avec Tair -->
    <div class="containerEquipe">
        <div class="miniContainerEquipe">
            <img id="photoProfil" src="../App/Views/assets/img/stonks_meme.jpg" alt="Younes">
            <p class="nom">Younes Bessa</p>
            <p class="roleteam">Développeur Front</p>
        </div>

        <div class="miniContainerEquipe">
            <img id="photoProfil" src="../App/Views/assets/img/stonks_meme.jpg" alt="Benjamin">
            <p class="nom">Benjamin Hervé</p>
            <p class="roleteam">Chef de projet</p>
        </div>

        <div class="miniContainerEquipe">
            <img id="photoProfil" src="../App/Views/assets/img/stonks_meme.jpg" alt="Allan">
            <p class="nom">Allan Leblond</p>
            <p class="roleteam">Développeur Back</p>
        </div>

        <div class="miniContainerEquipe">
            <img id="photoProfil" src="../App/Views/assets/img/stonks_meme.jpg" alt="Tair">
            <p class="nom">Taïr Fall</p>
            <p class="roleteam">Développeur Back</p>
        </div>
    </div>

    <h2>Nos coordonnées</h2>
    <!-- note design -->
    <!-- pour mobile : Ajouter une illustration dans fond bleu coordonnées -->
    <div class="containerCoordonnees">
        <p class="coordonnees">NFactorySchool <br> 24 Place Saint-Marc <br> 76000 Rouen <br> 02 35 70 04 04 <br> <a href="https://nfactory.school/">https://nfactory.school/</a></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2594.4364328442134!2d1.0996354155321455!3d49.43846777934861!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e0df1548cd768b%3A0x70b4b34959b1ec9f!2sNFactory%20School!5e0!3m2!1sfr!2sfr!4v1616005367736!5m2!1sfr!2sfr" width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>
<!--    SCRIPT JAVASCRIPT     -->
<script src=""></script>
<footer>
    <!-- <a href="">En savoir plus</a> -->
    <!-- <a href="">Qui sommes-nous?</a> -->
    <p>Copyright BAYT</p>
    <a href="">Mentions légales</a>
    <a href="#header">Back to top</a>
</footer>
</body>

</html>