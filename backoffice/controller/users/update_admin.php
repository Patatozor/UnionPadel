<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
//Contrôleur secondaire affichage admin
$retour = '';
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}else{
    include_once('model/users/fonctions_admins.php');
    if(isset($_POST['nom'])){
        if($_POST['mdp']==$_POST['mdp2']){
            $mdp = crypt($_POST['mdp'], SEL);
            if(update_admin($_GET['a'],$mdp,$_POST['nom'])){
                $retour = 'La modification a bien été effectuée';
            }else{
                $retour = 'Il y a eu une erreur lors de la mise à jour de l\'administrateur';
            }
        }else{
            $retour = 'Les mots de passe que vous avez entrés ne sont pas identiques';
        }
    }
    $url = "?module=users&amp;action=admins";
    $action = "Retourner à la liste des admin";
    $title = 'Edition d\'utilisateur';
    include_once('view/retour.php');
}