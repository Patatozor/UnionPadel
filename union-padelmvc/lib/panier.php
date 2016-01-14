
<?php
if($access != 'VALID'){
    header('location:../index.php');
}

function panier_creer(){
    //Retour: true si la fonction crée la panier
    //Retour: false si le panier existe déjà
    if(!isset($_SESSION['panier'])){
        $_SESSION['panier'] = array();
        return true;
    }else{
        return false;
    }
}

function panier_vider(){
    unset($_SESSION['panier']);
}

function panier_ajouter($id, $nom, $marque, $img, $prix, $qt, $taille ){
//nom_session 	: nom de la session
//id 			: id du produit
//ref 			: référence du produit
//nom 			: nom du produit (50)
//descr		 	: description du produit (200)
//ht 			: prix hors taxe
// taux 		: taux de tva
// qt			: quantité du produit
    if(isset($_SESSION['panier'][$id])){
        $_SESSION['panier'][$id]['qt'] += $qt;
    }else{
        $_SESSION['panier'][$id]= array(
            'id' => $id,
            'nom' => $nom,
            'marque' => $marque,
            'img' => $img,
            'prix' => $prix,
            'qt' => $qt,
            'taille' => $taille,
        );
    }
    return true;
}

function panier_nombre_lignes(){
    $count = count($_SESSION['panier']);
    return $count;
}


function panier_calculer(){
    $total_panier = 0;
    foreach($_SESSION['panier'] as $ligne){
        $total_ligne = $ligne['prix']*$ligne['qt'];
        $total_panier += $total_ligne;
    }
    return $total_panier;
}

function panier_supprimer_ligne($id){
    if(isset($_SESSION['panier'][$id])){
        unset($_SESSION['panier'][$id]);
        return true;
    }else{
        return false;
    }
}


function panier_changer_quantite($id, $qt){
    //$id: l'identifiant du produit concerné
    //$qt: la nouvelle quantité
    //Retour: true si ok et false si le produit n'existe pas dans le panier ou quantité inexploitable
    if(isset($_SESSION['panier'][$id])){
        if(is_int($qt)){
            $_SESSION['panier'][$id]['qt'] = $qt;
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}


function panier_lire(){
    //Retour: Le tableau du panier
    return $_SESSION['panier'];
}
