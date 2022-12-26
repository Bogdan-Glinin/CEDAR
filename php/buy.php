<?php
    $mysql = new mysqli('localhost', 'root', '', 'cedar');

    $id = $_COOKIE["id"];

    $result = $mysql->query("SELECT * FROM `basket` WHERE `userId` = '$id'");

    while($userBasket = mysqli_fetch_assoc($result)) {
        $userId = $userBasket["userId"];
        $productId = $userBasket["productId"];
        $count = $userBasket["count"];
        $mysql->query("INSERT INTO `history` (userId, productId, count) VALUES ($userId, $productId, $count)");
        $change = $mysql->query("SELECT * FROM `product` WHERE `id` = '$productId'");
        $change = $change->fetch_assoc();
        $changeCount = intval($change["count"]) - intval($count);
        $mysql->query("UPDATE `product` SET `count`='$changeCount' WHERE `id`='$productId'");
        
    }

    $mysql->query("DELETE FROM `basket`");

    $mysql->close();


    header("Location: /pages/profile.php");
?>