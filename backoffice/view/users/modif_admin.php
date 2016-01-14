<?php
if($access!='VALID'){
    header('location:../../index.php');
}
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}?>
<?php include('view/layout/header.php'); ?>
<div class="container-fluid">
    <section id="modif">
        <form method="post" action="?module=users&amp;action=update_admin&amp;a=<?php echo $admin['idAdmin']; ?>" class="form-horizontal">
            <label for="mdp">Nom d'affichage:</label>
            <input type="text" name="nom" id="nom" maxlength="60" required="required" value="<?php echo $admin['Adminnom_affichage']; ?>" />
            <label for="mdp">Nouveau mot de passe:</label>
            <input type="password" name="mdp" id="mdp" maxlength="60" required="required"/>
            <label for="mdp2">Confirmez votre nouveau mot de passe:</label>
            <input type="password" name="mdp2" id="mdp2" maxlength="60" required="required"/>
            <input type="submit" value="Editer"/>
        </form>
    </section>
    </div>
<?php include('view/layout/footer.php'); ?>