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

        <form method="post" action="?module=boutique&amp;action=update_produit&amp;a=<?php echo $_GET['a'];?>" enctype="multipart/form-data" class="form-horizontal">
            <label for="nom">Nom du produit:</label>
            <input type="text" name="nom" id="nom" maxlength="45" required="required" value="<?php echo $produit['Produitnom'];?>"/>
            <label for="marque">Marque du produit:</label>
            <input type="text" name="marque" id="marque" maxlength="45" required="required" value="<?php echo $produit['Produitmarque'];?>"/>
            <label for="caract">Caractéristiques du produit:</label>
            <textarea id="caract" name="caract" required="required" cols="40" rows="5"><?php echo $produit['Produitcaracteristiques']; ?></textarea>
            <label for="content">Description du produit:</label>
            <textarea id="text" name="text" required="required" cols="40" rows="10"><?php echo $produit['Produittexte']; ?></textarea>
            <label for="prix">Prix:</label>
            <input type="text" pattern="\d{0,6}[.]?\d{0,2}" name="prix" id="prix" maxlength="8" required="required" value="<?php echo $produit['Produitprix'];?>"/>
            <label for="stock">Stock:</label>
            <input type="text" pattern="\d{0,6}" name="stock" id="stock" maxlength="6" required="required" value="<?php echo $produit['produitstock'];?>"/>
            <label for="img">Image associée au produit:</label>
            <input type="file" id="img" name="img"/>
            <label for="cat">Choisissez une catégorie pour le produit</label>
            <select id="cat" name="cat" required="required">
                <?php foreach($categories as $cat){
                    if($cat['idcategorie_produit']==$produit['categorie_produit_idcategorie_produit']){
                        echo "<option value=".$cat['idcategorie_produit']." selected>".$cat['categorie_produitnom']."</option>";
                    }else{
                        echo "<option value=".$cat['idcategorie_produit'].">".$cat['categorie_produitnom']."</option>";
                    }
                }?>
            </select>
            <input type="submit"/>
        </form>
    </section>
</div>
<?php include('view/layout/footer.php'); ?>