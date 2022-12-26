<?php

$data = [
    "popup_name" => $_POST['popup_name'],
    "popup_email" => $_POST['popup_email'],
    "popup_password" => $_POST['popup_password']
];

$name = $data["popup_name"];
$mail = $data["popup_email"];
$password = $data["popup_password"];

$mysql = new mysqli('localhost', 'root', '', 'cedar');

$mysql->query("INSERT INTO `user` (`name`, `email`, `password`) VALUES ('$name','$mail','$password')");

$result = $mysql->query("SELECT * FROM `user` WHERE `email` = '$mail' AND `password` = '$password'");

$user = $result->fetch_assoc();

$mysql->close();

setcookie("id", $user['id'], time() + 42000, "/");

header("Location: ../pages/profile.php");
?>