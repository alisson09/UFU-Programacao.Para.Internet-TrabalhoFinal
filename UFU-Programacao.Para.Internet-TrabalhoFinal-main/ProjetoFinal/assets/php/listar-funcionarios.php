<?php
require_once "conexao.php";
require_once "autenticacao.php";
$pdo = mysqlConnect();

exitWhenNotLogged($pdo);

try {

  $sql = <<<SQL
  SELECT datacontrato, salario, nome
  FROM funcionario, pessoa
  WHERE funcionario.codigo = pessoa.codigo
  SQL;

  $stmt = $pdo->query($sql);
} catch (Exception $e) {
  exit('Ocorreu uma falha: ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../image/pharmacy2.svg">
    <title>Winterhold Hospital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/root/root.css">
    <link rel="stylesheet" href="../css/root/header.css">
    <link rel="stylesheet" href="../css/root/main.css">
    <link rel="stylesheet" href="../css/root/footer.css">
    <link rel="stylesheet" href="../css/formulario/formulario.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <div class="navbar-brand" href="#">
                    <img src="../image/pharmacy.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                    Winterhold Hospital
                </div>
                <div class="navbar-light">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="./inicio.php" tabindex="-1"
                                aria-disabled="true">Menu</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Cadastro
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="./novo-funcionario.php">Novo Funcionário</a></li>
                                <li><a class="dropdown-item" href="./novo-paciente.php">Novo Paciente</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Listagem
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="./listar-enderecos.php">Endereços</a></li>
                                <li><a class="dropdown-item disabled" href="./listar-funcionarios.php">Funcionários</a></li>
                                <li><a class="dropdown-item" href="./listar-pacientes.php">Pacientes</a></li>
                                <li><a class="dropdown-item" href="./listar-todos-agendamentos.php">Todos Agendamentos</a></li>
                                <li><a class="dropdown-item" href="./listar-meus-agendamentos.php">Meus Agendamentos</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <a href="./logout.php" class="btn btn-danger">
                            Sair
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container-formulario">
        <h2 class="subtitle">Listagem dos funcionários cadastrados</h2>
        <div class="table-responsive-sm">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th class="col-4" scope="col">Nome</th>
                    <th class="col-4" scope="col">Data de Contrato</th>
                    <th class="col-4" scope="col">Salário</th>
                </tr>
            </thead>
            <tbody>    
                <?php
                    while ($row = $stmt->fetch()) {
                        
                        $nome = htmlspecialchars($row['nome']);
                        $salario = htmlspecialchars($row['salario']);

                        $data = new DateTime($row['datacontrato']);
                        $dataFormatoDiaMesAno = $data->format('d-m-Y');
                       
                        echo <<<HTML
                    <tr>
                        <td>$nome</td>
                        <td>$dataFormatoDiaMesAno</td>
                        <td>$salario</td>
                    </tr>    
                    HTML;
                    }
                ?>
            </tbody>
            </table>
        </div>
        </div>
    </main>
    <footer>
        <div class="footer-logotipo">
            <img src="../image/pharmacy2.svg" width="30" height="30" class="d-inline-block align-top" alt="">
            <h6>
                Winterhold Hospital
            </h6>
        </div>
        <div class="footer-copyright">
            <p>
                &copy; Copyright 2021 - Todos os direitos reservados.
            </p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>