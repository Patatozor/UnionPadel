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
        $categories = afficher_categories();
        $article = afficher_article($_GET['a']);
        $title = 'Edition de l\'article';
        include_once('view/blog/modifier_article.php');
    }
}