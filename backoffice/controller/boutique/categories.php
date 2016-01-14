<?php
if($access != 'VALID'){
    header('location:../../index.php');
}if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}
include_once('model/boutique/fonctions_boutique.php');
$retour = "";
if(isset($_GET['a'])){
    if(article_categorie_update($_GET['a'])){
        if(categorie_delete($_GET['a'])){
            $retour = "La catégorie a bien été supprimée";
        }
    }else{
        $retour = "Il y a eu une erreur lors de la suppression de la catégorie, veuillez réessayer";
    }
}

$categories = afficher_categories();
$title = 'Catégories';
include_once('view/boutique/categories.php');