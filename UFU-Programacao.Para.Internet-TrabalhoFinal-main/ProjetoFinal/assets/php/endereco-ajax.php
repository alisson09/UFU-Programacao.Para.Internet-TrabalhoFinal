<?php

require "conexao.php";
$pdo = mysqlConnect();

$cep = $logradouro = $cidade = $estado = "";
if (isset($_POST["cep"])) $cep = $_POST["cep"];
if (isset($_POST["logradouro"])) $logradouro = $_POST["logradouro"];
if (isset($_POST["cidade"])) $cidade = $_POST["cidade"];
if (isset($_POST["estado"])) $estado = $_POST["estado"];

$sql = <<<SQL
INSERT INTO ajax (cep, logradouro, cidade, estado)
VALUES (?, ?, ?, ?)
SQL;

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      $cep, $logradouro, $cidade, $estado
    ]);

    header("Location: http://trabalhofinal-afonso-alisson.atwebpages.com/clinica/");
    exit();
  } 
  catch (Exception $e) {
    if ($e->errorInfo[1] === 1062)
      exit('Dados duplicados: ' . $e->getMessage());
    else
      exit('Falha ao cadastrar os dados: ' . $e->getMessage());
  }