<?php
setcookie('user', $user['name'], time() * 0, "/");

header('location: reg.php');
?>