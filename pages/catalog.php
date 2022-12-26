<?php
    $mysql = new mysqli('localhost', 'root', '', 'cedar');

    $result = $mysql->query("SELECT * FROM `product`");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/scss/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Каталог</title>
</head>
<body>
<div class="wrapper">
    <div class="wrapper__body">
    <div class="body__header">
            <a href="/index.php" class="header__logo">
                <img src="/img/header/logo.png" alt="">
            </a>
            <div class="header__links">
                <a <?php
              if($_COOKIE["id"]){
                echo 'onclick=', '"location.href=', "'/pages/profile.php'", ';"';
              }
              else{
                echo "href='#popup'";
              }
            ?> class="links__lk  popup_link">
                    <img src="/img/header/lk.png" alt="">
                </a>
                <a href="/pages/basket.php" class="links__basket">
                    <img src="/img/header/basket.png" alt="">
                </a>
                </div>

        </div>
        <div class="catalog__body">
            <div class="catalog__header">
                КАТАЛОГ
            </div>
            <div class="catalog__main">
                <div class="catalog__filters">
                    <div class="filter categories">
                        <div class="filter__header">
                            Категории
                        </div>
                        <div class="filter__body">
                            <label class="filter__checkbox"  for="posuda">
                                <input data-categories="posuda" type="checkbox" checked="checked" id="posuda">Столовая посуда
                            </label>
                            <label class="filter__checkbox"  for="tekstil">
                                <input data-categories="tekstil" type="checkbox" checked="checked" id="tekstil">Текстиль
                            </label>
                            <label class="filter__checkbox"  for="svechi">
                                <input data-categories="svechi" type="checkbox" checked="checked" id="svechi">Свечи и подсвечники
                            </label>
                            <label class="filter__checkbox"  for="hranenie">
                                <input data-categories="hranenie" type="checkbox" checked="checked" id="hranenie">Хранение
                            </label>
                        </div>
                        <div class="filter material">
                            <div class="filter__header">
                                Материал
                            </div>
                            <div class="filter__body">
                            <label class="filter__checkbox"  for="keramika">
                                <input data-material="keramika" type="checkbox" checked="checked" id="keramika">Керамика
                            </label>
                            <label class="filter__checkbox"  for="steklo">
                                <input data-material="steklo" type="checkbox" checked="checked" id="steklo">Стекло
                            </label>
                            <label class="filter__checkbox"  for="farfor">
                                <input data-material="farfor" type="checkbox" checked="checked" id="farfor">Фарфор
                            </label>
                            <label class="filter__checkbox"  for="hlopok">
                                <input data-material="hlopok" type="checkbox" checked="checked" id="hlopok">Хлопок
                            </label>
                            <label class="filter__checkbox"  for="plastic">
                                <input data-material="plastic" type="checkbox" checked="checked" id="plastic">Пластик
                            </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="catalog__items">
                    <div class="catalog__search">
                        <input class="search" id="search" type="text" placeholder="Поиск по сайту"/>
                    </div>
                    <div class="catalog__products">
                       <?php
                            while($catalog = mysqli_fetch_assoc($result)){
                                if($catalog["count"] > 0){
                                ?>
                                <form action="/pages/item.php" method="POST">
                                    <button action="submit" class="item <?php echo $catalog["category"]; ?> <?php echo $catalog["material"]; ?> checked">
                                        <input type="text" name="id" value="<?php echo $catalog["id"]?>" style="display:none">
                                        <div class="item__img"><img src="<?php echo $catalog["img1"]; ?>" alt=""></div>
                                        <div class="item__name"><?php echo $catalog["name"]; ?></div>
                                        <div class="item__price"><?php echo $catalog["price"]; ?> руб</div>
                                    </button>  
                                </form>
                        <?php
                                }        
                            }
                       ?>
                       <div id="search_error">
                        Ничего не найдено
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="popup" id="popup">
        <div class="popup_body">
            <form action="/php/auth.php" method="post">
                <div class="popup_content">
                    <div class="popup_letter"></div>
                    <div class="popup_title">Вход в личный кабинет</div>
                    <input type="text" placeholder="Логин" name="auth_login" class="popup_login popup_input">
                    <input type="password" placeholder="Пароль" name="auth_password" class="popup_password popup_input">
                    <button action="submit" class="popup_button">Вход</button>
                    <a href="#popup_2" class="popup_link popup_registration">
                        <div>Вас еще нет в системе?<br>
                            Зарегистрируйтесь!</div>
                    </a>
                </div>
            </form>
        </div>
    </div>
    <div class="popup" id="popup_2">
        <div class="popup_body">
            <form action="/php/registration.php" method="post">
                <div class="popup_content">
                    <div class="popup_letter"></div>
                    <div class="popup_title">Регистрация</div>
                    <input type="text" id="popup_name" placeholder="Ваше Имя:" name="popup_name"
                        class="popup_name popup_input">
                    <input type="email" id="popup_email" placeholder="Ваш E-mail:" name="popup_email"
                        class="popup_email popup_input">
                    <input type="password" id="popup_password" placeholder="Пароль" name="popup_password"
                        class="popup_password popup_input">
                    <input type="password" id="popup_passwordRepeat" name="popup_passwordRepeat"
                        placeholder="Повторите пароль" class="popup_passwordRepeat popup_input">
                    <button action="submit" id="popup_button" class="popup_button ">Зарегистрироваться</button>
                    <div id="error"></div>
                </div>
            </form>
        </div>
    </div>

    <script src="/js/popup.js"></script>
    <script src="/js/registration.js"></script>
    <script src="/js/filter.js"></script>
    <script src="/js/search.js"></script>
</body>
</html>