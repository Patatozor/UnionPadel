<?php
if($access != 'VALID'){
    header('location:../../index.php');
}

function afficher_produits($cat){
    global $pdo;
    try{
        if($cat!="NULL") {
            $query = $pdo->prepare("
            SELECT * FROM up_produit
           WHERE categorie_produit_idcategorie_produit = :cat
           ORDER by Produitmarque ASC
           ;");
        }else{
            $query=$pdo->query("
           SELECT * FROM up_produit
           ORDER by Produitmarque ASC");
        }
        $query->bindValue(':cat', $cat, PDO::PARAM_INT);
        $query->execute();
        $produits=$query->fetchAll();
    }catch ( Exception $e ){
        return false;
    }
    return $produits;
}

function afficher_4produits($cat){
    global $pdo;
    try{
        if($cat!="NULL") {
            $query = $pdo->prepare("
            SELECT * FROM up_produit
           WHERE categorie_produit_idcategorie_produit = :cat
           ORDER by idProduits DESC
           ;");
        }else{
            $query=$pdo->query("
           SELECT * FROM up_produit
           ORDER by idProduits ASC
           LIMIT 0,4");
        }
        $query->bindValue(':cat', $cat, PDO::PARAM_INT);
        $query->execute();
        //$produits = $query->fetch();
        $produits=$query->fetchAll();
    }catch ( Exception $e ){
        return false;
    }
    return $produits;
}

function afficher_produit($id){
    global $pdo;
    try{
        $query=$pdo->prepare("
           SELECT * FROM up_produit, up_categorie_produit
           WHERE idProduits = :id
           AND idcategorie_produit = categorie_produit_idcategorie_produit");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $article=$query->fetch();
    }catch ( Exception $e ){
        return false;
    }
    return $article;
}


function afficher_categories_shop(){
    global $pdo;
    try{
        $query=$pdo->query("
           SELECT * FROM up_categorie_produit
           WHERE idcategorie_produit > 0");
        $categories=$query->fetchAll();
    }catch ( Exception $e ){
        return false;
    }
    return $categories;
}

function afficher_categorie_shop($id){
    global $pdo;
    try{
        $query=$pdo->prepare("
           SELECT * FROM up_categorie_produit
           WHERE idcategorie_produit = :id");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $categories=$query->fetch();
    }catch ( Exception $e ){
        return false;
    }
    return $categories;
}

function afficher_produits_tri($string){
    global $pdo;
    try{
        $query = $pdo->prepare("
            SELECT * FROM up_produit
           WHERE Produitnom LIKE :nom
           ORDER by Produitnom ASC
           ;");
        $query->bindValue(':nom', "%".$string."%", PDO::PARAM_STR);
        $query->execute();
        $produits=$query->fetchAll();
    }catch ( Exception $e ){
        return false;
    }
    return $produits;
}

function afficher_produits_marque($marque){
    global $pdo;
    try{
        $query = $pdo->prepare("
            SELECT * FROM up_produit
           WHERE Produitmarque LIKE :nom
           ORDER by Produitnom ASC
           ;");
        $query->bindValue(':nom', "%".$marque."%", PDO::PARAM_STR);
        $query->execute();
        $produits=$query->fetchAll();
    }catch ( Exception $e ){
        return false;
    }
    return $produits;
}

function afficher_marques(){
    global $pdo;
    try{
        $query=$pdo->query("
           SELECT * FROM up_produit
           GROUP BY Produitmarque
           HAVING COUNT(Produitmarque) > 0");
        $clubs=$query->fetchAll();
    }catch ( Exception $e ){
        return false;
    }
    return $clubs;
}

function commande_enregistrer($id,$tel,$prenom, $nom, $ville, $postal, $adresse, $mail, $noml, $prenoml, $villel, $postall, $adressel){
    global $pdo;
    try{
        $query=$pdo->prepare("
            INSERT INTO up_commande
            (Users_idUsers,commandefprenom,commandefnom,commandefville,commandefpostal,commandefadresse,commandefmail,commandelprenom,commandelnom,commandelville,commandelpostal,commandeladresse,commandeltel)
            VALUES
            (:id,:prenom,:nom,:ville,:postal,:adresse,:mail,:prenom2,:nom2,:ville2,:postal2,:adresse2,:tel)
            ;");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':ville', $ville, PDO::PARAM_STR);
        $query->bindValue(':postal', $postal, PDO::PARAM_STR);
        $query->bindValue(':adresse', $adresse, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->bindValue(':prenom2', $prenoml, PDO::PARAM_STR);
        $query->bindValue(':nom2', $noml, PDO::PARAM_STR);
        $query->bindValue(':ville2', $villel, PDO::PARAM_STR);
        $query->bindValue(':postal2', $postall, PDO::PARAM_STR);
        $query->bindValue(':adresse2', $adressel, PDO::PARAM_STR);
        $query->bindValue(':tel', $tel, PDO::PARAM_STR);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        echo $e;
        return false;
    }
}

function commande_produit_enregistrer($id,$produitid,$nombre,$taille){
    global $pdo;
    try{
        $query=$pdo->prepare("
            INSERT INTO up_commande_has_produit
            (commande_idcommande,Produit_idProduits,nombre,taille)
            VALUES
            (:id,:produitid,:nombre,:taille)
            ;");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':produitid', $produitid, PDO::PARAM_INT);
        $query->bindValue(':nombre', $nombre, PDO::PARAM_INT);
        $query->bindValue(':taille', $taille, PDO::PARAM_STR);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        echo $e;
        return false;
    }
}

function update_stock($id,$qt){
    global $pdo;
    try{
        $query=$pdo->prepare("
        UPDATE up_produit
        SET Produitstock = Produitstock - :qt
        WHERE idProduits = :id
        ;");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':qt', $qt, PDO::PARAM_INT);
        $query->execute();
        return true;
    }catch ( Exception $e ) {
        echo $e;
        return false;
    }
}

function lire_dernierecommande(){
    global $pdo;
    try{
        $query = $pdo->query("
            SELECT * FROM up_commande
           ORDER by idcommande DESC
           ;");
        $commande=$query->fetch();
    }catch ( Exception $e ){
        return false;
    }
    return $commande;
}