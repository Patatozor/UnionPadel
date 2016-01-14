<?php
if($access != 'VALID'){
    header('location:../../index.php');
}

//Fonction de connexion et récupération des données du compte admin
function connexion($login,$mdp,$action){
    global $pdo;
    try{
        $query=$pdo->prepare("
           SELECT * FROM up_users
           WHERE Usersmail=:login
           AND Usersmdp=:password
           AND Usersactif = 1");
        $query->bindValue(':login', $login, PDO::PARAM_STR);
        $query->bindValue(':password', $mdp, PDO::PARAM_STR);
        $query->execute();
        if($action=='fetch'){
            $users=$query->fetch();
        }else if($action=='connect'){
            $users=$query->rowCount();
        }else{
            $users = false;
        }
    }catch ( Exception $e ){
        return false;
    }
    return $users;
}

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

function ajout_newsletter($mail){
    global $pdo;
    try{
        $query=$pdo->prepare("
            INSERT INTO up_contact_newsletter
            (contact_newsletter_mail)
            VALUES
            (:mail)
            ;");
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}

function mail_confirm($nom_expediteur, $email_expediteur, $email_replyto, $desti, $bcc, $sujet, $message_texte, $message_html, $fichiers=''){
    $frontiere = md5(uniqid(mt_rand()));
    $headers = 'From: ' . $nom_expediteur . '<' . $email_expediteur . '>' . "\n";
    $headers .= 'Return-Path: <' . $email_replyto . '>' . "\n";
    $headers .= 'MIME-Version: 1.0' . "\n";
    if ($bcc !=''){
        $headers .= "Bcc: ".$bcc."\n";
    }
    $headers .= 'Content-Type: multipart/mixed; boundary="' . $frontiere . '"';
    //$message = 'This is a multi-part message in MIME format.' . "\n\n";
    $message = '';

    //////////////////////////////FICHIERS/////////////////////////////////////
    if(is_array($fichiers) and $fichiers!=""){
        foreach($fichiers as $fichier){
            $message .= '--' . $frontiere . "\n";
            $message .= 'Content-Type: image/jpeg; name="'.$fichier .'"'."\n";
            $message .= 'Content-Transfer-Encoding: base64' . "\n";
            $message .= 'Content-Disposition:attachement; filename="'.$fichier .'"'. "\n\n";
            $message .= chunk_split(base64_encode(file_get_contents($fichier))) . "\n";
        }
    }

    //////////////////////////////HTML////////////////////////////////////////
    if($message_html!='') {
        $message .= '--' . $frontiere . "\n";
        $message .= 'Content-Type: text/html; charset="utf-8"' . "\n";
        $message .= 'Content-Transfer-Encoding: 8bit' . "\n\n";
        $message .= $message_html . "\n\n";
    }
    //////////////////////////////TEXT////////////////////////////////////////
    if($message_texte!=''){
        $message .= '--' . $frontiere . "\n";
        $message .= 'Content-Type: text/plain; charset="utf-8"' . "\n";
        $message .= 'Content-Transfer-Encoding: 8bit' . "\n\n";
        $message .= $message_texte . "\n\n";
    }

    if(is_array($desti)){
        $destinataire = "";
        foreach($desti as $undesti){
            $destinataire .= $undesti.',';
        }
    }else{
        $destinataire = $desti;
    }
    if (mail($destinataire, $sujet, $message, $headers)) {
        return true;
    } else {
        return false;
    }
}


function activer($m){
    global $pdo;
    try{
        $query=$pdo->prepare("
        UPDATE up_users
        SET Usersactif = 1
        WHERE Usersmail = :m
        ;");
        $query->bindValue(':m', $m, PDO::PARAM_STR);
        $query->execute();
        return true;
    }catch ( Exception $e ) {
        return false;
    }
}

