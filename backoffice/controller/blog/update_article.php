<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
//Contrôleur secondaire mise à jour d'un article
$retour = '';
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}else{
    include_once('model/blog/fonctions_blog.php');
    include_once('lib/images.php');
    $article = afficher_article($_GET['a']);
    if(isset($_POST['title'])){
        if(empty($_FILES['img']['name'])){
            $img = $article['Articleimage'];
        }else{
            $img=imageadd($_FILES['img']);
            unlink("../union-padelmvc/assets/img/".$article['Articleimage']);
        }
        if(update_article($_GET['a'], $_POST['title'],$_POST['chapo'],$_POST['content'],$_POST['cat'] ,$_SESSION['auth'], $img)){
            $retour = 'La modification a bien été effectuée';
        }else {
            $retour = 'Il y a eu une erreur lors de la mise à jour de l\'article';
        }
    }
    $url = "?module=blog&amp;action=articles";
    $action = "Retourner à la gestion des articles";
    $title = 'Edition de l\'article';
    include_once('view/retour.php');
}