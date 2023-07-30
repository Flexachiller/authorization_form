<?php if(!isset($_COOKIE['username'])){ header('Location: login.php'); }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Welcome, <?php echo $_COOKIE['username']?>!</h2>
    <a href="logout.php" name='logout'>Log out</a>

</html>