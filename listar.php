<?php

$conn = new PDO('mysql:host=localhost; dbname=login', 'root', '');

$result = $conn->query('SELECT * FROM usuarios ORDER BY id ASC');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>

    <a href="salvar.php">Cadastrar Usuário</a>
    <table class="table table-striped table-hover">

        <thead>

            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Sobrenome</th>
            <th scope="col">Username</th>
            <th scope="col">Estado</th>
            <th scope="col">Cidade</th>
            <th scope="col">CEP</th>
            <th scope="col">Data Cadastro</th> -->
            <th scope="col">Update | Delete</th>
        </thead>
        <?php
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['first_name'] . '</td>';
            echo '<td>' . $row['last_name'] . '</td>';
            echo '<td>' . $row['username'] . '</td>';
            echo '<td>' . $row['estado'] . '</td>';
            echo '<td>' . $row['cidade'] . '</td>';
            echo '<td>' . $row['cep'] . '</td>';
            echo '<td>' . $row['data_cadastro'] . '</td>';
            echo "<td><a href=\"edit.php?id=$row[id]\">Update</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
        }
        echo '</tr>';
        ?>

    </table>

</body>

</html>