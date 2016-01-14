<?php
if($access != 'VALID'){
    header('location:../../index.php');
}

$retour = '';
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}else{
    include_once("model/blog/fonctions_blog.php");
    $categories = afficher_categories();
    $title = 'Ajout d\'article';
    include_once('view/blog/article_creer.php');
}