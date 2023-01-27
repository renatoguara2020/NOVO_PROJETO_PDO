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
}