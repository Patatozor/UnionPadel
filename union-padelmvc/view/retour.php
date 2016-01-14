<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
include("view/layout/header.php"); ?>
    <div style="margin-top:200px;">
    <p><?php echo $retour; ?></p>
    </div>
<?php include("view/layout/footer.php"); ?>