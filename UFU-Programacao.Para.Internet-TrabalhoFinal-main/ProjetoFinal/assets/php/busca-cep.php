<?php
require "conexao.php";
$pdo = mysqlConnect();

$cep = $_POST['cep'] ?? '';

try {
  $sql = <<<SQL
  SELECT logradouro, cidade, estado
  FROM ajax
  WHERE cep = ?
  SQL;

  $stmt = $pdo->prepare($sql);
  $stmt->execute([$cep]);
} catch (Exception $e) {
  exit('Falha inesperada: ' . $e->getMessage());
}

$enderecos = array();

if ($stmt->rowCount() > 0) {
  $row = $stmt->fetch();
  $enderecos['logradouro'] = $row['logradouro'];
  $enderecos['cidade'] = $row['cidade'];
  $enderecos['estado'] = $row['estado'];
} else {
  return;
}
echo json_encode($enderecos);