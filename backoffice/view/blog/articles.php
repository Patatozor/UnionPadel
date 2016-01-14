<?php
if($access!='VALID'){
    header('location:../../index.php');
}
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}?>
<?php include('view/layout/header.php'); ?>
    <div class="container-fluid">
    <p><a href="?module=blog&amp;action=article_creer">Ajouter un article</a></p>
    <section id="articles">

        <table class="table">
            <tr>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Date</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php
            foreach($articles as $article){
                echo '
                    <tr>
                        <td><a href="?module=blog&amp;action=afficher_article&amp;b='.$article['idArticle'].'" >'.$article['Articletitle'].'</a></td>
                        <td>'.$article['Adminnom_affichage'].'</td>
                        <td>'.$article['Articledate'].'</td>
                        <td><a href="?module=blog&amp;action=modifier_article&amp;a='.$article['idArticle'].'">Modifier</a></td>
                        <td><a href="?module=blog&amp;action=articles&amp;a='.$article['idArticle'].'">Supprimer</a></td>
                    </tr>';
            }
            ?>
        </table>
        <p><?php echo $retour; ?></p>
    </section>
</div>
<?php include('view/layout/footer.php'); ?>