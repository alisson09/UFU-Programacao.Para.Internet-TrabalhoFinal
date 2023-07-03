<?php
require "conexao.php";
$pdo = mysqlConnect();

$especialidade = $_POST['especialidade'] ?? '';

try {
  $sql = <<<SQL
  SELECT nome, medico.codigo
  FROM pessoa, medico
  WHERE pessoa.codigo=medico.codigo AND especialidade = ?
  SQL;

  $stmt = $pdo->prepare($sql);
  $stmt->execute([$especialidade]);
} 
catch (Exception $e) {  
  exit('Falha inesperada: ' . $e->getMessage());
}

$medicos = array();
while ($row = $stmt->fetch()) {
  $medicos[] = array(
    'nome' => $row['nome']
  );
}
echo json_encode($medicos);
