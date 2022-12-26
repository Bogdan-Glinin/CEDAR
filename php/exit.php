<?php
    setcookie("id", '', time() - 42000, '/');
    header("Location: ../index.php");
?>