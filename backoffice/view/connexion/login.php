<?php
if($access != 'VALID'){
//header('location:../../index.php');
}?>
<?php include('view/layout/header.php'); ?>
<div class="container-fluid">
    <form method="post" action="">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" maxlength="45" required="required"/>
        <label for="mdp">Mot de passe:</label>
        <input type="password" name="mdp" id="mdp" maxlength="60" required="required"/>
        <input type="submit"/>
    </form>
</div>
<?php include('view/layout/footer.php'); ?>