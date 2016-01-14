<?php
if($access!='VALID'){
    header('location:../../index.php');
}
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}?>
<?php include('view/layout/header.php'); ?>
<div class="container-fluid">
    <p><a href="?module=users&amp;action=user_creer">Ajouter un utilisateur</a></p>
    <section id="articles">
        <table class="table">
            <tr>
                <th>Mail</th>
                <th>Nom</th>
                <th>Pseudonyme</th>
                <th>Date d'inscription</th>
                <th>Etat</th>
                <th>Modifier</th>
                <th>Activer/Suspendre</th>
                <th>Supprimer</th>
            </tr>
            <?php
            foreach($users as $user){
                if($user['Usersactif']==1){
                    echo '
                    <tr>
                        <td><a href="?module=users&amp;action=afficher_user&amp;b='.$user['idUsers'].'" >'.$user['Usersmail'].'</a></td>
                        <td>'.$user['Usersnom'].'</td>
                        <td>'.$user['Usersnom_affichage'].'</td>
                        <td>'.$user['Usersdate'].'</td>
                        <td>Actif</td>
                        <td><a href="?module=users&amp;action=modifier_user&amp;a='.$user['idUsers'].'">Modifier</a></td>
                        <td><a href="?module=users&amp;action=users&amp;b=0&amp;s='.$user['idUsers'].'">Suspendre</a></td>
                        <td><a href="?module=users&amp;action=users&amp;a='.$user['idUsers'].'">Supprimer</a></td>
                    </tr>';
                }else{
                    echo'
                    <tr>
                        <td><a href="?module=users&amp;action=afficher_user&amp;b='.$user['idUsers'].'" >'.$user['Usersmail'].'</a></td>
                        <td>'.$user['Usersnom'].'</td>
                        <td>'.$user['Usersnom_affichage'].'</td>
                        <td>'.$user['Usersdate'].'</td>
                        <td>Inactif</td>
                        <td><a href="?module=users&amp;action=modifier_user&amp;a='.$user['idUsers'].'">Modifier</a></td>
                        <td><a href="?module=users&amp;action=users&amp;b=1&amp;s='.$user['idUsers'].'">Activer</a></td>
                        <td><a href="?module=users&amp;action=users&amp;a='.$user['idUsers'].'">Supprimer</a></td>
                    </tr>';
                }
            }
            ?>
        </table>
        <p><?php echo $retour; ?></p>
    </section>
    </div>
<?php include('view/layout/footer.php'); ?>