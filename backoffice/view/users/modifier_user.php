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
        <form method="post" action="?module=users&amp;action=update_user&amp;a=<?php echo $_GET['a'];?>" class="form-horizontal">
            <label for="mail">Adresse mail:</label>
            <input type="email" name="mail" id="mail" maxlength="45" required="required" value="<?php echo $user['Usersmail']; ?>"/>
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" maxlength="20" required="required" value="<?php echo $user['Usersnom']; ?>"/>
            <label for="type">Sexe:</label>
            <select name="type" id="type" required="required">
            <?php if($user['Userstype']==0){echo '
                <option value="0" selected>Homme</option>
                <option value="1">Femme</option>';
            }else{echo '
                <option value="0">Homme</option>
                <option value="1" selected>Femme</option>
            ';}?>
            </select><br />
            <label for="pseudo">Pseudonyme:</label>
            <input type="text" name="pseudo" id="pseudo" maxlength="45" required="required" value="<?php echo $user['Usersnom_affichage']; ?>"/>
            <label for="mdp">Mot de passe:</label>
            <input type="password" name="mdp" id="mdp" maxlength="60" required="required"/>
            <label for="mdp2">Confirmez votre mot de passe:</label>
            <input type="password" name="mdp2" id="mdp2" maxlength="60" required="required"/>
            <input type="submit"/>
        </form>
    </section>
    </div>
<?php include('view/layout/footer.php'); ?>