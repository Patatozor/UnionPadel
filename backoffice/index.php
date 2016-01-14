<?php
//Contrôleur principal
include_once('config/config.php');
include_once('model/param.php');
include_once('lib/session.php');

my_session_start(SESSION);
if(isset($_GET['a'])) {
    if ($_GET['a'] == 'dc') {
        session_destroy();
        session_unset();
        header('location:index.php');
    }
}
if(!isset($_SESSION['admin'])){
    $module = 'connexion';
    $action = 'connexion';
}else{
    if(isset($_GET['module'])){
        $module = $_GET['module'];
    }else{
        $module = 'home';
    }
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }else{
        $action = 'home';
    }
}
$url = 'controller/'.$module.'/'.$action.'.php';
if (file_exists($url)){
    include_once($url);
}else{
    $title = 'page introuvable';
    include_once('view/404.php');
}