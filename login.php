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
         <div class="blocImg"></div>
         <div class="blockLogin">
            <div class="loginForm clearfix">
               <h1>Patrithèque</h1>
               <p>La solution digitale documentaire des professionnels<br />
                  du conseil financier et patrimonial
               </p>
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
                  <p class="linkPass">
                     <a href="https://www.harvest.fr">Mot de passe oublié ?</a><br />
                     <a href="https://www.harvest.fr">Nouvel utilisateur ?</a>
                  </p>
                  <input type="hidden" name="action" value="my_login_action" />
               </form>
            </div>
            <a href="https://www.harvest.fr/solution/patritheque/" class="bubble" target="_blank">Découvrir la <span>Patrithèque</span></a>
            <div class="logoHarvest">
               <a href="https://www.harvest.fr" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/logo-harvest.gif"></a>
            </div>
         </div>
      </div>
   </body>
</html>