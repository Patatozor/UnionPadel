<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
//Fonctions des clubs

function afficher_clubs_liste($r){
    global $pdo;
    try{
        $query=$pdo->prepare("
           SELECT * FROM up_club
           WHERE clubregion LIKE :r");
        $query->bindValue(':r', $r, PDO::PARAM_INT);
        $query->execute();
        $clubs=$query->fetchAll();
    }catch ( Exception $e ){
        return false;
    }
    return $clubs;
}

function afficher_clubs(){
    global $pdo;
    try{
        $query=$pdo->query("
           SELECT * FROM up_club
           ORDER BY clubregion ASC");
        $clubs=$query->fetchAll();
    }catch ( Exception $e ){
        return false;
    }
    return $clubs;
}

function afficher_club($id){
    global $pdo;
    try{
        $query=$pdo->prepare("
           SELECT * FROM up_club
           WHERE idclub = :id");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $clubs=$query->fetch();
    }catch ( Exception $e ){
        return false;
    }
    return $clubs;
}

function afficher_regions(){
    global $pdo;
    try{
        $query=$pdo->query("
           SELECT * FROM up_club
           GROUP BY clubregion
           HAVING COUNT(clubregion) > 0");
        $clubs=$query->fetchAll();
    }catch ( Exception $e ){
        return false;
    }
    return $clubs;
}

function update_click($id){
    global $pdo;
    try{
        $query=$pdo->prepare("
        UPDATE up_club
        SET clubclic = clubclic + 1
        WHERE idclub = :id
        ;");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return true;
    }catch ( Exception $e ) {
        return false;
    }
}


