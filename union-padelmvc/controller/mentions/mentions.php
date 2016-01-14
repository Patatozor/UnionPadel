<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
$title = 'Mentions légales';
include_once('view/mentions/mentions.php');