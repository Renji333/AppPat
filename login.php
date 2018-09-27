<!doctype html>
<html lang="fr">
<head>
    <meta charset="iso-8859-1">
    <title>Patrithèque</title>

    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/font.css" type="text/css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/homePage.css">

</head>
<body>

<div class="loginPage">

    <div class="blocImg">
        <div class="presHarvest"></div>
    </div>


    <div class="blockLogin">
        <div class="loginForm clearfix">
            <h1>Patrithèque</h1>
            <p>La solution digitale documentaire des professionnels<br />
            du conseil financier et patrimonial</p>

            <form action="" method="post">

                <div class="blokInput">
                    <label for="id">Identifiant</label>
                    <input type="text" id="id" name="id" class="inputText" required/>
                </div>

                <div class="blokInput">
                    <label for="mdp">Mot de passe</label>
                    <input type="password" id="mdp" name="mdp" class="inputText" required/>
                </div>

                <button type="submit">Se connecter</button>
                <p class="link-pass">
                    <a href="http://www.harvest.fr">Mot de passe oublié ?</a><br />
                    <a href="http://www.harvest.fr">Nouvel utilisateur ?</a>
                </p>

                <input type="hidden" name="action" value="my_login_action" />

            </form>

        </div>

        <a href="http://www.harvest.fr" class="bubble">Découvrir la <span>Patrithèque</span></a>

        <div class="logoHarvest">
            <img src="<?php bloginfo('template_directory'); ?>/img/logo-harvest.gif">
        </div>

    </div>


</div>

</body>
</html>