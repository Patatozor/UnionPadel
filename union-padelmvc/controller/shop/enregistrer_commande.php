<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
include_once('model/shop/fonctions_boutique.php');
$paniers = panier_lire();
if(isset($_POST['tell'])){
    $num = uniqid();
    if(commande_enregistrer($_SESSION['id'],$_POST['tell'],$_POST['prenomf'], $_POST['nomf'],$_POST['villef'],$_POST['postalf'],$_POST['adressef'],$_POST['mailf'],$_POST['noml'],$_POST['prenoml'],$_POST['villel'],$_POST['postall'],$_POST['adressel']))
    {
        $id=lire_dernierecommande()['idcommande'];
        foreach($paniers as $panier){
            commande_produit_enregistrer($id,$panier['id'],$panier['qt'],$panier['taille']);
            update_stock($panier['id'],$panier['qt']);
            }
        $retour = "Votre commande a bien été enregistrée";
        panier_vider();
    }else{
        $retour = "Il y a eu une erreur lors de l'enregistrement de votre commande";
    }
}

$title = 'Confirmation de la commande';
include_once('view/retour.php');