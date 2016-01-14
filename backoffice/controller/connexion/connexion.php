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
        $_SESSION['admin'] = 'x251';
        $_SESSION['id'] = connexion($login,$mdp,'fetch')['Adminnom_affichage'];
        $_SESSION['auth'] = connexion($login,$mdp,'fetch')['idAdmin'];
        header('location:index.php');
    }else{
        $title = 'Connexion';
        include('view/connexion/login.php');
    }
}else{
    $title = 'Connexion';
    include('view/connexion/login.php');
}
