<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
//Fonction d'ajout d'un compte admin
function ajout_admin($login,$mdp,$nom){
    global $pdo;
    try{
        $query=$pdo->prepare("
            INSERT INTO up_admin
            (Adminlogin, Adminmdp, Adminnom_affichage)
            VALUES
            (:login,:mdp,:nom)
            ;");
        $query->bindValue(':login', $login, PDO::PARAM_STR);
        $query->bindValue(':mdp', $mdp, PDO::PARAM_STR);
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}

function afficher_admins(){
    global $pdo;
    try{
        $query=$pdo->query("
           SELECT * FROM up_admin");
        $query->execute();
        $users=$query->fetchAll();
    }catch ( Exception $e ){
        return false;
    }
    return $users;
}

function afficher_admin($id){
    global $pdo;
    try{
        $query=$pdo->prepare("
           SELECT * FROM up_admin
           WHERE idAdmin = :id");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $user=$query->fetch();
    }catch ( Exception $e ){
        return false;
    }
    return $user;
}

function update_admin($id,$mdp,$nom){
    global $pdo;
    try{
        $query=$pdo->prepare("
            UPDATE up_admin
            SET Adminmdp = :mdp,
            Adminnom_affichage = :nom
            WHERE idAdmin = :id
            ;");
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':mdp', $mdp, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}

function delete_admin($id){
    global $pdo;
    try{
        $query=$pdo->prepare("
            DELETE FROM up_admin
            WHERE idAdmin = :id
            ;");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}