<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
include("view/layout/header.php"); ?>
    <!-- SERVICE ANNUAIRE -->
    <div class="annuaire annuaire_liste">
        <!-- SERVICE_INTRO -->
        <div class="service_intro">
            <div class="service_intro_photo">
                <p>
                    Une carte interactive qui affiche l’ensemble des lieux de pratique du padel en France.
                </p>
            </div>
            <h1>Où jouer ?</h1>
        </div>
        <!-- // SERVICE_INTRO -->

        <!-- SERVICE_CONTAINER -->
        <div class="container">
            <!-- service_nav -->
            <nav class="service_nav">
                <form class="service_nav_form" method="post" action="?module=map&amp;action=map">
                    <select name="region">
                        <option value="">choisir une région</option>
                        <?php
                         foreach($regions as $region){
                             echo '<option value="'.$region['clubregion'].'">'.$region['clubregion'].'</option>';
                         }
                        ?>
                    </select>
                    <input class="service_form_btn" type="submit" value="Rechercher">
                </form>
                <ul>
                    <li class="service_nav_principal"><a href="?module=map&amp;action=map" title="">Voir la map</a></li>
                    <li class="service_nav_principal"><a href="?module=map&amp;action=map" title="">Tous les clubs</a></li>
                </ul>
            </nav>
            <!-- // service_nav -->

            <!-- service_contenu -->
            <section class="service_contenu">
                <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
                <script type="text/javascript">

                        function initialiser() {

                            var Padel = new google.maps.LatLng(46.7355367, 3.8451073);

                            var options = {
                                center: Padel,
                                zoom: 5,
                                mapTypeId: google.maps.MapTypeId.ROADMAP
//                                draggable: false,
//                                scrollwheel: true,
//                                panControl: false,
//                                zoomControl: true,
//                                scaleControl: false
                            };


                            var carte = new google.maps.Map(document.getElementById("map-canvas"), options);


                            <?php foreach($clubs as $club){
                                echo '
                            var structure'.$club['idclub'].' = new google.maps.LatLng('.$club['clublatitude'].', '.$club['clublongitude'].');


                            var marker'.$club['idclub'].' = new google.maps.Marker({
                                position: structure'.$club['idclub'].',
                                map: carte
                            });


                            var contentString'.$club['idclub'].' =
                                "<div id=\'content\'>"+
                                "<h1>'.$club['clubnom'].'</h1>"+
                                "<a href=\'?module=map&amp;action=fiche_club&amp;b='.$club['idclub'].'\'>Afficher la fiche du club</a>"+
                                "</div>";


                            var infowindow'.$club['idclub'].' = new google.maps.InfoWindow({
                                content: contentString'.$club['idclub'].'
                            });


                            google.maps.event.addListener(marker'.$club['idclub'].', "click", function(){
                                infowindow'.$club['idclub'].'.open(carte, marker'.$club['idclub'].');
                            });';
                            }
                            ?>

                        }

                        google.maps.event.addDomListener(window, 'load', initialiser);

                </script>
                <div id="map-canvas"></div>
                <?php
                    foreach($clubs as $club){
                        echo '
                        <article class="n-1_1">
                            <h2>'.$club['clubnom'].'</h2>
                            <aside>
                                <img src="assets/img/'.$club['clubimage'].'" alt="logo du club">
                            </aside>
                            <ul>
                                '.$club['clubtexte'].'
                            </ul>
                            <a class="btn btn_fiche_club" href="?module=map&amp;action=fiche_club&amp;b='.$club['idclub'].'" title="Voir la fiche du club">Fiche du club</a>
                        </article>
                        ';
                    }
                ?>

            </section>
            <!-- // service_contenu -->
        </div>
        <!-- // SERVICE_CONTAINER -->
    </div>
    <!-- // SERVICE ANNUAIRE -->
<?php include("view/layout/footer.php"); ?>