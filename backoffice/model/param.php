<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
try{
    $dns = 'mysql:host=localhost;dbname=fumeron';
    $utilisateur = 'fumeron';
    $motDePasse = '140742';

    //Options de user
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    global $pdo;
    $pdo = new PDO( $dns, $utilisateur, $motDePasse, $options );
}
catch ( Exception $e )
{
    return false;
}
