<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
include("view/layout/header.php"); ?>
    <!-- SERVICE -->
    <div class="actualite_liste">
        <!-- SERVICE_INTRO -->
        <div class="service_intro">
            <div class="service_intro_photo">

            </div>
            <h1>Mentions légales</h1>
        </div>
        <!-- // SERVICE_INTRO -->

        <!-- SERVICE_CONTAINER -->
        <div class="container">
            <!-- service_nav -->
            <nav class="service_nav">
                <ul>
                    <li class="service_nav_principal"><a href="?module=mentions&amp;action=mentions" title="">Mentions légales</a></li>
                    <li class="service_nav_principal"><a href="?module=mentions&amp;action=conditions_utilisation" title="">Conditions d'utilisation</a></li>
                    <li class="service_nav_principal"><a href="?module=mentions&amp;action=conditions_vente" title="">Conditions de vente</a></li>
                </ul>
            </nav>
            <!-- // service_nav -->

            <!-- service_contenu -->
            <section class="service_contenu">
                <h2>1. Présentation du site</h2>
                <p>En vertu de l'article 6 de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique, il est précisé aux utilisateurs du site <a href="http://www.union-padel.fr/" title="Union Padel - www.union-padel.fr">www.union-padel.fr</a> l'identité des différents intervenants dans le cadre de sa réalisation et de son suivi :</p>
                <p><strong>Propriétaire</strong> : Union Padel – SAS – 28 place de la Bourse 75002 Paris<br />
                    <strong>Créateur</strong>  : <a href="http://www.eemi.com/">Rémi Fumeron - Célestin Courdeau</a><br />
                    <strong>Responsable publication</strong> : Jean Gouiran – jean.gouiran@etudiant-eemi.com<br />
                    Le responsable publication est une personne physique ou une personne morale.<br />
                    <strong>Webmaster</strong> : Rémi Fumeron – remi.fumeron@etudiant-eemi.com<br />
                    <strong>Hébergeur</strong> : OVH – 2 rue Kellermann 59100 Roubaix<br />
                    Crédits : les mentions légales ont été générées et offertes par Subdelirium <a target="_blank" href="http://www.subdelirium.com/competences/creation-de-sites-web/creation-de-site-internet-en-charente/creation-de-site-internet-angouleme/" alt="creation site internet angouleme">création de site internet Angoulême</a></p>
            </section>
            <!-- // service_contenu -->
        </div>
        <!-- // SERVICE_CONTAINER -->
    </div>
    <!-- // SERVICE -->
<?php include("view/layout/footer.php"); ?>