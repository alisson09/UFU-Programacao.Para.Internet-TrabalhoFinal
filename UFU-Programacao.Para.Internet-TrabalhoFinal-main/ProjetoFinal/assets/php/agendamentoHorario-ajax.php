<?php
require "conexao.php";
$pdo = mysqlConnect();

$nome = $_POST["codigo_medico"] ?? '';
$data_agenda = $_POST['data_agenda'] ?? '';

$sql = <<<SQL
SELECT codigo
FROM pessoa
WHERE nome = ?
SQL;

try {
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$nome]);
  if ($stmt->rowCount() > 0){
    $row = $stmt->fetch();
    $codigo_medico = $row['codigo'];
  }
} 
catch (Exception $e) {
  exit('Falha inesperada: ' . $e->getMessage());
}


try {
  $sql = <<<SQL
  SELECT horario
  FROM agenda
  WHERE data_agenda = ? AND codigo_medico = ?
  SQL;

  $stmt = $pdo->prepare($sql);
  $stmt->execute([$data_agenda, $codigo_medico]);
} 
catch (Exception $e) {
  exit('Falha inesperada: ' . $e->getMessage());
}

$hora = array();

if($stmt->rowCount()>0){  
  while ($row = $stmt->fetch()) {
    $hora[] = array(
      'hora' => $row['horario']
    );
  }
}


echo json_encode($hora);