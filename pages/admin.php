<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/scss/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Панель администратора</title>
</head>
<body>
<div class="wrapper">
    <div class="wrapper__body">
        <div class="profile__header" style="margin-botto: 60px;">
            Товары
            <span style="opacity: 0.6;">
                <?php
            $count = 0;
            $mysql = new mysqli('localhost', 'root', '', 'cedar');
            $product = $mysql->query("SELECT * FROM `product`");
            while($administating = mysqli_fetch_assoc($product)){
                $count++;
            }
            echo $count;
            ?>
            </span>
        </div>
        <table>
            <tr>
                <td>Фото</td>
                <td>Название</td>
                <td>Цена</td>
                <td>Количество</td>
                <td>Действие</td>
            </tr>
            <?php
                $mysql = new mysqli('localhost', 'root', '', 'cedar');
                $product = $mysql->query("SELECT * FROM `product`");
                while($administating = mysqli_fetch_assoc($product)){
                ?>
                <tr>
                <td> <img style="width: 100px" src="<?php echo $administating['img1'];?>" alt=""> </td>
                <td><?php echo $administating['name'];?></td>
                <form action="/php/change.php" method="POST">
                <td><input type="text" name="price" value="<?php echo $administating['price'];?>"></td>
                <td><input type="text" name="count" value="<?php echo $administating['count'];?>"></td>
                <td>
                <input type="text" name="id" value="<?php echo $administating["id"] ?>" style="display:none;">
                <button action="submit" style="text-decoration: underline;">Изменить</button>
                </td></form>
                </tr>
            <?php } ?>
        </table>
        <form action="../php/exit.php">
            <button class="exit">ВЫЙТИ</button>
          </form>
    </div>
</div>
</body>
</html>