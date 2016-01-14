<?php
if($access != 'VALID'){
    header('location:../../index.php');
}

//Fonction de connexion et récupération des données du compte admin
function connexion($login,$mdp,$action){
    global $pdo;
    try{
        $query=$pdo->prepare("
           SELECT * FROM up_admin
           WHERE Adminlogin=:login
           AND Adminmdp=:password");
        $query->bindValue(':login', $login, PDO::PARAM_STR);
        $query->bindValue(':password', $mdp, PDO::PARAM_STR);
        $query->execute();
        if($action=='fetch'){
            $users=$query->fetch();
        }else if($action=='connect'){
            $users=$query->rowCount();
        }else{
            $users = false;
        }
    }catch ( Exception $e ){
        return false;
    }
    return $users;
}
