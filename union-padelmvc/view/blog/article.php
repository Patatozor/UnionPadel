
<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
include("view/layout/header.php"); ?>
    <!-- SERVICE -->
    <div class="actualite actualite_fiche">
        <!-- SERVICE_INTRO -->
        <div class="service_intro">
            <div class="service_intro_photo">

            </div>
            <h1><?php echo $article['Articletitle']?></h1>
        </div>
        <!-- // SERVICE_INTRO -->

        <!-- SERVICE_CONTAINER -->
        <div class="container">
            <!-- service_nav -->
            <nav class="service_nav">
                <ul>
                    <li class="service_nav_principal"><a href="?module=blog&amp;action=liste" title="">Toutes les actualités</a></li>
                    <?php foreach($categoriesa as $categoriea){
                        echo '<li class="service_nav_principal"><a href="?module=blog&amp;action=liste&amp;c='.$categoriea['idCategorie'].'" title="">'.$categoriea['Categoriename'].'</a></li>';
                    }?>
                </ul>
            </nav>
            <!-- // service_nav -->

            <!-- service_contenu -->
            <section class="service_contenu">
                <article class="n-2_2">
                    <p>
                        <i><?php echo $article['Categoriename'];?> - <?php echo $article['Articledate'];?></i>
                    </p>
                    <aside>
                        <img src="assets/img/<?php echo $article['Articleimage'];?>" alt="Illustration de l'article">
                    </aside>
                    <p class="chapo">
                        <?php echo $article['Articlechapo'];?>
                    </p>
                    <?php echo $article['Articlecontent']; ?>
                </article>
                <article class="n-2_2">
                    <h2>Commentaires:</h2>

                    <?php
                    foreach($commentaires as $commentaire){
                        echo '
                    <div class="commentaire">
                        <aside>
                            <img src="assets/img/pictos/forum.png" alt="picto commentaire">
                        </aside>
                        <h3>'.$commentaire['Usersnom_affichage'].'</h3>
                        <p>'.$commentaire['commentsdate'].'</p>
                        <p>
                            '.$commentaire['commentscontent'].'
                        </p>
                    </div>
                    ';
                    }
                    ?>


                    <h2><?php echo $comments;?> personnes ont laissé un commentaire, et vous?</h2>
                    <?php if(isset($_SESSION['id'])){?>
                    <form method="post" action="?module=blog&amp;action=ajout_comment&amp;b=<?php echo $article['idArticle'];?>">
                        <textarea placeholder="votre commentaire ..." name="content"></textarea>
                        <input class="service_form_btn" type="submit" value="commenter">
                        <?php }else{?>
                        <p class="para_info">Vous devez vous connecter ou vous inscrire pour pouvoir commenter cette actualité. <a class="bt_connexion" href="#">se connecter/s'inscrire</a></p>
                        <?php } ?>
                    </form>

                </article>
            </section>
            <!-- // service_contenu -->
        </div>
        <!-- // SERVICE_CONTAINER -->
    </div>
    <!-- // SERVICE -->
<?php include("view/layout/footer.php"); ?>