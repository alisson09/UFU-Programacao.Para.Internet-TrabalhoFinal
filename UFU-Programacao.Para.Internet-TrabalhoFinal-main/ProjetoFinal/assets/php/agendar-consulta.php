<?php
  require "conexao.php";
  $pdo = mysqlConnect();

  $data_agenda = $horario = $nome = $sexo = $email = $codigo = "";
  if (isset($_POST["data_agenda"])) $data_agenda = $_POST["data_agenda"];
  if (isset($_POST["horario"])) $horario = $_POST["horario"];
  if (isset($_POST["nome"])) $nome = $_POST["nome"];
  if (isset($_POST["sexo"])) $sexo = $_POST["sexo"];
  if (isset($_POST["email"])) $email = $_POST["email"];
  if (isset($_POST["codigo_medico"])) $codigo = $_POST["codigo_medico"];

  $sql = <<<SQL
SELECT codigo
FROM pessoa
WHERE nome = ?
SQL;

try {
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$codigo]);
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
  INSERT INTO agenda 
    (data_agenda, horario, nome, sexo, email, codigo_medico)
  VALUES (?, ?, ?, ?, ?, ?)
  SQL;

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      $data_agenda, $horario, $nome, $sexo, $email, $codigo_medico
    ]);

    header("Location: http://trabalhofinal-afonso-alisson.atwebpages.com/clinica/");
    exit();
  } catch (Exception $e) {
    if ($e->errorInfo[1] === 1062)
      exit('Dados duplicados: ' . $e->getMessage());
    else
      exit('Falha ao cadastrar os dados: ' . $e->getMessage());
  }
?>