<?php

    if($user = intval($_COOKIE["id"])){
        $id = intval($_POST["id"]);
        $count = intval($_POST["count"]);

        $mysql = new mysqli('localhost', 'root', '', 'cedar');

        $mysql->query("INSERT INTO `basket` (userId, productId, count) VALUES ($user, $id, $count)");

        $mysql->close();

        header("Location: /pages/basket.php");
    }
    else{
        header("Location: /index.php");
    }
?>