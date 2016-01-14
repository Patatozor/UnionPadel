<?php
//Contrôleur principal
include_once('config/config.php');
include_once('model/param.php');
include_once('lib/session.php');
include_once('lib/panier.php');

my_session_start(SESSION);
if(isset($_GET['a'])) {
    if ($_GET['a'] == 'dc') {
        session_destroy();
        session_unset();
        header('location:index.php');
    }
}
panier_creer();

if(isset($_GET['module'])){
    $module = $_GET['module'];
}else{
    $module = 'home';
}
if(isset($_GET['action'])){
    $action = $_GET['action'];
}else{
    $action = 'accueil';
}

$url = 'controller/'.$module.'/'.$action.'.php';
if (file_exists($url)){
    include_once($url);
}else{
    $title = 'page introuvable';
    include_once('view/404.php');
}