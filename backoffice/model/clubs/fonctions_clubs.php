<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
//Fonction d'ajout d'un compte admin
function ajout_club($adresse,$nom,$lat,$long,$region,$texte,$tel,$img){
    global $pdo;
    try{
        $query=$pdo->prepare("
            INSERT INTO up_club
            (clubadresse, clubnom,clublatitude,clublongitude,clubregion,clubtexte,clubtelephone,clubimage)
            VALUES
            (:a,:n,:la,:lo,:r,:tex,:tel,:img)
            ;");
        $query->bindValue(':a', $adresse, PDO::PARAM_STR);
        $query->bindValue(':n', $nom, PDO::PARAM_STR);
        $query->bindValue(':la', $lat, PDO::PARAM_STR);
        $query->bindValue(':lo', $long, PDO::PARAM_STR);
        $query->bindValue(':r', $region, PDO::PARAM_STR);
        $query->bindValue(':tex', $texte, PDO::PARAM_STR);
        $query->bindValue(':tel', $tel, PDO::PARAM_STR);
        $query->bindValue(':img', $img, PDO::PARAM_STR);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}

function afficher_clubs(){
    global $pdo;
    try{
        $query=$pdo->query("
           SELECT * FROM up_club
           ORDER BY clubregion ASC");
        $users=$query->fetchAll();
    }catch ( Exception $e ){
        return false;
    }
    return $users;
}

function afficher_club($id){
    global $pdo;
    try{
        $query=$pdo->prepare("
           SELECT * FROM up_club
           WHERE idclub = :id");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $user=$query->fetch();
    }catch ( Exception $e ){
        return false;
    }
    return $user;
}

function update_club($id,$adresse,$nom,$lat,$long,$region,$texte,$tel,$img){
    global $pdo;
    try{
        $query=$pdo->prepare("
            UPDATE up_club
            SET clubadresse = :a,
            clubnom = :n,
            clublatitude = :la,
            clublongitude = :lo,
            clubregion = :r,
            clubtexte = :tex,
            clubtelephone = :tel,
            clubimage = :img
            WHERE idclub = :id
            ;");
        $query->bindValue(':a', $adresse, PDO::PARAM_STR);
        $query->bindValue(':n', $nom, PDO::PARAM_STR);
        $query->bindValue(':la', $lat, PDO::PARAM_STR);
        $query->bindValue(':lo', $long, PDO::PARAM_STR);
        $query->bindValue(':r', $region, PDO::PARAM_STR);
        $query->bindValue(':tex', $texte, PDO::PARAM_STR);
        $query->bindValue(':tel', $tel, PDO::PARAM_STR);
        $query->bindValue(':img', $img, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}


function delete_club($id){
    global $pdo;
    try{
        $query=$pdo->prepare("
            DELETE FROM up_club
            WHERE idclub = :id
            ;");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}

