<?php
    $mysql = new mysqli('localhost', 'root', '', 'cedar');

    $result = $mysql->query("SELECT * FROM `product` WHERE id = 1");
    $hit1 = $result->fetch_assoc();
    $result = $mysql->query("SELECT * FROM `product` WHERE id = 2");
    $hit2 = $result->fetch_assoc();
    $result = $mysql->query("SELECT * FROM `product` WHERE id = 3");
    $hit3 = $result->fetch_assoc();
    $result = $mysql->query("SELECT * FROM `product` WHERE id = 4");
    $hit4 = $result->fetch_assoc();


    $mysql->close();

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
    <title>CEDAR</title>
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
        <div class="body__main">
            <div class="main__header">
                Салон посуды и декора интерьера
            </div>
            <div class="main__info">
                Мы собрали с особой любовью всё для Вашего дома: от лиможского фарфора из Франции до невесомых чайных пар Императорского фарфорового завода
            </div>
            <a href="/pages/catalog.php" class="main__catalog">
                <div class="catalog__link">
                    Перейти в каталог
                </div>
            </a>
            <div class="main__hits">
                <div class="hits__header">
                    ХИТЫ ПРОДАЖ
                </div>
                <div class="hits__body">
                    <form action="../pages/item.php" method="POST">
                    <button action="submit" class="hits__item">
                        <input name="id" type="text" value="<?php echo $hit1['id']; ?>" style="display:none;">
                        <div class="hits__img">
                            <img src="<?php echo $hit1['img1'] ?>" alt="">
                        </div>
                        <div class="hits__name">
                            <?php echo $hit1["name"]; ?>
                        </div>
                        <div class="hits__price">
                            <?php echo $hit1["price"]; ?> руб.
                        </div>
                    </button>
                    </form>
                    <form action="../pages/item.php" method="POST">
                    <button action="submit" class="hits__item">
                        <input name="id" type="text" value="<?php echo $hit2['id']; ?>" style="display:none;">
                        <div class="hits__img">
                            <img src="<?php echo $hit2['img1'] ?>" alt="">
                        </div>
                        <div class="hits__name">
                            <?php echo $hit2["name"]; ?>
                        </div>
                        <div class="hits__price">
                            <?php echo $hit2["price"]; ?> руб.
                        </div>
                    </button>
                    </form>
                    <form action="../pages/item.php" method="POST">
                    <button action="submit" class="hits__item">
                        <input name="id" type="text" value="<?php echo $hit3['id']; ?>" style="display:none;">
                        <div class="hits__img">
                            <img src="<?php echo $hit3['img1'] ?>" alt="">
                        </div>
                        <div class="hits__name">
                            <?php echo $hit3["name"]; ?>
                        </div>
                        <div class="hits__price">
                            <?php echo $hit3["price"]; ?> руб.
                        </div>
                    </button>
                    </form>
                    <form action="../pages/item.php" method="POST">
                    <button action="submit" class="hits__item">
                        <input name="id" type="text" value="<?php echo $hit4['id']; ?>" style="display:none;">
                        <div class="hits__img">
                            <img src="<?php echo $hit4['img1'] ?>" alt="">
                        </div>
                        <div class="hits__name">
                            <?php echo $hit4["name"]; ?>
                        </div>
                        <div class="hits__price">
                            <?php echo $hit4["price"]; ?> руб.
                        </div>
                    </button>
                    </form>
                </div>
            </div>
            <div class="body__gemoroy">
                <div class="gemoroy__toch">
                    <img src="/img/toch.png" alt="">
                </div>
                <div class="gemoroy__text">
                Главней всего — посуда в доме
                </div>
                <div class="gemoroy__hcot">
                    <img src="/img/hcot.png" alt="">
                </div>
            </div>
            <a href="/pages/catalog.php" class="main__catalog">
                <div id="catalog" class="catalog__link">
                    Перейти в каталог
                </div>
            </a>
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
</body>
</html>