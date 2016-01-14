<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
//Contrôleur secondaire affichage admin
$retour = '';
    if(isset($_GET['b'])){
        include_once("model/blog/fonctions_blog.php");
        $article = afficher_article($_GET['b']);
        $categoriesa = afficher_categories();
        $comments = compter_comments($_GET['b']);
        $commentaires = afficher_comments($_GET['b']);
        $title = $article['Articletitle'];
        include_once("view/blog/article.php");
    }
