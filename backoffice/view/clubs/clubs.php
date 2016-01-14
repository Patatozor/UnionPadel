<?php
if($access!='VALID'){
    header('location:../../index.php');
}
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}?>
<?php include('view/layout/header.php'); ?>
<div class="container-fluid">
    <p><a href="?module=clubs&amp;action=club_creer">Ajouter un club</a></p>
    <section id="articles">
        <table class="table">
            <tr>
                <th>Nom</th>
                <th>Région</th>
                <th>Adresse</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php
            foreach($clubs as $club){
                echo '
                    <tr>
                        <td><a href="?module=clubs&amp;action=afficher_club&amp;b='.$club['idclub'].'" >'.$club['clubnom'].'</a></td>
                        <td>'.$club['clubregion'].'</td>
                        <td>'.$club['clubadresse'].'</td>
                        <td><a href="?module=clubs&amp;action=modifier_club&amp;a='.$club['idclub'].'">Modifier</a></td>
                        <td><a href="?module=clubs&amp;action=clubs&amp;a='.$club['idclub'].'">Supprimer</a></td>
                    </tr>';
            }
            ?>
        </table>
        <p><?php echo $retour; ?></p>
    </section>
    </div>
<?php include('view/layout/footer.php'); ?>