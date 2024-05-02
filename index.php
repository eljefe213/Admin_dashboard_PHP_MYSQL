<?php
session_start();
if(!$_SESSION['password']){
    header('Location: connexion.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="users.php">Show users</a>
    <a href="publish_article.php">Publish article</a>
    <a href="articles.php">Show all articles</a>
</body>
</html>