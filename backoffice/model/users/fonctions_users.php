<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
//Fonction d'ajout d'un compte admin
function ajout_user($mail,$mdp,$nom,$pseudo,$type){
    global $pdo;
    try{
        $query=$pdo->prepare("
            INSERT INTO up_users
            (Usersmail, Usersmdp, Usersnom_affichage, Usersnom, Userstype)
            VALUES
            (:mail,:mdp,:pseudo,:nom,:sexe)
            ;");
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->bindValue(':mdp', $mdp, PDO::PARAM_STR);
        $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':sexe', $type, PDO::PARAM_INT);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}

function afficher_users(){
    global $pdo;
    try{
        $query=$pdo->query("
           SELECT * FROM up_users
           ORDER BY Usersnom ASC");
        $query->execute();
        $users=$query->fetchAll();
    }catch ( Exception $e ){
        return false;
    }
    return $users;
}

function afficher_user($id){
    global $pdo;
    try{
        $query=$pdo->prepare("
           SELECT * FROM up_users
           WHERE idUsers = :id");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $user=$query->fetch();
    }catch ( Exception $e ){
        return false;
    }
    return $user;
}

function update_user($id,$mail,$mdp,$nom,$pseudo,$type){
    global $pdo;
    try{
        $query=$pdo->prepare("
            UPDATE up_users
            SET Usersmail = :mail,
            Usersmdp = :mdp,
            Usersnom_affichage = :pseudo,
            Usersnom = :nom,
            Userstype = :sexe
            WHERE idUsers = :id
            ;");
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->bindValue(':mdp', $mdp, PDO::PARAM_STR);
        $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':sexe', $type, PDO::PARAM_INT);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}

function activer_user($id,$a){
    global $pdo;
    try{
        $query=$pdo->prepare("
            UPDATE up_users
            SET Usersactif = :a
            WHERE idUsers = :id
            ;");
        $query->bindValue(':a', $a, PDO::PARAM_INT);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}

function delete_user($id){
    global $pdo;
    try{
        $query=$pdo->prepare("
            DELETE FROM up_users
            WHERE idUsers = :id
            ;");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}

