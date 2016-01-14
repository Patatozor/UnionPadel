<?php
function my_session_start($name = ""){
    session_name($name);
    session_start();
    $ip = !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
    $securite = $ip.'_'.$_SERVER['HTTP_USER_AGENT'];
    if(!isset($_SESSION['mysession_secu'])){
        $_SESSION['mysession_secu'] = $securite;
        return true;
    }else{
        if($_SESSION['mysession_secu']!= $securite){
            session_regenerate_id($name);
            $_SESSION = array();
            return false;
        }else{
            return true;
        }
    }
}
