<?php

//error_reporting(0);
error_reporting(E_ALL|E_STRICT);

include_once 'connection.php';

if (isset($_POST['Update'])) {

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_SPECIAL_CHARS);

    
        $stmt = $conn->prepare("UPDATE usuarios SET first_name =:first_name, last_name =:last_name, username=:username, cidade=:cidade, cep=:cep WHERE id= :id");

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':cep', $cep);
        $stmt->execute();

        header('Location: listar.php');
    }

?>


<?php
$id = $_GET['id'];

$stmt = $conn->prepare("SELECT  * FROM usuarios WHERE id=:id");

$stmt->execute(['id' => $id]); //$stmt->execute(array('id' => $id));

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //$id = $row['id'];
    //$stmt->lastInsertedId = $row['id'];
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

<body style="padding-left: 15px;">
 

<div class="container">
  <div class="row">

    <form action="edit.php" method="post" class="form-control">
        

        
        <label class="form-label">Nome:</label>
        <input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>"  />
        <label class="form-label">Sobrenome:</label>
        <input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>"  />
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>"  />
        <label class="form-label">Cidade</label>
        <input type="text" name="cidade" class="form-control" value="<?php echo $cidade; ?>" />

        <label class="form-label">Cep</label>
        <input type="text" name="cep" class="form-control" value="<?php echo $cep; ?>"  /><br>

        

        <input type="hidden" name='id' value="<?php echo $id; ?>" />

        <input type="submit" name="Update" value="Adicionar" class="btn btn-warning" /><br>
    </form>
  </div>   
 </div>   
</body>

</html>