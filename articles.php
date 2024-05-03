<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=administration_dashboard','root','');
if(!$_SESSION['password']){
    header('Location: connexion.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show all articles</title>
</head>
<body>
    <?php
        $recoverArticle= $bdd->query('SELECT * FROM article');
        while($article = $recoverArticle->fetch()){
            ?>
            <div class="article" style="border: 1px solid black;">
                <h1><?= $article['title']; ?></h1>
                <p><?= $article['content']; ?></p>
                <a href="delete_article.php?id=<?= $article['id']; ?>">
                    <button style="color: white;background: red; margin-bottom : 10px; cursor: pointer">
                    Delete article
                    </button>
                </a>
                <a href="modify_article.php?id=<?= $article['id']; ?>">
                    <button style="color: black;background: yellow; margin-bottom : 10px; cursor: pointer">
                        Modify article
                    </button>
                </a>
            </div>
            <br>
            <?php
        }
    ?>
</body>
</html>