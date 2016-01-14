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
        <img src="../union-padelmvc/assets/img/<?php echo $article["Articleimage"];?>" />
        <h2 class="text-center"><?php echo $article['Articletitle'];?></h2>
        <ul>
            <li>Auteur : <?php echo $article['Adminnom_affichage'];?></li>
            <li>Date : <?php echo $article['Articledate'];?></li>
            <li>Catégorie : <?php echo $article['Categoriename'];?></li>
        </ul>
        <p>Description courte : <?php echo $article['Articlechapo'];?></p>
        <p>Description : <?php echo $article['Articlecontent'];?></p>
    </section>
    </div>
<?php include('view/layout/footer.php'); ?>