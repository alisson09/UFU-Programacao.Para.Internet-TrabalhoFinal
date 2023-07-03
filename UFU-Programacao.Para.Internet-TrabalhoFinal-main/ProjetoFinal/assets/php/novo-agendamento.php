<?php
require_once "conexao.php";
$pdo = mysqlConnect();
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
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../../index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="../html/agendamento.html">Agendamento</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Cadastro
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="../html/novo-endereco.html">Novo Endereço</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../html/galeria.html" tabindex="-1" aria-disabled="true">Galeria</a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <a href="../php/login.html" class="btn btn-outline-success">
                            Login
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container-formulario">
            <h2 class="subtitle">Agendamento de Consulta</h2>
            <form class="row g-2 formulario-item" action="agendar-consulta.php" method="POST" autocomplete="off">

                <div class="form-floating col-md-6">
                    <select id="especialidade" name='especialidade' class="form-select especialidade__select" required>
                        <?php
                        echo "<option value=''>Selecione...</option>";
                        $sql = <<< SQL
                            SELECT especialidade
                            FROM medico
                            GROUP BY especialidade;
                            SQL;
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        if ($stmt->rowCount() > 0) {
                            while ($dados = $stmt->fetch()) {
                                echo "<option class='especialidade__option' value='{$dados['especialidade']}'>{$dados['especialidade']}</option>";
                            }
                        }
                        ?>

                    </select>
                    <label for="espec" class="form-label">Especialidade</label>
                </div>

                <div class="form-floating col-md-6">
                    <select name="codigo_medico" id="codigo_medico" class="medico__select form-select" required></select>
                    <label for="espec" class="form-label">Medico</label>
                </div>

                <div class="col-md-6 form-floating">
                    <input type="date" class="form-control" id="data_agenda" placeholder=" " name="data_agenda" required>
                    <label for="data_agenda" class="form-label">Data</label>
                </div>

                <div class="form-floating col-md-6">
                    <select id="horario" name='horario' class="form-select select__horario" required></select>
                    <label for="horario" class="form-label">Horário</label>
                </div>

                <div class="col-md-5 form-floating">
                    <input type="text" class="form-control" id="nome" placeholder=" " name="nome" required>
                    <label for="nome" class="form-label">Nome</label>
                </div>

                <div class="col-md-5 form-floating">
                    <input type="email" class="form-control" id="email" placeholder=" " name="email" required>
                    <label for="email" class="form-label">E-mail</label>
                </div>

                <div class="col-md-2 form-floating">
                    <select id="sexo" name='sexo' class="form-select" required>
                        <option hidden></option>
                        <option value="F">Feminino</option>
                        <option value="M">Masculino</option>
                    </select>
                    <label for="sexo" class="form-label">Sexo</label>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">
                        Agendar consulta
                    </button>
                </div>
            </form>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script>
        function criaMedicos(medico) {
            for (var i = 0; i < medico.length; i++) {
                var medicoSelect = document.querySelector(".medico__select");
                var option = document.createElement("option");
                option.classList.add('medico__option');
                option.value = medico[i].nome;
                option.textContent = medico[i].nome;
                medicoSelect.appendChild(option);
            }
        }

        function criaOptionVazio() {
            var medicoSelect = document.querySelector(".medico__select");
            var option = document.createElement("option");
            option.classList.add('medico__option');
            option.hidden = true;
            medicoSelect.appendChild(option);
        }

        function buscaMedico(especialidade) {

            ajax = new XMLHttpRequest();
            ajax.open("POST", "agendamento-ajax.php");

            ajax.onload = function() {

                if (ajax.status != 200) {
                    console.error("Falha inesperada: " + ajax.responseText);
                    return;
                }

                try {
                    
                    document.querySelectorAll(".medico__option").forEach(function(option) {
                        option.addEventListener("onclick", option.remove());
                    });
                    criaOptionVazio();

                    var medico = JSON.parse(ajax.responseText);
                    criaMedicos(medico);

                } catch (e) {
                    console.error("String JSON inválida: " + ajax.responseText);
                    return;
                }
            }
            ajax.onerror = function() {
                console.error("Erro de rede - requisição não finalizada");
            };
            var meuForm = document.querySelector("form");
            var formData = new FormData(meuForm);
            ajax.send(formData);
        }

        function criaHorarios() {
            for (var i = 8; i < 18; i++) {
                var horarioSelect = document.querySelector(".select__horario");
                var horaOption = document.createElement("option");
                horaOption.value = i;
                horaOption.classList.add('horario__option');
                horaOption.id = i;
                horaOption.textContent = i;
                horarioSelect.appendChild(horaOption);
            }
        }

        function buscaHorario(nome_medico, data_agenda) {
            ajax = new XMLHttpRequest();
            ajax.open("POST", "agendamentoHorario-ajax.php");

            ajax.onload = function() {
                document.querySelectorAll(".horario__option").forEach(function(option) {
                    option.addEventListener("onclick", option.remove());
                });

                criaHorarios();

                if (ajax.status != 200) {
                    console.error("Falha inesperada: " + ajax.responseText);
                    return;
                }

                try {
                    var horarios = JSON.parse(ajax.responseText);

                    for (var i = 0; i < horarios.length; i++) {
                        var horaRemovida = horarios[i].hora
                        var inputHoras = document.getElementById(horaRemovida);
                        inputHoras.remove()
                    }

                } catch (e) {
                    console.error("String JSON inválida: " + ajax.responseText);
                    return;
                }
            }
            ajax.onerror = function() {
                console.error("Erro de rede - requisição não finalizada");
            };
            var meuForm = document.querySelector("form");
            var formData = new FormData(meuForm);
            ajax.send(formData);
        }

        window.onload = function() {
            const inputEspecialidade = document.querySelector("#especialidade");
            inputEspecialidade.onchange = () => buscaMedico(inputEspecialidade.value);

            const inputData = document.querySelector("#data_agenda");
            const inputMedico = document.querySelector('.medico__select');
            const inputDataMedico = document.querySelectorAll('.medico__select, #data_agenda');
            
            for (var i = 0; i < inputDataMedico.length; i++) {
                inputDataMedico[i].onchange = function() {
                    buscaHorario(inputMedico.value, inputData.value)
                }
            }
        }
    </script>
</body>
</html>