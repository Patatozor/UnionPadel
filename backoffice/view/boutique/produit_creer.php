<?php
if($access!='VALID'){
    header('location:../../index.php');
}
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}?>
<?php include('view/layout/header.php'); ?>
<div class="container-fluid">
    <section id="ajout">

        <form method="post" action="?module=boutique&amp;action=ajout_produit" enctype="multipart/form-data" class="form-horizontal">
            <label for="nom">Nom du produit:</label>
            <input type="text" name="nom" id="nom" maxlength="45" required="required"/>
            <label for="marque">Marque du produit:</label>
            <input type="text" name="marque" id="marque" maxlength="45" required="required"/>
            <label for="caract">Caractéristiques du produit:</label>
            <textarea id="caract" name="caract" required="required" cols="40" rows="5"></textarea>
            <label for="content">Description du produit:</label>
            <textarea id="content" name="text" required="required" cols="40" rows="10"></textarea>
            <label for="nom">Prix:</label>
            <input type="text" pattern="\d{0,6}[.]?\d{0,2}" name="prix" id="prix" maxlength="8" required="required"/>
            <label for="nom">Stock:</label>
            <input type="text" pattern="\d{0,6}" name="stock" id="stock" maxlength="6" required="required"/>
            <label for="img">Image associée au produit:</label>
            <input type="file" id="img" name="img" required="required"/>
            <label for="cat">Choisissez une catégorie pour le produit</label>
            <select id="cat" name="cat" required="required">
                <?php foreach($categories as $category){
                    echo "<option value=".$category['idcategorie_produit'].">".$category['categorie_produitnom']."</option>";
                }?>
            </select><br />
            <input type="submit"/>
        </form>
    </section>
    </div>
<?php include('view/layout/footer.php'); ?>