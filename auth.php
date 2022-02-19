<?php
session_start();
$name = filter_var(trim($_POST['name']),
FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']),
FILTER_SANITIZE_STRING); 

$password = md5($password);
$mysql = new mysqli('localhost', 'root', '', 'reg');
if ($mysql->connect_errno) exit('Произошла какая то ошибка');
$mysql->set_charset('utf8');

$result = $mysql->query("SELECT * FROM `users` WHERE `name` = '$name' AND `password` = '$password'");

$user = $result->fetch_assoc();

//echo $name;
//echo $password;

if(is_array($user) == false && $name == '' || $password == '' && is_array($user) == false) {
$_SESSION['message'] = 'Введите логин, пароль';
header('location: reg.php');
exit();
}
elseif(is_array($user) == false && $name != '' && $password != '') {
$_SESSION['message'] = 'Неверный логин, пароль';
header('location: reg.php');
exit();
}
else{
   $_SESSION['message'] = '';
}




setcookie('user', $user['name'],time() + 3600, "/");

$mysql->close(); 

header('location: /');

?>