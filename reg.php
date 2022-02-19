<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login and register</title>
</head>

<body>
    <div class="wrapper">
        <?php session_start(); ?>
        <?php require "header.php"?>
        <div class="nav">
            <?php if(isset($_COOKIE['user']) == false):?>
            <div class="form">
                <div class="form__title title">Войти</div>
                <div class="msg">
                    <?php echo $_SESSION['message']; 
                    $_SESSION['message'] = '';
                    ?>

                </div>
                <form action="auth.php" method="post">
                    <input type="text" class="input_login" name="name" id="name" placeholder="name">
                    <input type="password" class="input_login pass" name="password" id="password"
                        placeholder="password">
                    <button class="button" type="submit">Sign</button>

                </form>
                <div class="form__title title">Зарегистрироваться</div>
                <form action="check.php" method="post">
                    <input type="text" class="input_login" name="name" id="name" placeholder="name">
                    <input type="password" class="input_login pass" name="password" id="password"
                        placeholder="password">
                    <button class="button" type="submit">Reg</button>
                </form>
            </div>
            <?php else:?>
            <p>Привет,
                <?=$_COOKIE['user']?>. Тут классно!
            </p> <span class="link sign"><a href="exit.php">Выйти из
                    аккаунта</a></span>


            <?php echo $_SESSION['message']; 
                $_SESSION['message'] = '';
                ?>
            <?php $mysql = new mysqli('localhost', 'root', '', 'reg');

                if ($mysql->connect_errno) exit('Произошла какая то ошибка');
                $mysql->set_charset('utf8');
                
                $nav = $_COOKIE['user'];
                $profile = mysqli_query($mysql, "SELECT * FROM `users` WHERE `name` = '$nav'");
                $profile = mysqli_fetch_all($profile);
                
                foreach ($profile as $profile) { ?>
            <div class="images">
                <img class="upload_img" src="<?=$profile[3];?>">
            </div>
            <form action="profile.php?id=<?=$profile[0];?>" method="post" enctype="multipart/form-data">
                <label for="file" class="button">Сменить аватар</label>
                <input type="file" name="img" id="file" class="file">
                <input type="text" class="input_login" name="name" id="name" placeholder="name"
                    value="<?=$profile[2];?>">

                <label class="open_pass_button"> Показать<input type="checkbox" class="checkbox" id="checkbox"></label>
                <input type="password" class="input_login pass" name="password" id="password" placeholder="password"
                    value="<?=$profile[1];?>">

                <textarea name="about" placeholder="о себе" class="input_login big"><?=$profile[5];?></textarea>
                <input type="text" name="city" placeholder="откуда я" class="input_login" value="<?=$profile[4];?>">
                <button type="submit" class="button">Save</button>

                <?php
                }
                ?>

            </form>
            <?php endif;?>
        </div>
        <?php require "footer.php"?>
    </div>
</body>
<script src="js/reg.js"></script>

</html>