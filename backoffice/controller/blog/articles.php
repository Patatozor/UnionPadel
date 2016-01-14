<?php
if($access != 'VALID'){
    header('location:../../index.php');
}if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}
include_once('model/blog/fonctions_blog.php');
$retour = "";
if(isset($_GET['a'])){
    if(article_delete($_GET['a'])){
        $retour = "L'article a bien été supprimé";
    }else{
        $retour = "Il y a eu une erreur lors de la suppression de l'article, veuillez réessayer";
    }
}

$articles = afficher_articles();
$title = 'Gestion des articles';
include_once('view/blog/articles.php');