<?php
if($access!='VALID'){
    header('location:../index.php');
}
if(!isset($_SESSION['admin'])){
    header('location:../index.php');
}?>
<?php include('view/layout/header.php'); ?>
    <div class="container-fluid">
    <p>
        <?php echo $retour; ?>
    </p>
    <p>
        <a href="<?php echo $url; ?>"><?php echo $action; ?></a>
    </p>
    </div>
<?php include('view/layout/footer.php'); ?>