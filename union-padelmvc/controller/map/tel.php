<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
include_once('model/club/fonctions_club.php');
if(isset($_GET['id'])){
    $club = afficher_club($_GET['id']);
    update_click($_GET['id']);
    echo $club['clubtelephone'];
}
?>