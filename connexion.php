<?php
session_start();
if(isset($_POST['connexion'])){
    if(!empty($_POST['username']) AND !empty($_POST['password'])){
        $default_user = "admin";
        $default_pwd = "admin1234";

        $grasped_user = htmlspecialchars($_POST['username']);
        $grasped_pwd = htmlspecialchars($_POST['password']);

        if($grasped_user == $default_user AND $grasped_pwd == $default_pwd){
            $_SESSION['password'] = $grasped_pwd;
            header('Location: index.php');
        }else{
            echo "Your username or password is incorrect !";
        }
    }else{
        echo "Please complete all fields !";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration dashboard</title>
</head>
<body>
    <form action="" method="post" align="center">
        <input type="text" name="username" autocomplete="off">
        <br>
        <input type="password" name="password">
        <br><br>
        <input type="submit" name="connexion">
    </form>
</body>
</html>