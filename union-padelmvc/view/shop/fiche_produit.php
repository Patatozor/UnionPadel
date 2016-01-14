<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
include("view/layout/header.php"); ?>
    <!-- SERVICE -->
    <div class="equipements equipements_fiche">
        <!-- SERVICE_INTRO -->
        <div class="service_intro">
            <div class="service_intro_photo">
                <p>
                    Des raquettes pour tous les niveaux, des tubes de balles mais également des tenues vestimentaires adéquates pour pratiquer le padel comme un pro.
                </p>
            </div>
            <h1><?php echo $produit['Produitnom'];?></h1>
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
                <article class="n-2_3">
                    <aside>
                        <img src="assets/img/<?php echo $produit['produitimg'];?>" alt="photo du produit">
                    </aside>
                    <div>
                        <ul>
                            <li><?php echo $produit['Produitmarque'];?></li>
                            <?php echo $produit['Produitcaracteristiques'];?>
                            <li><?php echo $produit['Produitprix']; ?> €</li>
                        </ul>
                        <form method="post" action="?module=shop&amp;action=panier_modif&amp;a=<?php echo $produit['idProduits'];?>">
                            <?php switch ($produit['categorie_produitnom']){
                                case "Tee-shirt Homme":
                                    echo '
                                        <select name="taille" required="required">
                                        <option>- taille -</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        </select>
                                    ';
                                    break;
                                case "Tee-shirt Femme":
                                    echo '
                                        <select name="taille" required="required">
                                        <option>- taille -</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        </select>
                                    ';
                                    break;
                                case "Jupe Femme":
                                    echo '
                                        <select name="taille" required="required">
                                        <option>- taille -</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        </select>
                                    ';
                                    break;
                                case "Short Homme":
                                    echo '
                                        <select name="taille" required="required">
                                        <option>- taille -</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        </select>
                                    ';
                                    break;
                                case "Chaussures de Padel Homme":
                                    echo '
                                        <select name="taille" required="required">
                                        <option>- pointure -</option>
                                        <option value="38">38</option>
                                        <option value="39">39</option>
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                        <option value="43">43</option>
                                        <option value="44">44</option>
                                        <option value="45">45</option>
                                        <option value="45">46</option>
                                        </select>
                                    ';
                                    break;
                                case "Chaussures de Padel Femme":
                                    echo '
                                        <select name="taille" required="required">
                                        <option>- pointure -</option>
                                        <option value="35">35</option>
                                        <option value="35">36</option>
                                        <option value="37">37</option>
                                        <option value="38">38</option>
                                        <option value="39">39</option>
                                        <option value="40">40</option>
                                        </select>
                                    ';
                                    break;
                                default:
                                    echo '';
                                    break;
                            }
                            ?>


                            <input type="number" name="quantite" placeholder="quantité">
                            <input class="service_form_btn" type="submit" value="ajouter au panier">
                            <a href="?module=shop&amp;action=panier" title="accéder au panier">Accéder à mon panier</a>
                        </form>
                        <p>
                            <?php echo $produit['Produittexte']; ?>
                        </p>
                    </div>
                </article>
            </section>
            <!-- // service_contenu -->
        </div>
        <!-- // SERVICE_CONTAINER -->
    </div>
    <!-- // SERVICE -->
<?php include("view/layout/footer.php"); ?>