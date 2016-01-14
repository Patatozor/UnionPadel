<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
$title = 'Conditions d\'utilisation';
include_once('view/mentions/conditions_utilisation.php');