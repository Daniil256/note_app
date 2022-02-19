<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>

<?php
session_start();
$name = filter_var(trim($_POST['name']),
FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']),
FILTER_SANITIZE_STRING); 
$city = filter_var(trim($_POST['city']),
FILTER_SANITIZE_STRING);
$about = filter_var(trim($_POST['about']),
FILTER_SANITIZE_STRING); 


$path = 'uploads/'. $_FILES['img']['name'];
if(!move_uploaded_file($_FILES['img']['tmp_name'], $path)){
    $_SESSION['message'] = 'ошибка при загрузке картинки';
}

$_SESSION['img'] = $path;
$mysql = new mysqli('localhost', 'root', '', 'reg');
if ($mysql->connect_errno) exit('Произошла какая то ошибка');
$mysql->set_charset('utf8');

$profile = mysqli_query($mysql, "SELECT * FROM `users`");
$profile = mysqli_fetch_all($profile);

$result = $mysql->query("SELECT * FROM `users` WHERE `name` = '$name'");
$user = $result->fetch_assoc();

if(is_array($user) == true && $user['name'] != $_COOKIE['user']){
    $_SESSION['message'] = 'Такое имя уже существует';
    header('location: reg.php');
    exit();
    } 
$id = $_GET['id'];
if($path == 'uploads/'){
    $result = $mysql->query("UPDATE `users` SET `password` = '$password', `name` = '$name', `city` = '$city', `about` = '$about' WHERE `users`.`id` = '$id'");
} else{
    $result = $mysql->query("UPDATE `users` SET `password` = '$password', `name` = '$name', `img` = '$path', `city` = '$city', `about` = '$about' WHERE `users`.`id` = '$id'");
}
$_SESSION['message'] = 'Изменения сохранены';
setcookie('user', $name, time() + 3600, "/");
header('location: reg.php');

?>

</body>
</html>