<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
include("view/layout/header.php"); ?>
    <!-- SERVICE ACTUALITE -->
    <div class="actualite actualite_liste">
        <!-- SERVICE_INTRO -->
        <div class="service_intro">
            <div class="service_intro_photo">
                <p>
                    Des articles à portée international ou mondial qui traitent des nouveautés et des informations du padel.
                </p>
            </div>
            <h1>Actualité</h1>
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
                <?php foreach($articles as $article){
                    echo '
                <article class="n-1_1">
                    <h2>'.$article['Articletitle'].'</h2>
                    <p>
                        <i>'.$article['Categoriename'].' - '.$article['Articledate'].'</i>
                    </p>
                    <aside>
                        <img src="assets/img/'.$article['Articleimage'].'" alt="Illustration de l\'article">
                    </aside>
                    <p class="chapo">
                        '.$article['Articlechapo'].'
                    </p>
                    <a class="btn btn_actualite" href="?module=blog&amp;action=article&amp;b='.$article['idArticle'].'" title="Lire la suite">Lire la suite</a>
                </article>';
                }?>

            </section>
            <!-- // service_contenu -->
        </div>
        <!-- // SERVICE_CONTAINER -->
    </div>
    <!-- // SERVICE ACTUALITE -->
<?php include("view/layout/footer.php"); ?>