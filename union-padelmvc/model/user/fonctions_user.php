<?php
if($access != 'VALID'){
    header('location:../../index.php');
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

function afficher_user_mail($mail){
    global $pdo;
    try{
        $query=$pdo->prepare("
           SELECT * FROM up_users
           WHERE Usersmail = :mail");
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->execute();
        $user=$query->fetch();
    }catch ( Exception $e ){
        return false;
    }
    return $user;
}


function update_user_mdp($id,$mdp){
    global $pdo;
    try{
        $query=$pdo->prepare("
            UPDATE up_users
            SET Usersmdp = :mdp,
            WHERE idUsers = :id
            ;");
        $query->bindValue(':mdp', $mdp, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}