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
    <title>Show users</title>
</head>
<body>
    <!-- Show users -->
    <?php
        $selectUsers = $bdd->query('SELECT * FROM users');
        while($user = $selectUsers->fetch()){
            ?>
            <p><?= $user['username']; ?> <a href="ban.php?id=<?= $user['id']; ?>" style="color:red; text-decoration: none">Ban user</a></p>
            <?php
        }
    ?>
    <!-- End of show users -->
</body>
</html>