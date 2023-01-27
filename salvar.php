<?php

//var_dump($_POST);
$_SESSION['cadastroPessoas'][] = $POST;

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
} else {
    $stmt = $conn->prepare("INSERT INTO usuarios (first_name, last_name, username, estado, cidade, cep)
    VALUES(:first_name, :last_name, :username, :estado, :cidade, :cep)");
}

$stmt->bindParam(':first_name', $firstName, PDO::PARAM_STR);
$stmt->bindParam(':last_name', $lastName, PDO::PARAM_STR);
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
$stmt->bindParam(':cidde', $cidade, PDO::PARAM_STR);
$stmt->bindParam(':cep', $cep, PDO::PARAM_STR);

$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo 'Usuário Cadastrado com Sucesso';
} else {
    echo 'Usuário  não foi cadastrado ';
}