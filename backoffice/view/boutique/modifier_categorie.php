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

        <form method="post" action="?module=boutique&amp;action=update_categorie&amp;a=<?php echo $categorie['idcategorie_produit']; ?>" class="form-horizontal">
            <label for="mdp">Nom de la catégorie:</label><br />
            <input type="text" name="nom" id="nom" maxlength="45" required="required" value="<?php echo $categorie['categorie_produitnom']; ?>" /> <br />
            <input type="submit" value="Editer"/>
        </form>
    </section>
</div>
<?php include('view/layout/footer.php'); ?>