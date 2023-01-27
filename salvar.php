<?php

$conn = new PDO('mysql:host=localhost; dbname=login', 'root', '');

if (isset($_POST['cadastrar'])) {
    if (isset($_POST['first_name'])):
        $firstName = $_POST['first_name'];
    endif;

    if (isset($_POST['last_name'])):
        $lastName = $_POST['last_name'];
    endif;

    if (isset($_POST['username'])):
        $username = $_POST['username'];
    endif;

    if (isset($_POST['estado'])):
        $estado = $_POST['estado'];
    endif;

    if (isset($_POST['cidade'])):
        $cidade = $_POST['cidade'];
    endif;

    if (isset($_POST['cep'])):
        $cep = $_POST['cep'];
    endif;

    $stmt = $conn->prepare("INSERT INTO usuarios (first_name, last_name, username, estado, cidade, cep, data_cadastro)
    VALUES(:first_name, :last_name, :username, :estado, :cidade, :cep, NOW() ) ");

    $stmt->bindValue(':first_name', $firstName, PDO::PARAM_STR);
    $stmt->bindValue(':last_name', $lastName, PDO::PARAM_STR);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':estado', $estado, PDO::PARAM_STR);
    $stmt->bindValue(':cidade', $cidade, PDO::PARAM_STR);
    $stmt->bindValue(':cep', $cep, PDO::PARAM_STR);

    $stmt->execute();

    // $stmt->execute([
    //     ':first_name' => $firstName,
    //     ':last_name' => $lastName,
    //     ':username' => $username,
    //     ':estado' => $estado,
    //     ':cidade' => $cidade,
    //     ':cep' => $cep,
    // ]);

    if ($stmt->rowCount() > 0) {
        echo 'Usuário Cadastrado com Sucesso';
        header('Location:listar.php');
    } else {
        echo 'Usuário  não foi cadastrado ';
    }
}