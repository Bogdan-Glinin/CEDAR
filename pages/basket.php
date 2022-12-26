<?php
    $mysql = new mysqli('localhost', 'root', '', 'cedar');

    $id = $_COOKIE["id"];
    $count = $_POST["count"];

    $result = $mysql->query("SELECT * FROM `basket` WHERE `userId` = '$id'");

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
    <title>Корзина</title>
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
        <div class="basket__body">
        <div class="profile__header">
                КОРЗИНА
            </div>
            <a href="/pages/catalog.php" class="profile__link">
                Продолжайте делать покупки
            </a>
        <?php
                if(!$_COOKIE["id"]){
                    ?>
                    <div class="error" style="margin-top: 60px;">
                    Вы не вошли в аккаунт
                </div>
            <?php
                }
                else{
                    while($userBasket = mysqli_fetch_assoc($result)) {
                        $mysql = new mysqli('localhost', 'root', '', 'cedar');
                        $productId = $userBasket["productId"];
                        $product = $mysql->query("SELECT * FROM `product` WHERE `id` = '$productId'");
                        $product = $product->fetch_assoc();
                        $price += intval(str_replace(" ", '', $str));
                    ?>
                        <div class="basket__item">
                            <div class="basket__img">
                                <img src="<?php echo $product['img1']?>" alt="">
                            </div>
                            <div class="basket__name">
                                <?php echo $product["name"]; ?>
                            </div>
                            <div class="basket__count">
                                <div class="minus" id="minus">-</div>
                                    <input type="number" name="count" value="<?php echo $userBasket["count"];?>" class="item__input" id="item__input">
                                <div class="plus" id="plus">+</div>
                            </div>
                            <div class="basket__price">
                                <?php echo intval(str_replace(" ", '', $product["price"])) * $userBasket["count"]; ?> руб.
                            </div>
                            <form action="/php/deleteFromBasket.php" method="POST">
                            <input type="number" value="<?php echo $product['count'];?>" id="max_value" style="display:none;">
                                <input id="item__input" type="text" name="delete" value="<?php echo $userBasket["id"]?>" style="display:none" readonly>
                                <div class="delete__item">
                                <button action="submit"><img src="/img/delete.png" alt=""></button>
                                </div>
                            </form>
                        </div>
                        <?php };
                    $mysql = new mysqli('localhost', 'root', '', 'cedar');

                    $id = $_COOKIE["id"];
                
                    $result = $mysql->query("SELECT * FROM `basket` WHERE `userId` = '$id'");
                
                    $mysql->close();
                    if(!$userBasket = mysqli_fetch_assoc($result)){
                    ?>
                    <div class="error" style="margin-top: 60px;">
                        Корзина пустая
                    </div>
                    <?php }
                    else{ ?>
                    <form action="/php/buy.php">
                        <button action="submit" class="basket__buy">
                            Оформить заказ
                        </button>
                        <?php }} ?>
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
    <script src="/js/item.js"></script>
</body>
</html>