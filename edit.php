<?php

include_once 'connection.php';

if (isset($_POST['Submit'])) {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $data = $_POST['data_cadastro'];

    $stmt = $conn->prepare(
        'UPDATE usuarios 
        SET first_name = :first_name, last_name = :lastname, username = :username, cidade = :cidade, estado = :estado ,cep = cep: data_cadastro = :data_cadastro

         WHERE id=:id '
    );
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
    $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':cidade', $cidade, PDO::PARAM_STR);
    $stmt->bindParam(':cep', $cep, PDO::PARAM_STR);
    $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
    $stmt->bindParam(':data_cadastro', $data_cadastro);

    $stmt->execute();

    header('Location: http://localhost/testes_php_2023/index.php');

    $id = $_GET['id'];

    $stmt = $conn->prepare('SELECT  * FROM usuarios  WHERE id = :id');

    $stmt->execute([':id' => $id]);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $first_name = $row['first_name'];
        echo $last_name = $row['last_name'];
        echo $username = $row['username'];
        echo $estado = $row['estado'];
        echo $cidade = $row['cidade'];
        echo $cep = $row['cep'];
        echo $data_cadastro = $row['data_cadastro'];
        //echo $data = $row['data'];
    }
}
?>


<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <form action="edit.php" method="post" enctype="multipart/form">
        <label class="form-label">Nome</label>
        <input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>"
            placeholder=" Digite seu Nome">

        <label class="form-label">Nome</label>
        <input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>"
            placeholder=" Digite seu Nome">

        <label class="form-label">Nome</label>
        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>"
            placeholder=" Digite seu Nome">


        <label class="form-label">Estado</label>
        <select class="form-select" id="validationCustom04" name="estado">
            <option selected disabled value="">Selecione o Estado...</option>
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
            <option value="EX">Estrangeiro</option>
        </select>

        <label class="form-label">Cidade</label>
        <input type="text" name="cidade" class="form-control" value="<?php echo $cidade; ?>"
            placeholder=" Digite seu Nome">

        <label class="form-label">CEP</label>
        <input type="text" name="cep" class="form-control" value="<?php echo $cep; ?>" placeholder=" Digite seu Nome">

        <label class="form-label">Data Cadastro</label>
        <input type="data" name="data_cadastro" class="form_control" value="<?php echo $data_cadastro; ?>">



        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

        <input type="submit" name="Submit" value="Cadastrar" class="btn btn-warning" />
    </form>
</body>

</html> -->