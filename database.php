<?php

$db_server = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'businessdb';
$conn = '';


try{
    $conn = new PDO("mysql:host={$db_server};dbname={$db_name}", "{$db_user}", "{$db_pass}");
}catch(Exception $e){
    die("Не удалось подключиться: " . $e->getMessage());
}
