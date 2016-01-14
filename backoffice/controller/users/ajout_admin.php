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
    if(isset($_POST['login'])){
        if($_POST['mdp']==$_POST['mdp2']){
            $mdp = crypt($_POST['mdp'], SEL);
            if(ajout_admin($_POST['login'],$mdp,$_POST['nom'])){
                $retour = 'Le nouvel administrateur a bien été ajouté';
            }else{
                $retour = 'Il y a eu une erreur lors de l\'ajout du nouvel administrateur';
            }
        }else{
            $retour = 'Les mots de passe que vous avez entrés ne sont pas identiques';
        }
    }
    $url = "?module=users&amp;action=admins";
    $action = "Ajouter un autre administrateur";
    $title = 'Ajout d\'utilisateur';
    include_once('view/retour.php');
}