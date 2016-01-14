<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
//Contrôleur secondaire mise à jour d'un article
$retour = '';
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}else{
    include_once('model/boutique/fonctions_boutique.php');
    include_once('lib/images.php');
    $produit = afficher_produit($_GET['a']);
    if(isset($_POST['nom'])){
        if(empty($_FILES['img']['name'])){
            $img = $produit['produitimg'];
        }else{
            $img=imageadd($_FILES['img']);
            unlink("../union-padelmvc/assets/img/".$produit['produitimg']);
        }
        if(update_produit($_GET['a'], $_POST['nom'],$_POST['marque'], $_POST['prix'], $_POST['caract'],$_POST['text'], $_POST['cat'], $_POST['stock'], $img)){
            $retour = 'La modification a bien été effectuée';
        }else {
            $retour = 'Il y a eu une erreur lors de la mise à jour du produit';
        }
    }
    $url = "?module=boutique&amp;action=produits";
    $action = "Retourner à la gestion des produits";
    $title = 'Edition du produit';
    include_once('view/retour.php');
}