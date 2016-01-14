<?php
if($access!='VALID'){
    header('location:../../index.php');
}
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}?>
<?php include('view/layout/header.php'); ?>
<div class="container-fluid">
<section id="messages">
    <table class="table">
        <tr>
            <th>Sujet</th>
            <th>Auteur</th>
            <th>Date</th>
            <th>Supprimer</th>
        </tr>
        <?php
        foreach($messages as $message){
            echo '<tr>
                    <td><a href="?module=contact&amp;action=message&amp;a='.$message['idcontact_message'].'" >'.$message['contact_message_sujet'].'</a></td>
                    <td>'.$message['contact_message_mail'].'</td>
                    <td>'.$message['contact_message_date'].'</td>
                    <td><a href="?module=contact&amp;actionmessages&amp;a='.$message['idcontact_message'].'">Supprimer</a></td>
                  </tr>';
        }
        ?>
    </table>
    <p><?php echo $retour; ?></p>
</section>
    </div>
<?php include('view/layout/footer.php'); ?>
