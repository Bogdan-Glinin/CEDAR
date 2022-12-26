<?php

$id = $_POST["id"];
$price = $_POST["price"];
$count= intval($_POST["count"]);

$mysql = new mysqli('localhost', 'root', '', 'cedar');

$mysql->query("UPDATE `product` SET `price`=$price, `count`=$count WHERE `id`=$id");

$mysql->close();

header("Location: /pages/admin.php");
?>