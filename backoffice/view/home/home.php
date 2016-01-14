<?php
if($access != 'VALID'){
    header('location:../../index.php');
}?>
<?php include('view/layout/header.php'); ?>
<div class="container-fluid">
<section id="messages">
    <p class="well text-center">Bienvenue sur le Backoffice d'Union-Padel !</p>
</section>
</div>
<?php include('view/layout/footer.php'); ?>
