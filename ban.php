<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=administration_dashboard','root','');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getId = $_GET['id'];
    $selectUser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $selectUser->execute(array($getId));
    if($selectUser->rowCount() > 0){
        $banUser = $bdd->prepare('DELETE FROM users WHERE id = ?');
        $banUser->execute(array($getId));
        header('Location: users.php');
    }else{
        echo "No user found !";
    }
}else{
    echo 'The id was not selected !';
}
?>