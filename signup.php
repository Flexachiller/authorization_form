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
        <h2>Sign up</h2>
        Username:
        <input type="text" name="username"><br><br>
        Password:
        <input type="password" name="password"><br><br>
        Email:
        <input type="text" name="email" class="email"><br><br>
        <input type="submit" name="submit_signup" value="Sign up">
        <a href="login.php">Log in</a>
    </form>
    <div id="errors">
    <?php 
    if(isset($_SESSION['ErrorMSG'][0])){
        for($i=0; $i<count($_SESSION['ErrorMSG']); $i++){
            echo "<p>" . $_SESSION['ErrorMSG'][$i] . "</p>";
        }
        unset($_SESSION['ErrorMSG']);
    }
    ?>
    </div>
</body>
</html>