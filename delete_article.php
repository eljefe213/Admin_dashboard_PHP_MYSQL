<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=administration_dashboard','root','');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getId = $_GET['id'];
    $recoverArticle = $bdd->prepare('SELECT * FROM article WHERE id = ? ');
    $recoverArticle->execute(array($getId));
    if($recoverArticle->rowCount() > 0){
        $deleteArticle = $bdd->prepare('DELETE FROM article WHERE id = ?');
        $deleteArticle->execute(array($getId));
        header('Location: articles.php');
    }else{
        echo "No article found !";
    }
}else{
    echo "No id found !";
}

?>