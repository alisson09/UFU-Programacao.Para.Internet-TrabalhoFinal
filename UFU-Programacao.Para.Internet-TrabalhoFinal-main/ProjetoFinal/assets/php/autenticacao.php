<?php
function checkPassword($pdo, $email, $senha)
{
  $sql = <<<SQL
  SELECT senhahash
  FROM funcionario,pessoa
  WHERE email = ? AND funcionario.codigo = pessoa.codigo
  SQL;

  try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $senhahash = $stmt->fetchColumn();

    if (!$senhahash) 
      return false;

    if (!password_verify($senha, $senhahash))
      return false;
      
    return $senhahash;
  } 
  catch (Exception $e) {
    exit('Falha inesperada: ' . $e->getMessage());
  }
}

function checkLogged($pdo)
{
  if (!isset($_SESSION['emailUsuario'], $_SESSION['loginString']))
    return false;

  $email = $_SESSION['emailUsuario'];

  $sql = <<<SQL
  SELECT senhahash
  FROM funcionario,pessoa
  WHERE email = ? AND funcionario.codigo = pessoa.codigo
  SQL;

  try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $senhahash = $stmt->fetchColumn();
    if (!$senhahash) 
      return false;

    $loginStringCheck = hash('sha512', $senhahash . $_SERVER['HTTP_USER_AGENT']);
    if (!hash_equals($loginStringCheck, $_SESSION['loginString']))
      return false;

    return true;
  } 
  catch (Exception $e) {
    exit('Falha inesperada: ' . $e->getMessage());
  }
}

function exitWhenNotLogged($pdo)
{
  if (!checkLogged($pdo)) {
    header("Location: http://trabalhofinal-afonso-alisson.atwebpages.com/clinica/");
    exit();
  }
}

function checknivel($pdo){
  $email = $_SESSION['emailUsuario'];
  $sql1 = <<<SQL
  SELECT medico.codigo FROM pessoa, medico WHERE email = ? AND pessoa.codigo = medico.codigo
  SQL;
  $stmt = $pdo->prepare($sql1);
  $stmt->execute([$email]);
  $row = $stmt -> fetch();

  if (!$row) {
    return $_SESSION['nivel'] = 1;
  } else{
    return $_SESSION['nivel'] = 2;
  }
}

function checkmedico($pdo){
  $email = $_SESSION['emailUsuario'];
  $sql2 = <<<SQL
  SELECT medico.codigo FROM pessoa, medico WHERE email = ? AND pessoa.codigo = medico.codigo
  SQL;
  $stmt = $pdo->prepare($sql2);
  $stmt->execute([$email]);
  $row = $stmt -> fetchColumn();

  if (!$row) {
    return false;
  } else{  
    return $_SESSION['medico'] = $row;
  }
}
