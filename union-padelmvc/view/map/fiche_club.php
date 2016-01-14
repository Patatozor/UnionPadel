<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
include("view/layout/header.php"); ?>
    <!-- SERVICE -->
    <div class="annuaire annuaire_fiche">
        <!-- SERVICE_INTRO -->
        <div class="service_intro">
            <div class="service_intro_photo">
                <p>
                    Une carte interactive qui affiche l’ensemble des lieux de pratique du padel en France.
                </p>
            </div>
            <h1><?php echo $club['clubnom']; ?></h1>
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
            <script type="text/javascript">
                $(document).ready( function(){
                    $("#tel").click(function(){
                        $("#tel").load("?module=map&action=tel&id=<?php echo $club['idclub'];?>")
                    });
                });
            </script>
            <section class="service_contenu">
                <article class="n-2_1">
                    <aside>
                        <img src="assets/img/<?php echo $club['clubimage'];?>" alt="logo du club">
                    </aside>
                    <ul>
                        <li>Région: <?php echo $club['clubregion'];?></li>
                        <li><?php echo $club['clubadresse'];?></li>
                    </ul>
                    <ul>
                        <li id="tel">Afficher le numero de téléphone</li>
                    </ul>
                    <p>
                        <?php echo $club['clubtexte'];?>
                    </p>
                </article>
                <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
                <script type="text/javascript">
                    function initialiser() {

                        var club = new google.maps.LatLng(<?php echo $club['clublatitude'];?>, <?php echo $club['clublongitude'];?>);


                        var options = {
                            center: club,
                            zoom: 14,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
//                            draggable: true,
//                            scrollwheel: true,
//                            panControl: false,
//                            zoomControl: true,
//                            scaleControl: false
                        };

                        var carte = new google.maps.Map(document.getElementById("map-canvas"), options);

                        var marker = new google.maps.Marker({
                            position: club,
                            map: carte
                        });


                        var contentString =
                            "<div id='content'>"+
                            "<h2><?php echo $club['clubnom'];?></h2>"+
                            "</div>";

                        var infowindow = new google.maps.InfoWindow({
                            content: contentString
                        });

                        google.maps.event.addListener(marker, 'click', function(){
                            infowindow.open(carte, marker);
                        });

                    }

                    google.maps.event.addDomListener(window, 'load', initialiser);

                </script>
                <div id="map-canvas"></div>
            </section>
            <!-- // service_contenu -->
        </div>
        <!-- // SERVICE_CONTAINER -->
    </div>
    <!-- // SERVICE -->
<?php include("view/layout/footer.php"); ?>