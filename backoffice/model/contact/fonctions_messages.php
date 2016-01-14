<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
function afficher_messages(){
    global $pdo;
    try{
        $query=$pdo->query("
           SELECT * FROM up_contact_message
           ORDER by contact_message_date DESC");
        $query->execute();
        $messages=$query->fetchAll();
    }catch ( Exception $e ){
        return false;
    }
    return $messages;
}

function afficher_message($id){
    global $pdo;
    try{
        $query=$pdo->prepare("
           SELECT * FROM up_contact_message
           WHERE idcontact_message = :id");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $message=$query->fetch();
    }catch ( Exception $e ){
        return false;
    }
    return $message;
}

function message_delete($id){
    global $pdo;
    try{
        $query=$pdo->prepare("
            DELETE FROM up_contact_message
            WHERE idcontact_message = :id
            ;");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}

