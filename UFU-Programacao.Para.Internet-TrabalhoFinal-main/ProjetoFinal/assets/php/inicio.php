<?php
require_once "conexao.php";
require_once "autenticacao.php";
$pdo = mysqlConnect();
exitWhenNotLogged($pdo);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../image/pharmacy2.svg">
    <title>Winterhold Hospital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/root/root.css">
    <link rel="stylesheet" href="../css/root/header.css">
    <link rel="stylesheet" href="../css/root/main.css">
    <link rel="stylesheet" href="../css/root/footer.css">
    <link rel="stylesheet" href="../css/formulario/formulario.css">
    <link rel="stylesheet" href="../css/menu-acesso/inicio.css">
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
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Cadastro
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="./novo-paciente.php">Novo Paciente</a></li>
                                <li><a class="dropdown-item" href="./novo-funcionario.php">Novo Funcionário</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Listagem
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="./listar-enderecos.php">Endereços</a></li>
                                <li><a class="dropdown-item" href="./listar-funcionarios.php">Funcionarios</a></li>
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
        <div class="container-conteudo">
            <h2 class="subtitle">Menu de Acesso</h2>

            <div class="container">
                
            <div class="row justify-content-sm-right">
                    <div class="col-sm-auto coluna">
                        <a href="./listar-todos-agendamentos.php">
                            <div class="card" style="width: 18rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="250" height="100" fill="currentColor" class="bi bi-calendar2-event-fill" viewBox="0 0 16 16">
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zM11.5 7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z" />
                            </svg>
                                <div class="card-body">
                                    <h5 class="card-title">Todos agendamentos</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-auto coluna">
                        <a href="./listar-meus-agendamentos.php">
                            <div class="card" style="width: 18rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="250" height="100" fill="currentColor" class="bi bi-calendar2-check-fill" viewBox="0 0 16 16">
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zm-2.6 5.854a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                        </svg>
                                <div class="card-body">
                                    <h5 class="card-title">Meus agendamentos</h5>
                                </div>
                            </div>
                        </a>
                    </div>
            </div>

                <div class="row justify-content-sm-right">
                    <div class="col-sm-auto coluna">
                        <a href="./novo-paciente.php">
                            <div class="card" style="width: 18rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="250" height="100" fill="currentColor" class="card-img-top bi bi-file-earmark-medical-fill" viewBox="0 0 16 16">
                                    <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm-3 2v.634l.549-.317a.5.5 0 1 1 .5.866L7 7l.549.317a.5.5 0 1 1-.5.866L6.5 7.866V8.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L5 7l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V5.5a.5.5 0 1 1 1 0zm-2 4.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zm0 2h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1z" />
                                </svg>
                                <div class="card-body">
                                    <h5 class="card-title">Cadastro novo paciente</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-auto coluna">
                        <a href="./novo-funcionario.php">
                            <div class="card" style="width: 18rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="250" height="100" fill="currentColor" class="bi bi-file-earmark-person-fill" viewBox="0 0 16 16">
                            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm2 5.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12s5 1.755 5 1.755z" />
                        </svg>
                                <div class="card-body">
                                    <h5 class="card-title">Cadastro novo funcionário</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row justify-content-sm-right">
                    <div class="col-sm-auto coluna">
                        <a href="./listar-funcionarios.php">
                            <div class="card" style="width: 18rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="250" height="100" fill="currentColor" class="bi bi-file-person-fill" viewBox="0 0 16 16">
                            <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm-1 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm-3 4c2.623 0 4.146.826 5 1.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-1.245C3.854 11.825 5.377 11 8 11z" />
                        </svg>
                                <div class="card-body">
                                    <h5 class="card-title">Funcionários cadastrados</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-auto coluna">
                        <a href="./listar-pacientes.php">
                            <div class="card" style="width: 18rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="250" height="100" fill="currentColor" class="bi bi-file-text-fill" viewBox="0 0 16 16">
                            <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z" />
                        </svg>
                                <div class="card-body">
                                    <h5 class="card-title">Pacientes cadastrados</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-auto coluna">
                        <a href="./listar-enderecos.php">
                            <div class="card" style="width: 18rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="250" height="100" fill="currentColor" class="bi bi-file-post-fill" viewBox="0 0 16 16">
                            <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM4.5 3h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zm0 2h7a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5z" />
                        </svg>
                                <div class="card-body">
                                    <h5 class="card-title">Endereços cadastrados</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
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