<?php
if($access!='VALID'){
    header('location:../../index.php');
}
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}?>
<?php include('view/layout/header.php'); ?>
<div class="container-fluid">
    <section id="club">
        <img src="../union-padelmvc/assets/img/<?php echo $club["clubimage"];?>" />
        <h2 class="text-center"><?php echo $club['clubnom'];?></h2>
        <ul>
            <li>Adresse : <?php echo $club['clubadresse'];?></li>
            <li>Region : <?php echo $club['clubregion'];?></li>
            <li>Latitude : <?php echo $club['clublatitude'];?></li>
            <li>Longitude : <?php echo $club['clublongitude'];?></li>
            <li>Telephone : <?php echo $club['clubtelephone'];?></li>
            <li>Nombre de clics : <?php echo $club['clubclic'];?></li>
        </ul>
        <p>Description : <?php echo $club['clubtexte'];?></p>

    </section>
    </div>
<?php include('view/layout/footer.php'); ?>