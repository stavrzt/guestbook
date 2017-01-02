<?php

const USER = 'root';
const PASS = '';

try {
    /* Return PDO instance of for connect with database */
    return new PDO('mysql:host=127.0.0.1:3307;dbname=guestbook', USER, PASS);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}