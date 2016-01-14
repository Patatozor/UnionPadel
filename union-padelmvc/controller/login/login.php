<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
//Contrôleur secondaire connexion admin
if(isset($_POST['login']) AND isset($_POST['mdp'])){
    $mdp = crypt($_POST['mdp'], SEL);
    $login = $_POST['login'];
    include_once("model/connexion/fonctions_connexion.php");
    if(connexion($login,$mdp,'connect')) {
        $_SESSION['id'] = connexion($login,$mdp,'fetch')['idUsers'];
        $_SESSION['mail'] = connexion($login,$mdp,'fetch')['Usersmail'];
        header('location:?module=home&action=accueil');
    }else{
        $title = 'Connexion';
        include('view/login/login.php');
    }
}else{
	$title = 'Connexion';
	include('view/login/login.php');
}
