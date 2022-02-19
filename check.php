<?php
session_start();
$name = filter_var(trim($_POST['name']),
FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']),
FILTER_SANITIZE_STRING); 
if(mb_strlen($name) < 3 || mb_strlen($name) > 30 ){
    $_SESSION['message'] = 'Недопустимая длина имени';
    header('location: reg.php');
    exit();
}
if(mb_strlen($password) < 5 || mb_strlen($password) > 30 ){
    $_SESSION['message'] = 'Недопустимая длина пароля';
    header('location: reg.php');
    exit();
}
$_SESSION = $name;
$password = md5($password);
$mysql = new mysqli('localhost', 'root', '', 'reg');
if ($mysql->connect_errno) exit('Произошла какая то ошибка');
$mysql->set_charset('utf8');

$result = $mysql->query("SELECT * FROM `users` WHERE `name` = '$name'");
$user = $result->fetch_assoc();
if(is_array($user) == true) {
    $_SESSION['message'] = 'Такое имя уже существует';
    header('location: reg.php');
    exit();
    }

$mysql->query("INSERT INTO `users` (`password`, `name`)VALUES('$password', '$name')");


$result = $mysql->query("SELECT * FROM `users` WHERE `name` = '$name' AND `password` = '$password'");

$user = $result->fetch_assoc();

setcookie('user', $name, time() + 3600, "/");

$mysql->close(); 

header('location: /');

?>