<?php

try {
    $conn = new PDO('mysql:host=localhost; dbname=login', 'root', '');
    //echo 'Connected Successfully!!!!!';
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}