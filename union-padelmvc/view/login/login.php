<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
include("view/layout/header.php"); ?>
    <div id="connexion">
        <h2>Connexion</h2>
        <form class="demi" method="post" action="?module=login&action=login">
            <input class="form_champ" type="email" name="login" id="pseudo_connexion" placeholder="email" required="required">
            <input class="form_champ" type="password" name="mdp" id="pass_connexion" placeholder="mot de passe" required="required">
            <input class="form_bt" type="submit" id="submit_connexion" value="se connecter">
        </form>
    </div>
<?php include("view/layout/footer.php"); ?>