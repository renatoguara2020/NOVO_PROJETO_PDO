<?php

include_once 'connection.php';

if (isset($_POST['Update'])) {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $cidade = $_POST['cidade'];
    $cep = $_POST['cep'];

    if (
        empty($first_name) ||
        empty($last_name) ||
        empty($username) ||
        empty($cidade) ||
        empty($cep)
    ) {
        if (!isset($first_name)) {
            echo '<div class="alert alert-danger"> Digite seu nome </div>';
        }
        if (!isset($last_name)) {
            echo '<div class="alert alert-danger"> Digite seu sobrenome</div>';
        }

        if (!isset($username)) {
            echo '<div class="alert alert-danger">Digite a seu username</div>';
        }

        if (!isset($cidade)) {
            echo '<div class="alert alert-danger"> Digite sua Cidade</div>';
        }

        if (!isset($cep)) {
            echo '<div class="alert alert-danger"> Digite seu  Cep</div>';
        }
    } else {
        $stmt = $conn->prepare(
            'UPDATE usuarios SET first_name =:first_name, last_name =:last_name,username=:username,cidade=:cidade, cep=:cep WHERE id=:id'
        );

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':cep', $cep);
        $stmt->execute();

        //header('Location: http://localhost/testes_php_2023/index.php');
    }
}
?>


<?php
$id = $_GET['id'];

$stmt = $conn->prepare('SELECT  * FROM usuarios WHERE id=:id');

$stmt->execute(array(':id' => $id));

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $id = $row['id'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $username = $row['username'];
    $cidade = $row['cidade'];
    $cep = $row['cep'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<title>Document</title>
</head>

<body>

    <form action="edit.php" method="post">
        <label class="form-label">Nome:</label>
        <input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>"
            placeholder="Digite seu Nome" />
        <label class="form-label">Sobrenome:</label>
        <input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>"
            placeholder="Digite seu Email" />
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>"
            placeholder="Digite seu username" />
        <label class="form-label">Cidade</label>
        <input type="text" name="cidade" class="form-control" value="<?php echo $cidade; ?>"
            placeholder="Digite sua cidade" />

        <label class="form-label">Cep</label>
        <input type="text" name="cep" class="form-control" value="<?php echo $cep; ?>" placeholder="Digite seu Cep" />

        

         <input type="hidden" name='id' value="<?php echo $_GET['id']; ?>" > 

        <input type="submit" name="Update" value="Adicionar" class="btn btn-warning" />
    </form>
</body>

</html>