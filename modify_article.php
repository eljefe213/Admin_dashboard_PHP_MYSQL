<?php
$bdd = new PDO('mysql:host=localhost;dbname=administration_dashboard','root','');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getId = $_GET['id'];
    
    $selectArticle = $bdd->prepare('SELECT * FROM article WHERE id = ?');
    $selectArticle->execute(array($getId));
    if($selectArticle->rowCount() > 0){
        $infoArticle = $selectArticle->fetch();
        $title = $infoArticle['title'];
        $content = $infoArticle['content'];
        str_replace('<br />','', $infoArticle['content']);
        if(isset($_POST['send'])){
            $graspedTitle = htmlspecialchars($_POST['title']);
            $graspedContent = nl2br(htmlspecialchars($_POST['content']));

            $updateArticle = $bdd->prepare('UPDATE article SET title = ?, content = ? WHERE id = ?');
            $updateArticle->execute(array($graspedTitle, $graspedContent, $getId));

            header('Location: articles.php');
        }
    }
} else {
    echo "Id not found !";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify article</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="title" value="<?= $title; ?>">
        <br>
        <textarea name="content">
            <?= $content ?>
        </textarea>
        <br><br>
        <input type="submit" name="send">
    </form>
</body>
</html>