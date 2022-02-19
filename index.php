<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Главная</title>
</head>

<body>
    <div class="wrapper">
        <?php require "header.php"?>
        <div class="nav content" id="nav">
            <div class="add" id="add">✖</div>

            <div class="note" id="note">
                <textarea class="note_text" id="note_text"></textarea>
                <div class="note_options">
                    <div class="option option_1">Размер шрифта
                        <div class="btn_1 option_btn" id="btn_1"></div>
                        <div class="btn_2 option_btn" id="btn_2"></div>
                    </div>
                    <div class="option option_2">Тип шрифта
                        <div class="btn_open_font_list option_btn" id="btn_open_font_list">A...</div>
                        <ul class="font_list" id="font_list">
                            <span class="btn_close_font_list" id="btn_close_font_list">✖</span>
                            <li class="font Courier" id="Courier">Courier New</li>
                            <li class="font Franklin" id="Franklin">Franklin Gothic</li>
                            <li class="font Serif" id="Serif">Serif</li>
                            <li class="font Segoe" id="Segoe">Segoe UI</li>
                            <li class="font Lobster" id="Lobster">Lobster</li>
                            <li class="font Comfortaa" id="Comfortaa">Comfortaa</li>
                            <li class="font Caveat" id="Caveat">Caveat</li>
                            <li class="font Amatic" id="Amatic">Amatic SC</li>
                            <li class="font press_start" id="press_start">Press Start</li>
                            <li class="font Underdog" id="Underdog">Underdog</li>
                            <li class="font Source_Code" id="Source_Code">Source_Code</li>
                        </ul>
                    </div>
                    <div class="option option_3">Цвет шрифта <input type="color" id="color" class="color option_btn"
                            value="#eeeeee">
                    </div>
                    <label for="button_add">
                        <div class="btn_save" id="btn_save">&#10004;</div>
                    </label>
                    <label for="button_add">
                        <div class="btn_exit" id="btn_exit">&#10006;</div>
                    </label>
                </div>
            </div>
        </div>
        <?php require "footer.php"?>
    </div>
</body>
<script src="js/script.js"></script>

</html>