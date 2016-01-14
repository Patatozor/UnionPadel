<?php
if($access != 'VALID'){
    header('location:../../index.php');
}

$retour = '';
if(!isset($_SESSION['admin'])){
    header('location:../../index.php');
}else{
    if(isset($_POST['title'])){
        include_once('model/blog/fonctions_blog.php');
        include_once('lib/images.php');
            $img=imageadd($_FILES['img']);
            if(ajout_article($_POST['title'],$_POST['chapo'],$_POST['content'],$_POST['cat'] ,$_SESSION['auth'], $img))
            {
                $retour = 'Le nouvel article a bien été ajouté';
            }else{
                $retour = "Il y a eu une erreur lors de la création de l'article";
            }
    }else{
        $retour = 'Il y a eu une erreur lors du traitement, veuillez réessayer';
    }
}
    $url = '?module=blog&amp;action=article_creer';
    $action = "Ajouter un autre article";
    $title = 'Ajout d\'article';
    include_once('view/retour.php');