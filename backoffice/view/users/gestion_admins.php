<?php
if($access!='VALID'){
    header('location:../../index.php');
}
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}?>
<?php include('view/layout/header.php'); ?>
<div class="container-fluid">
    <section id="admins">
        <table class="table">
            <tr>
                <th>Pseudo</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        <?php
        foreach($admins as $admin){
            echo '
                <tr>
                    <td>'.$admin['Adminnom_affichage'].'</td>
                    <td><a href="?module=users&amp;action=modif_admin&amp;a='.$admin['idAdmin'].'" >Modifier</a></td>
                    <td><a href="?module=users&amp;action=admins&amp;a='.$admin['idAdmin'].'">Supprimer</a></td>
                </tr>';
        }
        ?>
        </table>
        <p><?php echo $retour; ?></p>
    </section>
    <section id="ajout">
        <form method="post" action="?module=users&amp;action=ajout_admin" class="form-horizontal">
            <label for="login">Login:</label>
            <input type="text" name="login" id="login" maxlength="45" required="required"/>
            <label for="mdp">Nom d'affichage:</label>
            <input type="text" name="nom" id="nom" maxlength="60" required="required"/>
            <label for="mdp">Mot de passe:</label>
            <input type="password" name="mdp" id="mdp" maxlength="60" required="required"/>
            <label for="mdp2">Confirmez votre mot de passe:</label>
            <input type="password" name="mdp2" id="mdp2" maxlength="60" required="required"/>
            <input type="submit"/>
        </form>
    </section>
    </div>
<?php include('view/layout/footer.php'); ?>