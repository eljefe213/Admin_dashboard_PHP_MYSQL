<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=administration_dashboard','root','');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getId = $_GET['id'];
    $selectUser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $selectUser->execute(array($getId));
}else{
    echo 'The id was not selected !';
}
?>