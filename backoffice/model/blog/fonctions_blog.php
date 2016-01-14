<?php
function ajout_article($title,$chapo,$content,$category,$id,$img){
    global $pdo;
    try{
        $query=$pdo->prepare("
            INSERT INTO up_article
            (Articletitle, Articlechapo, Articlecontent, Categorie_idCategorie, Admin_idAdmin, Articleimage)
            VALUES
            (:title,:chapo,:content,:category,:author,:img)
            ;");
        $query->bindValue(':title', $title, PDO::PARAM_STR);
        $query->bindValue(':chapo', $chapo, PDO::PARAM_STR);
        $query->bindValue(':content', $content, PDO::PARAM_STR);
        $query->bindValue(':category', $category, PDO::PARAM_INT);
        $query->bindValue(':author', $id, PDO::PARAM_INT);
        $query->bindValue(':img', $img, PDO::PARAM_STR);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}

function afficher_articles(){
    global $pdo;
    try{
        $query=$pdo->query("
           SELECT * FROM up_article,up_admin
           WHERE idAdmin = Admin_idAdmin
           ORDER by Articledate DESC");
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

function update_article($id,$title,$chapo,$content,$category,$author,$img){
    global $pdo;
    try{
        $query=$pdo->prepare("
            UPDATE up_article
            SET Articletitle = :title,
            Articlecontent = :content,
            Articlechapo = :chapo,
            Categorie_idCategorie = :category,
            Admin_idAdmin = :author,
            Articleimage = :img
            WHERE idArticle = :id
            ;");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':title', $title, PDO::PARAM_STR);
        $query->bindValue(':chapo', $chapo, PDO::PARAM_STR);
        $query->bindValue(':content', $content, PDO::PARAM_STR);
        $query->bindValue(':category', $category, PDO::PARAM_INT);
        $query->bindValue(':author', $author, PDO::PARAM_INT);
        $query->bindValue(':img', $img, PDO::PARAM_STR);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}

function article_delete($id){
    global $pdo;
    try{
        $query=$pdo->prepare("
            DELETE FROM up_article
            WHERE idArticle = :id
            ;");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
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

function ajout_categorie($cat){
    global $pdo;
    try{
        $query=$pdo->prepare("
            INSERT INTO up_categorie_article
            (Categoriename)
            VALUES
            (:cat)
            ;");
        $query->bindValue(':cat', $cat, PDO::PARAM_STR);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}

function article_categorie_update($id){
    global $pdo;
    try{
        $query=$pdo->prepare("
            UPDATE up_article
            SET Categorie_idCategorie = 0
            WHERE Categorie_idCategorie = :id
            ;");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}

function categorie_delete($id){
    global $pdo;
    try{
        $query=$pdo->prepare("
            DELETE FROM up_categorie_article
            WHERE idCategorie = :id
            ;");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}

function update_categorie($id,$nom){
    global $pdo;
    try{
        $query=$pdo->prepare("
            UPDATE up_categorie_article
            SET Categoriename = :nom
            WHERE idCategorie = :id
            ;");
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return true;
    }catch ( Exception $e ){
        return false;
    }
}