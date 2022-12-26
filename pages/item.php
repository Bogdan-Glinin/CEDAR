<?php
    $id = $_POST["id"];

    $mysql = new mysqli('localhost', 'root', '', 'cedar');

    $result = $mysql->query("SELECT * FROM `product` WHERE id = $id");
    $item = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/scss/style.css">
    <title> <?php echo $item['name']; ?></title>
</head>
<body>
   <div class="wrapper">
    <div class="wrapper__body">
        <div class="wrapper__close">
            <a href="/index.php" class="close__body">
                <img src="/img/close.png" alt="">
            </a>
            <div class="item__main">
                <div class="item__main-img">
                    <img src="<? echo $item['img1'];?>" alt="">
                </div>
                <div class="item__main-body">
                    <div class="main-body__name">
                        <?php echo $item["name"]; ?>
                    </div>
                    <div class="main-body__price">
                        <?php echo $item["price"]; ?> руб.
                    </div>
                    <div class="main-body__count">
                        <div class="count">
                            Количество
                        </div>
                        <form action="/php/addToBasket.php" method="POST">
                        <input name="id" type="text" value="<?php echo $id; ?>" style="display:none;">
                        <div class="count__choice">
                            <input type="number" value="<?php echo $item['count'];?>" id="max_value" style="display:none;">
                            <div class="minus" id="minus">-</div>
                            <input type="number" name="count" value="1" class="item__input" id="item__input">
                            <div class="plus" id="plus">+</div>
                        </div>
                    </div>
                    <button action="submit" class="main-body__buy">
                        Купить
                    </button>
                </div>
            </div>
        </div>
    </form>
    </div>
   </div>
   <script src="/js/item.js"></script>
</body>
</html>