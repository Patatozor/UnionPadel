<?php
if($access != 'VALID'){
    header('location:../index.php');
}

function imageadd($img){
    $ext = array('jpg', 'jpeg', 'gif', 'png');
    $ext_upload = strtolower( substr( strrchr($img['name'], '.'), 1) );
    if( in_array($ext_upload, $ext)){
        $nomfichier = md5(uniqid(mt_rand()));
        $url = "../union-padelmvc/assets/img/".$nomfichier.".".$ext_upload;
        $image = $nomfichier.".".$ext_upload;
        if(move_uploaded_file($img['tmp_name'],$url)){
            return $image;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
