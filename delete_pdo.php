<?php
$id = 5;

$id = $_GET['id'];

try {
  $pdo = new PDO('mysql:host=localhost;dbname=meuBancoDeDados', $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $pdo->prepare('DELETE FROM minhaTabela WHERE id = :id');
  $stmt->bindParam(':id', $id);
  $stmt->execute();

  if($stmt->rowCount() > 0){

    echo 'Usuário cadastrado com sucesso';
  }
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
?>