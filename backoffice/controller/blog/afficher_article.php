<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
//Contrôleur secondaire affichage admin
$retour = '';
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}else{
    if(isset($_GET['b'])){
        include_once("model/blog/fonctions_blog.php");
        $article = afficher_article($_GET['b']);
        $title = $article['Articletitle'];
        include_once("view/blog/afficher_article.php");
    }
}