<?php
if($access != 'VALID'){
    header('location:../../index.php');
}

$retour = '';
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}else{
    if(isset($_POST['nom'])){
        include_once('model/boutique/fonctions_boutique.php');
        include_once('lib/images.php');
            $img=imageadd($_FILES['img']);
            if(ajout_produit($_POST['nom'],$_POST['marque'],$_POST['prix'],$_POST['caract'],$_POST['text'] ,$_POST['cat'], $_POST['stock'], $img))
            {
                $retour = 'Le produit a bien été ajouté';
            }else{
                $retour = "Il y a eu une erreur lors de l'ajout du nouveau produit";
            }
    }else{
        $retour = 'Il y a eu une erreur lors du traitement, veuillez réessayer';
    }
}
    $url = '?module=boutique&amp;action=produit_creer';
    $action = "Ajouter un autre produit";
    $title = 'Ajout de produit';
    include_once('view/retour.php');