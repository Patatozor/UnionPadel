<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
//Contrôleur secondaire affichage admin
$retour = '';
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}else{
    if(isset($_GET['a'])){
        include_once('model/boutique/fonctions_boutique.php');
        $categorie = afficher_categorie($_GET['a']);
        $title = 'Edition de catégorie';
        include_once('view/boutique/modifier_categorie.php');
    }
}