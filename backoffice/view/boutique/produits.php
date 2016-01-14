<?php
if($access!='VALID'){
    header('location:../../index.php');
}
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}?>
<?php include('view/layout/header.php'); ?>
<div class="container-fluid">
    <p><a href="?module=boutique&amp;action=produit_creer">Ajouter un produit</a></p>
    <form action="?module=boutique&amp;action=produits" method="post">
        <label for="cat">Sélectionner une catégorie de tri</label>
        <select id="cat" name="cat">
            <option value="NULL"></option>
            <?php
                foreach($categories as $category){
                    if($category['idcategorie_produit']==$_POST['cat']){
                        echo '<option value="'.$category['idcategorie_produit'].'" selected>'.$category['categorie_produitnom'].'</option>';
                    }else{
                        echo '<option value="'.$category['idcategorie_produit'].'">'.$category['categorie_produitnom'].'</option>';
                    }
                }
            ?>
        </select>
        <input type="submit" value="Trier" />
    </form>
    <section id="produits">
        <table class="table">
            <tr>
                <th>Nom</th>
                <th>Marque</th>
                <th>Stock</th>
                <th>Prix</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php
            foreach($produits as $produit){
                echo '
                    <tr>
                        <td><a href="?module=boutique&amp;action=afficher_produit&amp;b='.$produit['idProduits'].'" >'.$produit['Produitnom'].'</a></td>
                        <td>'.$produit['Produitmarque'].'</td>
                        <td>'.$produit['produitstock'].'</td>
                        <td>'.$produit['Produitprix'].'</td>
                        <td><a href="?module=boutique&amp;action=modifier_produit&amp;a='.$produit['idProduits'].'">Modifier</a></td>
                        <td><a href="?module=boutique&amp;action=produits&amp;a='.$produit['idProduits'].'">Supprimer</a></td>
                    </tr>';
            }
            ?>
        </table>
        <p><?php echo $retour; ?></p>
    </section>
    </div>
<?php include('view/layout/footer.php'); ?>