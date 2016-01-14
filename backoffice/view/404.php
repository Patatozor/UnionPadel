<?php
if($access!='VALID'){
    header('location:../../index.php');
}?>
<?php include('view/layout/header.php'); ?>
<div class="container-fluid">
<p>La page à laquelle vous tentez d'accéder n'existe pas.</p>
</div>
<?php include('view/layout/footer.php'); ?>

