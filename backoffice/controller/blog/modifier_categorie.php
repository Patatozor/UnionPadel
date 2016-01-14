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
        include_once('model/blog/fonctions_blog.php');
        $categorie = afficher_categorie($_GET['a']);
        $title = 'Edition de catégorie';
        include_once('view/blog/modifier_categorie.php');
    }
}