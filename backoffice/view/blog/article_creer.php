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
        <form method="post" action="?module=blog&amp;action=ajout_article" enctype="multipart/form-data" class="form-horizontal">
            <label for="title">Titre de l'article:</label>
            <input type="text" name="title" id="title" maxlength="45" required="required"/>
            <label for="chapo">Texte introductif:</label>
            <textarea id="chapo" name="chapo" required="required" cols="40" rows="5" maxlength="200"></textarea>
            <label for="content">Contenu de l'article:</label>
            <textarea id="content" name="content" required="required" cols="40" rows="10"></textarea>
            <label for="img">Image associée à l'article:</label>
            <input type="file" id="img" name="img" required="required"/>
            <label for="cat">Choisissez une catégorie pour l'article</label>
            <select id="cat" name="cat" required="required">
                <?php foreach($categories as $category){
                    echo "<option value=".$category['idCategorie'].">".$category['Categoriename']."</option>";
                }?>
            </select>
            <input type="submit"/>
        </form>
    </section>
    </div>
<?php include('view/layout/footer.php'); ?>