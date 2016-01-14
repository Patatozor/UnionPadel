<?php
if($access!='VALID'){
    header('location:../../index.php');
}
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}?>
<?php include('view/layout/header.php'); ?>
<div class="container-fluid">
    <section id="message">
        <h3 class="text-center"><?php echo $message['contact_message_sujet']; ?></h3>
        <p>Envoyé par <?php echo $message['contact_message_mail']; ?> - <?php echo $message['contact_message_date'];?></p>
        <p>
            <?php echo $message['contact_message_content']; ?>
        </p>
    </section>
    </div>
<?php include('view/layout/footer.php'); ?>