<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
include("view/layout/header.php"); ?>
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
            <?php
            $i = 0;
            foreach($produits as $produit){
                if($i==0){echo "<div>"; }
                if($i!=0){echo "-->";}
				echo '<article class="n-1_2">
                            <aside>
                                <a href="?module=shop&amp;action=fiche_produit&amp;b='.$produit['idProduits'].'" title="voir le produit"><img src="assets/img/'.$produit['produitimg'].'" alt="photo du produit"></a>
                            </aside>
                            <h3><a href="?module=shop&amp;action=fiche_produit&amp;b='.$produit['idProduits'].'" title="voir le produit">'.$produit['Produitnom'].'</a></h3>
                            <p><a href="?module=shop&amp;action=fiche_produit&amp;b='.$produit['idProduits'].'" title="voir le produit">'.$produit['Produitmarque'].'</a></p>
                            <p><a href="?module=shop&amp;action=fiche_produit&amp;b='.$produit['idProduits'].'" title="voir le produit">'.$produit['Produitprix'].' €</a></p>
                        </article><!--';
                $i++;
                if($i==4){
                    echo "\n</div>\n";
                    $i=0;
                }

            }?>
        </section>
        <!-- // service_contenu -->
    </div>
    <!-- // SERVICE_CONTAINER -->
</div>
<!-- // SERVICE EQUIPEMENTS -->
<?php include("view/layout/footer.php"); ?>