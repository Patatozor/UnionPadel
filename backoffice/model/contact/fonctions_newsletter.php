<?php
if($access != 'VALID'){
    header('location:../../index.php');
}

function afficher_newsletter(){
    global $pdo;
    try{
        $query=$pdo->query("
           SELECT * FROM up_contact_newsletter
           ORDER by contact_newsletter_date DESC");
        $query->execute();
        $newsletter=$query->fetchAll();
    }catch ( Exception $e ){
        return false;
    }
    return $newsletter;
}

function newsletter_delete($id){
    global $pdo;
    try{
        $query=$pdo->prepare("
            DELETE FROM up_contact_newsletter
            WHERE idcontact_newsletter = :id
            ;");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}

function envoie_newsletter($nom_expediteur, $email_expediteur, $email_replyto, $desti, $bcc, $sujet, $message_texte, $message_html, $fichiers=''){
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
    if($fichiers!=''){
        if(is_array($fichiers)){
            foreach($fichiers as $fichier){
                $message .= '--' . $frontiere . "\n";
                $message .= 'Content-Type: image/jpeg; name="'.$fichier .'"'."\n";
                $message .= 'Content-Transfer-Encoding: base64' . "\n";
                $message .= 'Content-Disposition:attachement; filename="'.$fichier .'"'. "\n\n";
                $message .= chunk_split(base64_encode(file_get_contents($fichier))) . "\n";
            }
        }else{
            $message .= '--' . $frontiere . "\n";
            $message .= 'Content-Type: image/jpeg; name="'.$fichiers .'"'."\n";
            $message .= 'Content-Transfer-Encoding: base64' . "\n";
            $message .= 'Content-Disposition:attachement; filename="'.$fichiers.'"'."\n\n";
            $message .= chunk_split(base64_encode(file_get_contents($fichiers))) . "\n";
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