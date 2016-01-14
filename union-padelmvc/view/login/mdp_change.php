<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
include("view/layout/header.php"); ?>
    <p><?php echo $retour; ?></p>
    <div>
        <h2>Changez votre mot de passe</h2>
        <form class="demi" method="post" action="?module=login&amp;action=mdp_change&amp;id=<?php echo $id;?>">
            <input class="form_champ" type="password" name="mdp1"  placeholder="nouveau mot de passe" required="required">
            <input class="form_champ" type="password" name="mdp2"  placeholder="confirmez le nouveau mot de passe" required="required">
            <input class="form_bt" type="submit" id="submit_connexion" value="Valider">
        </form>
    </div>
<?php include("view/layout/footer.php"); ?>