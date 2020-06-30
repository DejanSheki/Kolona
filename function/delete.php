<?php
    require "connection.php";
    $id = $_GET['id'];
    $code = $_GET['code'];

    $stmt = $db->prepare('DELETE FROM `users` WHERE user_id = :id');
    $stmt->bindParam(':id', $id);
    $exec = $stmt->execute();


    $stmt = $db->prepare('DELETE FROM `offer` WHERE code = :code');
    $stmt->bindParam(':code', $code);
    $exec = $stmt->execute();

    header('Location: dashboard.php');

?>