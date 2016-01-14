<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
include_once('model/blog/fonctions_blog.php');
$retour = "";
if(isset($_GET['c'])){
    $cat = $_GET['c'];
    $articles = afficher_articles_liste($cat);
}else{
    $cat = 0;
    $articles = afficher_articles_liste($cat);
}

$categoriesa = afficher_categories();
$title = 'Liste des articles';
include_once('view/blog/liste.php');