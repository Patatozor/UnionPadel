<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
function ajout_commentaire($id,$content,$user){
    global $pdo;
    try{
            $query=$pdo->prepare("
            INSERT INTO up_comments
            (commentscontent, Article_idArticle, Users_idUsers)
            VALUES
            (:content,:id,:utilisateur)
            ;");
        $query->bindValue(':content', $content, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':utilisateur', $user, PDO::PARAM_INT);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}

function afficher_articles($fetch){
    global $pdo;
    try{
        $query=$pdo->query("
           SELECT * FROM up_article,up_admin,up_categorie_article
           WHERE idAdmin = Admin_idAdmin
           AND idCategorie = Categorie_idCategorie
           ORDER by Articledate DESC");
        if($fetch==1){
            $articles=$query->fetch();
        }else{
            $articles=$query->fetchAll();
        }
    }catch ( Exception $e ){
        return false;
    }
    return $articles;
}

function afficher_articles_liste($cat){
    global $pdo;
    try{
        if($cat==0){
            $query=$pdo->prepare("
           SELECT * FROM up_article, up_categorie_article
           WHERE Categorie_idCategorie = idCategorie
           ORDER by Articledate DESC");
        }else{
            $query=$pdo->prepare("
           SELECT * FROM up_article, up_categorie_article
           WHERE Categorie_idCategorie = idCategorie
           AND Categorie_idCategorie = :cat
           ORDER by Articledate DESC");
        }
        $query->bindValue(':cat',$cat,PDO::PARAM_INT);
        $query->execute();
        $articles=$query->fetchAll();
    }catch ( Exception $e ){
        return false;
    }
    return $articles;
}

function afficher_article($id){
    global $pdo;
    try{
        $query=$pdo->prepare("
           SELECT * FROM up_article, up_categorie_article, up_admin
           WHERE idArticle = :id
           AND idCategorie = Categorie_idCategorie
           AND Admin_idAdmin = idAdmin");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $article=$query->fetch();
    }catch ( Exception $e ){
        return false;
    }
    return $article;
}


function afficher_categories(){
    global $pdo;
    try{
        $query=$pdo->query("
           SELECT * FROM up_categorie_article
           WHERE idCategorie > 0");
        $categories=$query->fetchAll();
    }catch ( Exception $e ){
        return false;
    }
    return $categories;
}

function afficher_categorie($id){
    global $pdo;
    try{
        $query=$pdo->prepare("
           SELECT * FROM up_categorie_article
           WHERE idCategorie = :id");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $categories=$query->fetch();
    }catch ( Exception $e ){
        return false;
    }
    return $categories;
}


function compter_comments($id){
    global $pdo;
    try{
        $query=$pdo->prepare("
           SELECT * FROM up_comments
           WHERE Article_idArticle = :id");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $comments=$query->rowCount();
    }catch ( Exception $e ){
        return false;
    }
    return $comments;
}

function afficher_comments($id){
    global $pdo;
    try{
        $query=$pdo->prepare("
           SELECT * FROM up_comments, up_users
           WHERE Article_idArticle = :id
           AND Users_idUsers = idUsers");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $comments=$query->fetchAll();
    }catch ( Exception $e ){
        return false;
    }
    return $comments;
}
