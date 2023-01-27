<?php

session_start();

$pessoas = [];

if (isset($_SESSION['cadastroPessoas'])) {
    $pessoas = $_SESSION['cadastroPessoas'];
}