<?php

require("database.php");

$message = array();


function login($conn, $username, $password){
    $login_query = "SELECT * FROM users WHERE username=:username AND password=:password";
    $db_query = $conn->prepare($login_query);
    $db_query->bindParam(':username', $username);
    $db_query->bindParam(':password', $password);
    $db_query->execute();
    $user = $db_query->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($user)){
        setcookie('username', $username, time()+3600);
        header('Location: person.php');
    }else{
        $_SESSION['ErrorMSG'] = ['Не удалось войти'];
        header('Location: login.php');
    }

}

function signup($conn, $username, $password, $email){
    $signup_query = "INSERT INTO users (username, password, email) 
    VALUES (:username, :password, :email)";
    try{
        $db_query = $conn->prepare($signup_query);
        $db_query->bindParam(':username', $username);
        $db_query->bindParam(':password', $password);
        $db_query->bindParam(':email', $email);
        $db_query->execute();

        setcookie("username", $username, time()+3600);
        header('Location: person.php');

    }catch(PDOException){
        $_SESSION['ErrorMSG'] = ['Пользователь заргеистрирован'];
        header('Location: signup.php');
    }

}

if(isset($_POST["submit_signup"])){
    session_start();

    $username = htmlspecialchars(trim($_POST["username"]));
    $password = htmlspecialchars(trim($_POST["password"]));
    $email = htmlspecialchars(trim($_POST["email"]));

    
    if (empty($username)) {
        $message[] = 'Введите имя пользователя';
    }
    if (empty($password)) {
        $message[] = 'Введите пароль';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message[] = 'Неправильный email';
    }

    if(isset($message[0])){
        $_SESSION['ErrorMSG'] = $message;
        header("Location: signup.php");
    }else{
        signup($conn, $username, $password, $email);
    }

}
elseif(isset($_POST["submit_login"])){
    session_start();

    $username = htmlspecialchars(trim($_POST["username"]));
    $password = htmlspecialchars(trim($_POST["password"]));

    if (empty($username)) {
        $message[] = 'Введите имя пользователя';
    }
    if (empty($password)) {
        $message[] = 'Введите пароль';
    }

    if(isset($message[0])){
        $_SESSION['ErrorMSG'] = $message;
        header("Location: login.php");
    }else{
        login($conn, $username, $password);
    }

}else{
    header('Location: login.php');
}


?>