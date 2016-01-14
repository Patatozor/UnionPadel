<?php
if($access!='VALID'){
    header('location:../../index.php');
}
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}?>
<?php include('view/layout/header.php'); ?>
    <div class="container-fluid">
    <section id="ajout">
        <form method="post" action="?module=contact&amp;action=envoyer_newsletter" enctype="multipart/form-data" class="form-horizontal">
            <label for="title">Sujet de la newsletter:</label>
            <input type="text" name="title" id="title" maxlength="60" required="required"/>
            <label for="content">Code de la newsletter:</label>
            <textarea id="content" name="content" required="required" cols="40" rows="5"></textarea>
            <input type="submit" value="envoyer"/>
        </form>
    </section>
        </div>
<?php include('view/layout/footer.php'); ?>