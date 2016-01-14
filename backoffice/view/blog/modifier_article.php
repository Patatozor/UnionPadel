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

        <form method="post" action="?module=blog&amp;action=update_article&amp;a=<?php echo $_GET['a'];?>" enctype="multipart/form-data" class="form-horizontal">
            <label for="title">Titre de l'article:</label>
            <input type="text" name="title" id="title" maxlength="45" required="required" value="<?php echo $article['Articletitle'];?>"/>
            <label for="chapo">Texte introductif:</label>
            <textarea id="chapo" name="chapo" required="required" cols="40" rows="5" maxlength="200"><?php echo $article['Articlechapo'];?></textarea>
            <label for="content">Contenu de l'article:</label>
            <textarea id="content" name="content" required="required" cols="40" rows="10"><?php echo $article['Articlecontent'];?></textarea>
            <label for="img">Image associée à l'article:</label>
            <input type="file" id="img" name="img"/>
            <label for="cat">Choisissez une catégorie pour l'article</label>
            <select id="cat" name="cat" required="required">
                <?php foreach($categories as $cat){
                    if($cat['idCategorie']==$article['Categorie_idCategorie']){
                        echo "<option value=".$cat['idCategorie']." selected>".$cat['Categoriename']."</option>";
                    }else{
                        echo "<option value=".$cat['idCategorie'].">".$cat['Categoriename']."</option>";
                    }
                }?>
            </select>
            <input type="submit"/>
        </form>
    </section>
</div>
<?php include('view/layout/footer.php'); ?>