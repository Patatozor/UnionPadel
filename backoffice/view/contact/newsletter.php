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
            <th>Mail</th>
            <th>Date</th>
            <th>Supprimer</th>
        </tr>
        <?php
        foreach($newsletters as $newsletter){
            echo '<tr>
                    <td>'.$newsletter['contact_newsletter_mail'].'</td>
                    <td>'.$newsletter['contact_newsletter_date'].'</td>
                    <td><a href="?module=contact&amp;action=newsletter&amp;a='.$newsletter['idcontact_newsletter'].'">Supprimer</a></td>
                  </tr>';
        }
        ?>
    </table>
    <p><?php echo $retour; ?></p>
</section>
    </div>
<?php include('view/layout/footer.php'); ?>
