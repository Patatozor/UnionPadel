<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
//Contrôleur secondaire affichage admin
$retour = '';
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}else{
    include_once('model/boutique/fonctions_boutique.php');
    if(isset($_POST['cat'])){
        if(ajout_categorie($_POST['cat'])){
            $retour = 'La catégorie a bien été ajoutée';
        }else{
            $retour = 'Il y a eu une erreur lors de l\'ajout de la catégorie';
        }
    }
    $url = "?module=boutique&amp;action=categories";
    $action = "Ajouter une autre catégorie";
    $title = 'Ajout de catégorie';
    include_once('view/retour.php');
}