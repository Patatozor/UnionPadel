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
    if(isset($_POST['nom'])){
        if(update_categorie($_GET['a'],$_POST['nom'])){
            $retour = 'La modification a bien été effectuée';
        }else {
            $retour = 'Il y a eu une erreur lors de la mise à jour de la catégorie';
        }
    }
    $url = "?module=boutique&amp;action=categories";
    $action = "Retourner à la liste des catégorie de produit";
    $title = 'Edition de catégorie de produit';
    include_once('view/retour.php');
}