<?php session_start();?>
<?php if(isset($_COOKIE['username'])){ header('Location: person.php'); }?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="authorization.php" method="post">
        <h2>Log in</h2>
        Username:
        <input type="text" name="username"><br><br>
        Password:
        <input type="password" name="password"><br><br>
        <input type="submit" name="submit_login" value="Log in">
        <a href="signup.php">Sign up</a>
    </form>
    <div id="errors">
    <?php
        if(isset($_SESSION['ErrorMSG'][0])){
            for($i=0; $i<count($_SESSION['ErrorMSG']); $i++){
                echo $_SESSION['ErrorMSG'][$i];
            }
            unset($_SESSION['ErrorMSG']);
        }
    ?>
    </div>
</body>
</html>
