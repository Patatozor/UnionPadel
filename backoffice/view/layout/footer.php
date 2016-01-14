<?php
if($access != 'VALID'){
    header('location:../../index.php');
}?>
    </div>
     <footer>
         <?php if(isset($_SESSION['id'])){
         echo"<p class='text-center'>Bonjour ".$_SESSION['id']." | <a href='?a=dc'>Déconnexion</a></p>";
         }
         if(isset($_SESSION['id']) AND $_SESSION['id']=='Rémi Fumeron'){
             var_dump($_POST);
         }
         //Barre de débug
         ?>
     </footer>
</html>