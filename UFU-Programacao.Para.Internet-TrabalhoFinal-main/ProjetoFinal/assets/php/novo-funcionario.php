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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/root/root.css">
    <link rel="stylesheet" href="../css/root/header.css">
    <link rel="stylesheet" href="../css/root/main.css">
    <link rel="stylesheet" href="../css/root/footer.css">
    <link rel="stylesheet" href="../css/formulario/formulario.css">
    <style>
        .medico {
            display: none;
        }
    </style>
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
                                <li><a class="dropdown-item" href="./novo-paciente.php">Novo Paciente</a></li>
                                <li><a class="dropdown-item disabled" href="./novo-funcionario.php">Novo Funcionário</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
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
        <div class="container-formulario">
        <h2 class="subtitle">Cadastro de novo funcionário</h2>
        <form class="row g-2 formulario-item" action="cadastra-funcionario.php" method="POST" autocomplete="off">
            <div class="form-floating col-md-5">
                <input type="text" class="form-control" id="nome" name="nome" placeholder=" " required>
                <label for="nome" class="form-label">Nome</label>
            </div>
            <div class="form-floating col-md-2">
                <select id="sexo" name="sexo" class="form-select" required>
                    <option hidden></option>
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                </select>
                <label for="sexo" class="form-label">Sexo</label>
            </div>
            <div class="form-floating col-md-5">
                <input type="email" class="form-control" id="email" placeholder=" " name="email" required>
                <label for="email" class="form-label">Email</label>
            </div>
            <div class="form-floating col-md-3">
                <input type="telefone" class="form-control" id="telefone" placeholder=" " name="telefone" required>
                <label for="tel" class="form-label">Telefone</label>
            </div>
            <div class="col-md-3 form-floating">
                <input type="text" class="form-control" id="cep" placeholder=" " name="cep" required>
                <label for="cep" class="form-label">CEP</label>
            </div>
            <div class="col-md-6 form-floating">
                <input type="text" class="form-control" id="logradouro" placeholder=" " name="logradouro" required>
                <label for="logradouro" class="form-label">Endereço</label>
            </div>
            <div class="col-md-6 form-floating">
                <input type="text" class="form-control" id="cidade" placeholder=" " name="cidade" required>
                <label for="cidade" class="form-label">Cidade</label>
            </div>
            <div class="col-md-6 form-floating">
                <input type="text" class="form-control" id="estado" placeholder=" " name="estado" required>
                <label for="estado" class="form-label">Estado</label>
            </div>
            <div class="form-floating col-md-3">
                <input type="date" class="form-control" id="datacontrato" placeholder=" " name="datacontrato" required>
                <label for="datacontrato" class="form-label">Data início de contrato</label>
            </div>
            <div class="form-floating col-md-3">
                <input type="salario" class="form-control" id="salario" placeholder=" " name="salario" required>
                <label for="text" class="form-label">Salário</label>
            </div>
            <div class="form-floating col-md-6">
                <input type="password" class="form-control" id="senha" placeholder=" " name="senha" required>
                <label for="senha" class="form-label">Senha</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" name="checkbox" id="checkMedico">
                <label class="form-check-label" for="checkMedico">
                    Médico
                </label>
            </div>
            <div class="form-floating col-md-6 optionMedico">
                <input type="especialidade" class="form-control" id="especialidade testeMedico" placeholder=" " name="especialidade">
                <label for="text" class="form-label">Especialidade</label>
            </div>
            <div class="form-floating col-md-6 optionMedico">
                <input type="crm" class="form-control " id="crm testeMedico" placeholder=" " name="crm">
                <label for="text" class="form-label">CRM</label>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Cadastrar funcionário</button>
            </div>
        </form>
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
    <script>
        function buscaEndereco(cep) {
            if (cep.length != 9) return;
            ajax = new XMLHttpRequest();
            ajax.open("POST", "busca-cep.php");
            ajax.onload = function() {
                if (ajax.status != 200) {
                    console.error("Falha inesperada: " + ajax.responseText);
                    return;
                }
                try {
                    var endereco = JSON.parse(ajax.responseText);
                } catch (e) {
                    console.error("String JSON inválida: " + ajax.responseText);
                    return;
                }
                let form = document.querySelector("form");
                form.logradouro.value = endereco.logradouro;
                form.cidade.value = endereco.cidade;
                form.estado.value = endereco.estado;
            }
            ajax.onerror = function() {
                console.error("Erro de rede - requisição não finalizada");
            };
            var meuForm = document.querySelector("form");
            var formData = new FormData(meuForm);
            ajax.send(formData);
        }
        window.onload = function() {
            const inputCep = document.querySelector("#cep");
            inputCep.onchange = () => buscaEndereco(inputCep.value);
        }

        const checkbox = document.querySelector("#checkMedico");
        var inputsMedico = document.querySelectorAll(".optionMedico")
        var inputs = document.querySelectorAll("#testeMedico")
        
        inputs.forEach(function(input) {
            input.value = ''
        })
        
        inputsMedico.forEach(function(inputMedico) {
            inputMedico.classList.add("medico")
        })

        checkbox.addEventListener('change', (event) => {

            if (event.currentTarget.checked) {

                inputs.forEach(function(input) {
                    input.value = ''
                })
                
                inputsMedico.forEach(function(inputMedico) {
                    inputMedico.classList.remove("medico")
                })

            } else {
                
                inputs.forEach(function(input) {
                    input.value = ''
                })
                
                inputsMedico.forEach(function(inputMedico) {
                    inputMedico.classList.add("medico")
                })
            }
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>