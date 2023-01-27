<?php

try {
    $conn = new PDO('mysql:host=localhost; dbname=login', 'root', '');
    $id = $_GET['id'];

    echo $id;

    $stmt = $conn->prepare(
        'UPDATE usuarios SET first_name = :firstname, last_name = :lastname, username = :username, cidade = :cidade '
    );
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}