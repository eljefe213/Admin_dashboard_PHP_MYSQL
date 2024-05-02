<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=administration_dashboard','root','');
if(!$_SESSION['password']){
    header('Location: connexion.php');
}

if(isset($_POST['send'])){
    if(!empty($_POST['title'] ) AND !empty($_POST['content']) ){
        $title = htmlspecialchars($_POST['title']);
        $content = nl2br(htmlspecialchars($_POST['content']));
        $insertArticle = $bdd->prepare('INSERT INTO article(title, content) VALUES (?, ?)');
        $insertArticle->execute(array($title, $content));

        echo "The article has been successfully added !";
    }else{
        echo "Please complete all fields !!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publish article</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="title">
        <br>
        <textarea name="content"></textarea>
        <br>
        <input type="submit" name="send">
    </form>
</body>
</html>