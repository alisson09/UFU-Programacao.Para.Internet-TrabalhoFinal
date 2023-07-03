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

$peso = $altura = $tiposanguineo = "";
  if (isset($_POST["peso"])) $peso = $_POST["peso"];
  if (isset($_POST["altura"])) $altura = $_POST["altura"];
  if (isset($_POST["tiposanguineo"])) $tiposanguineo = $_POST["tiposanguineo"];

  $sql1 = <<<SQL
  INSERT INTO pessoa (nome, sexo, email, telefone, 
                      cep, logradouro, cidade, estado)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?)
  SQL;

  $sql2 = <<<SQL
  INSERT INTO paciente 
    (peso, altura, tiposanguineo, codigo)
  VALUES (?, ?, ?, ?)
  SQL;

  try {
    $pdo->beginTransaction();

    $stmt1 = $pdo->prepare($sql1);
    if (!$stmt1->execute([
      $nome, $sexo, $email, $telefone,
      $cep, $logradouro, $cidade, $estado
    ])) throw new Exception('Falha na primeira inserção');

    $codigo_paciente = $pdo->lastInsertId();

    $stmt2 = $pdo->prepare($sql2);
    if (!$stmt2->execute([
        $peso, $altura, $tiposanguineo, $codigo_paciente
    ])) throw new Exception('Falha na segunda inserção');

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