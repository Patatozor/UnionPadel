<?php
if($access!='VALID'){
    header('location:../../index.php');
}
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}?>
<?php include('view/layout/header.php'); ?>
    <div class="container-fluid">
    <section id="user">
        <h3 class="text-center"><?php echo $user['Usersnom_affichage'];?></h3>
        <ul>
            <li>Nom : <?php echo $user['Usersnom'];?></li>
            <li>Mail : <?php echo $user['Usersmail'];?></li>
            <li>Date d'inscription : <?php echo $user['Usersdate'];?></li>
            <li>Sexe : <?php if($user['Userstype']==0){echo 'Homme';}else{echo 'Femme';}?></li>
            <li>Statut : <?php if($user['Usersactif']==1){echo 'Actif';}else{echo 'Inactif';}?></li>
        </ul>
    </section>
    </div>
<?php include('view/layout/footer.php'); ?>