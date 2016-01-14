<?php
if($access!='VALID'){
    header('location:../../index.php');
}
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}?>
<?php include('view/layout/header.php'); ?>
<div class="container-fluid">
    <section id="categories">

        <h3 class="text-center">Liste des catégories existantes</h3>
        <table class="table">
            <tr>
                <th>Nom de la catégorie</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php
            foreach($categories as $categorie){
                echo '
                    <tr>
                        <td>'.$categorie['categorie_produitnom'].'</td>
                        <td><a href="?module=boutique&amp;action=modifier_categorie&amp;a='.$categorie['idcategorie_produit'].'" >Modifier</a></td>
                        <td><a href="?module=boutique&amp;action=categories&amp;a='.$categorie['idcategorie_produit'].'">Supprimer</a></td>
                    </tr>';
            }
            ?>
        </table>
        <p><?php echo $retour; ?></p>
    </section>
    <section id="ajout">
        <h3 class="text-center">Ajouter une catégorie d'article</h3>
        <form method="post" action="?module=boutique&amp;action=ajout_categorie" class="form-horizontal">
            <label for="cat">Nom de la catégorie:</label><br />
            <input type="text" name="cat" id="cat" maxlength="45" required="required"/> <br />
            <input type="submit"/>
        </form>
    </section>
    </div>
<?php include('view/layout/footer.php'); ?>