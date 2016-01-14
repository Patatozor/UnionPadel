<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
include("view/layout/header.php"); ?>
    <!-- SERVICE -->
    <div class="equipements panier">
        <!-- SERVICE_INTRO -->
        <div class="service_intro">
            <div class="service_intro_photo">
                <p>
                    Des raquettes pour tous les niveaux, des tubes de balles mais également des tenues vestimentaires adéquates pour pratiquer le padel comme un pro.
                </p>
            </div>
            <h1>Panier</h1>
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
                <article class="n-2_4">
                    <?php foreach($paniers as $panier){
                        echo '
                        <div>
                            <aside>
                                <img src="assets/img/'.$panier['img'].'" alt="photo du produit">
                            </aside>
                            <ul>
                                <li>'.$panier['nom'].'</li>
                                <li>'.$panier['marque'].'</li>
                                <li>taille: - '.$panier['taille'].'</li>
                            </ul>
                            <ul>
                                <li>quantité '.$panier['qt'].'</li>
                                <li>prix unitaire: '.$panier['prix'].' €</li>
                            </ul>
                            <aside>
                                <a href="?module=shop&amp;action=panier_modif&amp;d='.$panier['id'].'"><img src="assets/img/pictos/annuler.png"></a>
                            </aside>
                        </div>
                        ';
                    }?>
                    <div>
                        <ul>
                            <li>Nombre d'articles : <?php echo $nbarticles; ?></li>
                            <li>Prix total du panier : <?php echo $prixtot; ?> €</li>
                        </ul>
                    </div>
                    <div>
                        <?php if($nbarticles != 0){
                            if(isset($_SESSION['id'])){
                                echo '
                            <a class="" href="?module=shop&amp;action=panier_modif&amp;v='.$panier['id'].'">Vider le panier</a>
                            <a class="" href="?module=shop&amp;action=confirmation">Passer à la confirmation d\'achat</a>';
                            }else{
                                echo '
                                <a class="" href="?module=shop&amp;action=panier_modif&amp;v='.$panier['id'].'">Vider le panier</a>
                                <a class="bt_connexion" href="#">Connexion</a>';
                            }

                        }?>
                    </div>
                </article>
            </section>
            <!-- // service_contenu -->
        </div>
        <!-- // SERVICE_CONTAINER -->
    </div>
    <!-- // SERVICE -->
<?php include("view/layout/footer.php"); ?>