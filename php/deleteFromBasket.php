<?php
    $delete = $_POST["delete"];

    $mysql = new mysqli('localhost', 'root', '', 'cedar');

    $mysql->query("DELETE FROM `basket` WHERE id = $delete");

    $mysql->close();

    header("Location: /pages/basket.php");
?>