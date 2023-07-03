<?php
require "conexao.php";
$pdo = mysqlConnect();

$nome = $sexo = $email = $telefone = "";
$cep = $logradouro = $cidade = $estado = "";
if (isset($_POST["nome"])) $nome = $_POST["nome"];
if (isset($_POST["sexo"])) $sexo = $_POST["sexo"];
if (isset($_POST["email"])) $email = $_POST["email"];
if (isset($_POST["telefone"])) $telefone = $_POST["telefone"];
if (isset($_POST["cep"])) $cep = $_POST["cep"];
if (isset($_POST["logradouro"])) $logradouro = $_POST["logradouro"];
if (isset($_POST["cidade"])) $cidade = $_POST["cidade"];
if (isset($_POST["estado"])) $estado = $_POST["estado"];

$datacontrato = $salario = $senha = "";
if (isset($_POST["datacontrato"])) $datacontrato = $_POST["datacontrato"];
if (isset($_POST["salario"])) $salario = $_POST["salario"];
if (isset($_POST["senha"])) $senha = $_POST["senha"];

$especialidade = $crm = "";
if (isset($_POST["especialidade"])) $especialidade = $_POST["especialidade"];
if (isset($_POST["crm"])) $crm = $_POST["crm"];

$senhahash = password_hash($senha, PASSWORD_DEFAULT);

if(isset($_POST['checkbox'])){
  
  $sql1 = <<<SQL
  INSERT INTO pessoa (nome, sexo, email, telefone, 
                      cep, logradouro, cidade, estado)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?)
  SQL;

  $sql2 = <<<SQL
  INSERT INTO funcionario 
    (datacontrato, salario, senhahash, codigo)
  VALUES (?, ?, ?, ?)
  SQL;

  $sql3 = <<<SQL
  INSERT INTO medico 
  (especialidade, crm, codigo)
  VALUES (?, ?, ?)
  SQL;

  try {
    $pdo->beginTransaction();
  
    $stmt1 = $pdo->prepare($sql1);
    if (!$stmt1->execute([
      $nome, $sexo, $email, $telefone,
      $cep, $logradouro, $cidade, $estado
    ])) throw new Exception('Falha na primeira inserção');
  
    $codigo_funcionario = $pdo->lastInsertId();
  
    $stmt2 = $pdo->prepare($sql2);
    if (!$stmt2->execute([
      $datacontrato, $salario, $senhahash, $codigo_funcionario
    ])) throw new Exception('Falha na segunda inserção');
  
    $stmt3 = $pdo->prepare($sql3);
    if (!$stmt3->execute([
      $especialidade, $crm, $codigo_funcionario
    ])) throw new Exception('Falha na terceira inserção');
  
    $pdo->commit();
  
    header("Location: inicio.php");
    exit();
  } 
  catch (Exception $e) {
    $pdo->rollBack();
    if ($e->errorInfo[1] === 1062)
      exit('Dados duplicados: ' . $e->getMessage());
    else
      exit('Falha ao cadastrar os dados: ' . $e->getMessage());
  }
} 
else 
{
  $sql1 = <<<SQL
  INSERT INTO pessoa (nome, sexo, email, telefone, 
                      cep, logradouro, cidade, estado)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?)
  SQL;

  $sql2 = <<<SQL
  INSERT INTO funcionario 
    (datacontrato, salario, senhahash, codigo)
  VALUES (?, ?, ?, ?)
  SQL;
  
  try {
    $pdo->beginTransaction();
  
    $stmt1 = $pdo->prepare($sql1);
    if (!$stmt1->execute([
      $nome, $sexo, $email, $telefone,
      $cep, $logradouro, $cidade, $estado
    ])) throw new Exception('Falha na primeira inserção');
  
    $codigo_funcionario = $pdo->lastInsertId();
  
    $stmt2 = $pdo->prepare($sql2);
    if (!$stmt2->execute([
      $datacontrato, $salario, $senhahash, $codigo_funcionario
    ])) throw new Exception('Falha na segunda inserção');

    $pdo->commit();
  
    header("Location: http://trabalhofinal-afonso-alisson.atwebpages.com/clinica/");
    exit();
  } 
  catch (Exception $e) {
    $pdo->rollBack();
    if ($e->errorInfo[1] === 1062)
      exit('Dados duplicados: ' . $e->getMessage());
    else
      exit('Falha ao cadastrar os dados: ' . $e->getMessage());
  }
}
