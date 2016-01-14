<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
include("view/layout/header.php"); ?>
    <!-- SERVICE -->
    <div class="equipements contact">
        <!-- SERVICE_INTRO -->
        <div class="service_intro">
            <div class="service_intro_photo">

            </div>
            <h1>En savoir plus sur Union Padel</h1>
        </div>
        <!-- // SERVICE_INTRO -->

        <!-- SERVICE_CONTAINER -->
        <div class="container">
            <!-- service_nav -->
            <nav class="service_nav">
                <ul>
                    <li class="service_nav_principal"><a href="#entreprise" title="">L'entreprise</a></li>
                    <li class="service_nav_principal"><a href="#equipe" title="">L'équipe</a></li>
                    <li class="service_nav_principal"><a href="#contact" title="">Contact</a></li>
                </ul>
            </nav>
            <!-- // service_nav -->

            <!-- service_contenu -->
            <section class="service_contenu">
                <article id="entreprise">
                    <h2>L'entreprise Union-Padel</h2>
                    <p>
                        L’entreprise UnionPadel s’est créée fin septembre 2014, elle est constituée de cinq membres :
                    </p>
                    <ul>
                        <li>Trois marketeurs</li>
                        <li>Un designer</li>
                        <li>Un développeur</li>
                    </ul>
                    <p>
                        L’équipe est partie d’un constat : le padel est un sport souvent inconnue du « grand public » alors qu’il est présent dans les pays hispaniques au même titre que le football par exemple.
                    </p>
                    <p>
                        Les membres se sont ainsi coordonnés pour développer une plateforme e-commerce performante qui regroupe trois services principaux.
                    </p>
                    <ul>
                        <li>Où jouer ? : Une carte interactive qui affiche l’ensemble des lieux de pratique du padel en France. </li>
                        <li>L’actualité : Des articles à portée international ou mondial qui traitent des nouveautés et des informations du padel. </li>
                        <li>La vente d’équipements : Des raquettes pour tous les niveaux, des tubes de balles mais également des tenues vestimentaires adéquates pour pratiquer le padel comme un pro. </li>
                    </ul>
                    <p>
                        UnionPadel est unique sur le marché du padel online : c’est la seule plateforme qui propose à ces clients différents service sur un même site.
                    </p>
                </article>
                <article id="equipe">
                    <h2>L'équipe d'Union Padel</h2>
                    <div>
                        <img src="assets/img/equipe/jean.png" alt="">
                        <h3>Chef J. Gouiran</h3>
                        <p>
                            Webmarketing<br>(Chef de projet)
                        </p>
                    </div>
                    <div>
                        <img src="assets/img/equipe/remi.png" alt="">
                        <h3>R. fumeron</h3>
                        <p>
                            Développement
                        </p>
                    </div>
                    <div>
                        <img src="assets/img/equipe/julien.png" alt="">
                        <h3>J. Bescher</h3>
                        <p>
                            Webmarketing
                        </p>
                    </div>
                    <div>
                        <img src="assets/img/equipe/dan.png" alt="">
                        <h3>D. Opatowski</h3>
                        <p>
                            Webmarketing
                        </p>
                    </div>
                    <div>
                        <img src="assets/img/equipe/celestin.png" alt="">
                        <h3>C. Courdeau</h3>
                        <p>
                            Webdesign
                        </p>
                    </div>
                </article>
                <article id="contact">
                    <h2>Contactez-nous:</h2>
                    <p>
                        Si vous avez la moindre interrogation, que vous voulez en savoir plus sur Union Padel envoyez-nous un message et nous vous répondrons dans les plus brefs délais.
                    </p>
                    <form method="post" action="?module=contact&action=contact">
                    <?php if(isset($_SESSION['id'])){
                        echo '

                                <input type="text" name="sujet" placeholder="sujet du message" required="required" />
                                <textarea name="content" placeholder="votre message ..." required="required"></textarea>
                            ';
                    }else {
                        echo '
                                <input type="email" name="mail" placeholder="votre adresse mail" required="required" />
                                <input type="text" name="sujet" placeholder="sujet du message" required="required" />
                                <textarea name="content" placeholder="votre message ..." required="required"></textarea>
                        ';
                    }?>
                        <input class="service_form_btn" type="submit" value="Envoyer">
                    </form>
            </section>
            <!-- // service_contenu -->
        </div>
        <!-- // SERVICE_CONTAINER -->
    </div>
    <!-- // SERVICE -->
<?php include("view/layout/footer.php"); ?>