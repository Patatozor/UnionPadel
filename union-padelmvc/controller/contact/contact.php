<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
$title = 'Contactez-nous';
if(isset($_POST['sujet'])){
    include_once('model/contact/fonctions_contact');
    $retour = '';
    if(isset($_SESSION['mail'])){
        if(envoie_message($_SESSION['mail'],$_POST['sujet'], $_POST['content'])){
			include_once('view/contact/contact.php');
        }else{
			$title = 'Envoie de message';
            $retour = "Il y a eu une erreur lors de l'envoi de votre message, veuillez réessayer";
			include_once('view/retour.php');
        }
    }else{
        if(envoie_message($_POST['mail'],$_POST['sujet'], $_POST['content'])){
			include_once('view/contact/contact.php');
        }else{
			$title = 'Envoie de message';
            $retour = "Il y a eu une erreur lors de l'envoi de votre message, veuillez réessayer";
			include_once('view/retour.php');
        }
    }

}else{
	include_once('view/contact/contact.php');
}

