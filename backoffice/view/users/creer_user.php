<?php
if($access!='VALID'){
    header('location:../../index.php');
}
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}?>
<?php include('view/layout/header.php'); ?>
    <div class="container-fluid">
    <section id="ajout">
        <form method="post" action="?module=users&amp;action=ajout_user" class="form-horizontal">
            <label for="mail">Adresse mail:</label>
            <input type="email" name="mail" id="mail" maxlength="45" required="required"/>
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" maxlength="20" required="required"/>
            <label for="type">Sexe:</label>
            <select name="type" id="type" required="required">
                <option value="0">Homme</option>
                <option value="1">Femme</option>
            </select><br />
            <label for="pseudo">Pseudonyme:</label>
            <input type="text" name="pseudo" id="pseudo" maxlength="45" required="required"/>
            <label for="mdp">Mot de passe:</label>
            <input type="password" name="mdp" id="mdp" maxlength="60" required="required"/>
            <label for="mdp2">Confirmez votre mot de passe:</label>
            <input type="password" name="mdp2" id="mdp2" maxlength="60" required="required"/>
            <input type="submit"/>
        </form>
    </section>
        </div>
<?php include('view/layout/footer.php'); ?>