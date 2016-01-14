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
        <form method="post" action="?module=clubs&amp;action=ajout_club" enctype="multipart/form-data">
            <label for="nom">Nom du club:</label>
            <input type="text" name="nom" id="nom" maxlength="45" required="required"/>
            <label for="marque">Adresse du club</label>
            <input type="text" name="adresse" id="adresse" maxlength="100" required="required"/>
            <label for="marque">Region du club</label>
            <input type="text" name="region" id="region" maxlength="45" required="required"/>
            <label for="marque">Lattitude du club</label>
            <input type="text" name="lat" id="lat" pattern="\d{0,12}[.]?\d{0,12}" maxlength="24" required="required"/>
            <label for="long">Longitude du club</label>
            <input type="text" name="long" id="long" pattern="\d{0,12}[.]?\d{0,12}" maxlength="24" required="required"/>
            <label for="tel">Telephone du club</label>
            <input type="text" name="tel" id="tel" pattern="^0[1-9]([\. -]?[0-9]{2}){4}$" maxlength="45" required="required"/>
            <label for="content">Description du club:</label>
            <textarea id="content" name="content" required="required" cols="40" rows="5"></textarea>
            <label for="img">Sélectionnez une image pour le club</label>
            <input type="file" name="img" id="img" />
            <input type="submit"/>
        </form>
    </section>
        </div>
<?php include('view/layout/footer.php'); ?>