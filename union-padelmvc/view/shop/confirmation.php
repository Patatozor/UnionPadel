<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
include("view/layout/header.php"); ?>
    <!-- SERVICE -->
    <div class="equipements confirmation">
        <!-- SERVICE_INTRO -->
        <div class="service_intro">
            <div class="service_intro_photo">
                <p>
                    Des raquettes pour tous les niveaux, des tubes de balles mais également des tenues vestimentaires adéquates pour pratiquer le padel comme un pro.
                </p>
            </div>
            <h1>confirmation</h1>
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
                <form method="post" action="?module=shop&amp;action=enregistrer_commande">
                    <div class="demi">
                        <h2>Facturation</h2>
                        <input type="text" name="prenomf" placeholder="prenom" maxlength="40">
                        <input type="text" name="nomf" placeholder="nom" maxlength="40">
                        <input type="email" name="mailf" placeholder="email" maxlength="50">
                        <input type="text" name="postalf" placeholder="code postal" maxlength="5">
                        <input type="text" name="villef" placeholder="ville" maxlength="50">
                        <input type="text" name="adressef" placeholder="adresse" maxlength="300">
                    </div>
                    <div class="demi">
                        <h2>Adresse de livraison</h2>
                        <input type="text" name="tell" placeholder="telephone" maxlength="16">
                        <input type="text" name="prenoml" placeholder="prenom" maxlength="40">
                        <input type="text" name="noml" placeholder="nom" maxlength="40">
                        <input type="text" name="postall" placeholder="code postal" maxlength="5">
                        <input type="text" name="villel" placeholder="ville" maxlength="50">
                        <input type="text" name="adressel" placeholder="adresse" maxlength="300">
                    </div>
                    <div class="demi">
                        <h2>Paiement</h2>
                        <input type="text" pattern="^[0-9]{4}([ \-]?[0-9]{4}){3}$" name="code" required="required" placeholder="numéro de carte bleu">
                        <input type="text" pattern="^[0-9]{3}$" name="codesecret" required="required" placeholder="code de sécurité">
                        <input type="text" pattern="^[0-9]{2}[/][0-9]{2}$" name="date" required="required" placeholder="date d'expiration mm/aa">
                    </div>
                    <div class="valider">
                        <input class="radio" type="checkbox" name="" id="" value="">
                        <label class="radio" for="">
                            J'ai lu les conditions générales de vente et j'y adhère sans réserve. (<a href="cgv.php" title="cgv">Lire les Conditions générales de vente</a>)
                        </label>
                        <input class="service_form_btn" type="submit" value="commander">
                    </div>
                </form>
            </section>
            <!-- // service_contenu -->
        </div>
        <!-- // SERVICE_CONTAINER -->
    </div>
    <!-- // SERVICE -->
<?php include("view/layout/footer.php"); ?>