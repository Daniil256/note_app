<header class="header">
            <div class="header__title">MyCompany</div>
            <ul class="list">
                <li class="link"><a href="index.php">Главная</a></li>
                <li class="link"><a href="contacts.php">Контакты</a></li>
                <li class="link sign"><a href="reg.php">
                <?php if(isset($_COOKIE['user']) == false):?>
                    Log in
                    <?php else:?>
                        <?=$_COOKIE['user']?>
                        <?php endif;?> 
                </a></li>
            </ul>
        </header>