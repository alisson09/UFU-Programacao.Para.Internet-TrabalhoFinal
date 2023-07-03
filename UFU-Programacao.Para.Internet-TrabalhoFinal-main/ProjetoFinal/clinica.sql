CREATE TABLE pessoa (
    codigo int PRIMARY KEY auto_increment,
    nome varchar(50),
    sexo char(10),
    email varchar(50) UNIQUE,
    telefone varchar(20),
    cep char(9),
    logradouro varchar(100),
    cidade varchar(50),
    estado char(2)
) ENGINE = InnoDB;

CREATE TABLE funcionario (
    datacontrato DATE,
    salario varchar(50),
    senhahash varchar(255),
    codigo int PRIMARY KEY REFERENCES pessoa(codigo) ON DELETE CASCADE
) ENGINE = InnoDB;

CREATE TABLE medico (
    especialidade varchar(50),
    crm varchar(15) UNIQUE,
    codigo int PRIMARY KEY REFERENCES funcionario(codigo) ON DELETE CASCADE 
) ENGINE = InnoDB;

CREATE TABLE agenda (
    codigo int PRIMARY KEY auto_increment,
    data_agenda DATE,
    horario int(2),
    nome varchar(50),
    sexo char(10),
    email varchar(50) UNIQUE,
    codigo_medico int REFERENCES medico(codigo) ON DELETE CASCADE
) ENGINE = InnoDB;

CREATE TABLE paciente (
    peso varchar(10),
    altura int,
    tiposanguineo varchar(3),
    codigo int PRIMARY KEY REFERENCES pessoa(codigo) ON DELETE CASCADE 
) ENGINE = InnoDB;

CREATE TABLE ajax (
    cep char(9),
    logradouro varchar(100),
    cidade varchar(50),
    estado char(2)
) ENGINE = InnoDB;