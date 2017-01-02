<?php

$user = 'root';
$pass = '';

try {
    return $db = new PDO('mysql:host=127.0.0.1:3307;dbname=guestbook', $user, $pass);
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}