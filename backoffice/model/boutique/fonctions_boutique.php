<?php
function ajout_produit($nom,$marque,$prix,$caract,$text,$cat,$stock,$img){
    global $pdo;
    try{
        $query=$pdo->prepare("
            INSERT INTO up_produit
            (Produitnom, Produitmarque, Produitprix, Produitcaracteristiques, Produittexte, categorie_produit_idcategorie_produit, produitstock, produitimg)
            VALUES
            (:nom,:marque,:prix,:caract,:text,:cat,:stock,:img)
            ;");
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':marque', $marque, PDO::PARAM_STR);
        $query->bindValue(':prix', $prix, PDO::PARAM_STR);
        $query->bindValue(':caract', $caract, PDO::PARAM_STR);
        $query->bindValue(':text', $text, PDO::PARAM_STR);
        $query->bindValue(':cat', $cat, PDO::PARAM_INT);
        $query->bindValue(':stock', $stock, PDO::PARAM_INT);
        $query->bindValue(':img', $img, PDO::PARAM_STR);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}

function afficher_produits($cat){
    global $pdo;
    try{
        if($cat!="NULL") {
            $query = $pdo->prepare("
            SELECT * FROM up_produit
           WHERE categorie_produit_idcategorie_produit = :cat
           ORDER by Produitmarque ASC");
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

function update_produit($id,$nom,$marque,$prix,$caract,$text,$cat,$stock,$img){
    global $pdo;
    try{
        $query=$pdo->prepare("
            UPDATE up_produit
            SET Produitnom = :nom,
            Produitmarque = :marque,
            Produitprix = :prix,
            Produitcaracteristiques = :caract,
            Produittexte = :text,
            categorie_produit_idcategorie_produit = :cat,
            produitstock = :stock,
            produitimg = :img
            WHERE idProduits = :id
            ;");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':marque', $marque, PDO::PARAM_STR);
        $query->bindValue(':prix', $prix, PDO::PARAM_STR);
        $query->bindValue(':caract', $caract, PDO::PARAM_STR);
        $query->bindValue(':text', $text, PDO::PARAM_STR);
        $query->bindValue(':cat', $cat, PDO::PARAM_INT);
        $query->bindValue(':stock', $stock, PDO::PARAM_INT);
        $query->bindValue(':img', $img, PDO::PARAM_STR);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}

function produit_delete($id){
    global $pdo;
    try{
        $query=$pdo->prepare("
            DELETE FROM up_produit
            WHERE idProduits = :id
            ;");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}


function afficher_categories(){
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

function afficher_categorie($id){
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

function ajout_categorie($cat){
    global $pdo;
    try{
        $query=$pdo->prepare("
            INSERT INTO up_categorie_produit
            (categorie_produitnom)
            VALUES
            (:cat)
            ;");
        $query->bindValue(':cat', $cat, PDO::PARAM_STR);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}

function article_categorie_update($id){
    global $pdo;
    try{
        $query=$pdo->prepare("
            UPDATE up_produit
            SET categorie_produit_idcategorie_produit = 0
            WHERE categorie_produit_idcategorie_produit = :id
            ;");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}

function categorie_delete($id){
    global $pdo;
    try{
        $query=$pdo->prepare("
            DELETE FROM up_categorie_produit
            WHERE idcategorie_produit = :id
            ;");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}

function update_categorie($id,$nom)
{
    global $pdo;
    try {
        $query = $pdo->prepare("
            UPDATE up_categorie_produit
            SET categorie_produitnom = :nom
            WHERE idcategorie_produit = :id
            ;");
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

function afficher_commandes(){
    global $pdo;
    try{
        $query=$pdo->query("
           SELECT * FROM up_commande
           ");
        $commandes=$query->fetchAll();
    }catch ( Exception $e ){
        return false;
    }
    return $commandes;
}

function afficher_commande($id){
    global $pdo;
    try{
        $query=$pdo->prepare("
           SELECT * FROM up_commande, up_users, up_commande_has_produit, up_produit
           WHERE idcommande = :id
           AND commandenum = commande_produit_num
           AND Produit_idProduits = idProduits
           AND idUsers = Users_idUsers");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $commande=$query->fetchAll();
    }catch ( Exception $e ){
        return false;
    }
    return $commande;
}