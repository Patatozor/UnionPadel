<?php
if($access != 'VALID'){
    header('location:../../index.php');
}

function envoie_message($mail,$sujet,$content){
    global $pdo;
    try{
        $query=$pdo->prepare("
           INSERT INTO up_contact_message
            (contact_message_sujet, contact_message_mail, contact_message_content)
            VALUES
            (:sujet,:mail,:content)
            ;");
        $query->bindValue(':sujet', $sujet, PDO::PARAM_STR);
        $query->bindValue(':content', $content, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}
