<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
include("view/layout/header.php"); ?>
    <div id="home">
        <div id="home_intro">
            <video poster="assets/img/intro/home.jpg" autoplay loop>
                <source src="assets/video/intro_home_up.mp4">
                <source src="assets/video/intro_home_up.ogv">
                <source src="assets/video/intro_home_up.webm">
            </video>
            <div id="cta_services">
                <p><i>découvrez nos trois services</i></p>
                <article>
                    <div>
                        <a href="?module=map&amp;action=map"><img src="assets/img/pictos/annuaire.png" alt="picto annuaire"></a>
                    </div>
                    <h2><a href="?module=map&amp;action=map">Où jouer ?</a></h2>
                </article>
                <article>
                    <div>
                        <a href="?module=blog&amp;action=liste"><img src="assets/img/pictos/actualite.png" alt="picto actualité"></a>
                    </div>
                    <h2><a href="?module=blog&amp;action=liste">Actualité</a></h2>
                </article>
                <article>
                    <div>
                        <a href="?module=shop&amp;action=liste"><img src="assets/img/pictos/equipements.png" alt="picto équipements"></a>
                    </div>
                    <h2><a href="?module=shop&amp;action=liste">Équipements</a></h2>
                </article>
            </div>
        </div>
        <div id="home_services">


            <!-- SERVICE ACTUALITE -->
            <div class="actualite actualite_liste">
                <!-- SERVICE_INTRO -->
                <div class="service_intro">
                    <div class="service_intro_photo">
                        <p>
                            Des articles à portée internationale qui traitent des nouveautés et des informations du padel.
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
                        <article class="n-1_1">
                            <h2><?php echo $article['Articletitle'];?></h2>
                            <p>
                                <i><?php echo $article['Categoriename'];?> - <?php echo $article['Articledate'];?></i>
                            </p>
                            <aside>
                                <img src="assets/img/<?php echo $article['Articleimage'];?>" alt="Illustration de l'article">
                            </aside>
                            <p class="chapo">
                                <?php echo $article['Articlechapo'];?>
                            </p>
                            <a class="btn btn_actualite" href="?module=blog&amp;action=article&amp;b=<?php echo $article['idArticle'];?>" title="Lire la suite">Lire la suite</a>
                        </article>
                    </section>
                    <!-- // service_contenu -->
                </div>
                <!-- // SERVICE_CONTAINER -->
            </div>
            <!-- // SERVICE ACTUALITE -->


            <!-- SERVICE EQUIPEMENTS -->
            <div class="equipements equipements_liste">
                <!-- SERVICE_INTRO -->
                <div class="service_intro">
                    <div class="service_intro_photo">
                        <p>
                            Des raquettes pour tous les niveaux, des tubes de balles mais également des tenues vestimentaires adéquates pour pratiquer le padel comme un pro.
                        </p>
                    </div>
                    <h1>Équipements</h1>
                </div>
                <!-- // SERVICE_INTRO -->

                <!-- SERVICE_CONTAINER -->
                <div class="container">
                    <!-- service_nav -->
                    <nav class="service_nav">
                        <form class="service_nav_form" method="post" action="?module=shop&amp;action=liste">
                            <input type="search" name="produit_recherche" id="produit_recherche" placeholder="trouver un produit">
                            <select name="marque">
                                <option>choisir une marque</option>
                                <?php foreach($marques as $marque){
                                    echo '<option value="'.$marque['Produitmarque'].'">'.$marque['Produitmarque'].'</option>';
                                }?>
                            </select>
                            <input class="service_form_btn" type="submit" value="Rechercher">
                        </form>
                        <ul>
                            <?php foreach($categoriesp as $categoriep){
                               echo '<li class="service_nav_principal"><a href="?module=shop&amp;action=liste&amp;c='.$categoriep['idcategorie_produit'].'" title="">'.$categoriep['categorie_produitnom'].'</a></li>';
                            }?>
                        </ul>
                    </nav>
                    <!-- // service_nav -->

                    <!-- service_contenu -->
                    <section class="service_contenu">
                        <h2>Tous les produits</h2>
                        <?php foreach($produits as $produit){
                            echo '
                        <article class="n-1_2">
                            <aside>
                                <a href="?module=shop&amp;action=fiche_produit&amp;b='.$produit['idProduits'].'" title="voir le produit"><img src="assets/img/'.$produit['produitimg'].'" alt="photo du produit"></a>
                            </aside>
                            <h3><a href="?module=shop&amp;action=fiche_produit&amp;b='.$produit['idProduits'].'" title="voir le produit">'.$produit['Produitnom'].'</a></h3>
                            <p><a href="?module=shop&amp;action=fiche_produit&amp;b='.$produit['idProduits'].'" title="voir le produit">'.$produit['Produitmarque'].'</a></p>
                            <p><a href="?module=shop&amp;action=fiche_produit&amp;b='.$produit['idProduits'].'" title="voir le produit">'.$produit['Produitprix'].' €</a></p>
                        </article>';
                        }?>

                    </section>
                    <!-- // service_contenu -->
                </div>
                <!-- // SERVICE_CONTAINER -->
            </div>
            <!-- // SERVICE EQUIPEMENTS -->


        </div>






        <div id="home_inscription_twitter">
            <div class="container">
                <div class="service_contenu">
                    <div class="equipements">
                        <?php if(isset($_SESSION['id'])){
                            echo '
                            <h3>Contactez-nous:</h3>
                            <form method="post" action="?module=contact&amp;action=contact">
                                <input type="text" name="sujet" placeholder="sujet du message" required="required" />
                                <textarea name="content" placeholder="votre message ..." required="required"></textarea>
                                <input class="service_form_btn" type="submit" value="Envoyer">
                            </form>';
                        }else{
                            echo '
                            <h3>Inscription</h3>
                            <form class="demi" method="post" action="?module=login&amp;action=inscription">
                                <input class="radio" type="radio" name="type" id="monsieur_inscription" required="required" value="0" checked><label for="monsieur_inscription">monsieur</label>
                                <input class="radio" type="radio" name="type" id="madame_inscription" required="required" value="1" ><label for="madame_inscription">madame</label>
                                <input type="text" name="nom" id="nom_inscription" placeholder="nom" required="required">
                                <input type="text" name="pseudo" id="pseudo_inscription" placeholder="pseudo" required="required">
                                <input type="email" name="login" id="mail_inscription" placeholder="email" required="required">
                                <input type="password" name="mdp" id="pass_inscription" placeholder="mot de passe" required="required">
                                <input type="password" name="mdp2" id="pass_inscription" placeholder="confirmez le mot de passe" required="required">
                                <input class="radio" type="radio" name="newsletter" id="newsletter_oui_inscription" value="1" checked><label for="newsletter_oui_inscription">recevoir la newsletter</label>
                                <input class="radio" type="radio" name="newsletter" id="newsletter_non_inscription" value="0"><label for="newsletter_non_inscription">ne pas recevoir la newsletter</label>
                                <input class="service_form_btn" type="submit"  id="submit_inscription" value="s\'inscrire">
                                <a href="#" class="bt_connexion">se connecter</a>
                            </form>';
                        }?>
                    </div>
                    <div>
                        <a class="twitter-timeline" href="https://twitter.com/UnionPadel" data-widget-id="564853328618991617">Tweets de @UnionPadel</a>
                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include("view/layout/footer.php"); ?>