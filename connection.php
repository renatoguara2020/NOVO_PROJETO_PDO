<?php

try {
    $conn = new PDO('mysql:host=localhost; dbname=login', 'root', '');
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}