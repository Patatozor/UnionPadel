<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
$title = 'Conditions de vente';
include_once('view/mentions/conditions_vente.php');