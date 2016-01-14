<?php
if($access!='VALID'){
    header('location:../../index.php');
}
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}?>
<?php include('view/layout/header.php'); ?>
<div class="container-fluid">
    <section id="produit">

        <img src="../union-padelmvc/assets/img/<?php echo $produit["produitimg"];?>" />
        <h2 class="text-center"><?php echo $produit['Produitnom'];?></h2>
        <ul>
            <li>Marque : <?php echo $produit['Produitmarque'];?></li>
            <li>Prix : <?php echo $produit['Produitprix'];?></li>
            <li>Stock restant : <?php echo $produit['produitstock'];?></li>
        </ul>
        <p>Caractéristiques : <?php echo $produit['Produitcaracteristiques'];?></p>
        <p>Description : <?php echo $produit['Produittexte'];?></p>

    </section>
    </div>
<?php include('view/layout/footer.php'); ?>