CREATE DATABASE  parnoica;
USE parnoica;

-- TABELA CLIENTE
CREATE TABLE cliente(
    idusuario INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(250) NOT NULL,
    data_nascimento DATE,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    email VARCHAR(250),
    telefone VARCHAR(15), 
    estado CHAR(2),
    cidade VARCHAR(40),
    cStatus varchar(1)
);


CREATE TABLE acomodacao(
    idAcomodacao INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(250) NOT NULL,
    aStatus VARCHAR(1),
    tipoAcomodacao VARCHAR(250),
    capacidade INT, 
    valor DECIMAL(10,2) 
);

-- TABELA FRIGOBAR
CREATE TABLE frigobar (
    idFrigobar INT PRIMARY KEY AUTO_INCREMENT,
    idAcomodacao INT,
    fstatus VARCHAR(1),
    FOREIGN KEY (idAcomodacao) REFERENCES acomodacao(idAcomodacao)
);

-- TABELA ESTACIONAMENTO 
CREATE TABLE estacionamento (
    idEstacionamento INT PRIMARY KEY AUTO_INCREMENT,
    status VARCHAR(1)
);

-- TABELA ITEMS
CREATE TABLE items(
    iditems INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50),
    quantidade INT,
    valor DECIMAL(10,2) 
);

-- TABELA FUNCIONARIO
CREATE TABLE funcionario(
    idFuncionario INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(250) NOT NULL,
    status VARCHAR(1),
    cargo int,
    CONSTRAINT fk_cargo_funcionario FOREIGN KEY (idCargo) REFERENCES cargo(idCargo),
);

-- TABELA STATUS
CREATE TABLE fStatus (
    idStatus INT PRIMARY KEY AUTO_INCREMENT,
    statusAtual VARCHAR(1),
    descricao VARCHAR(250)
);

-- TABELA RESERVA
CREATE TABLE reserva(
    idReserva INT PRIMARY KEY AUTO_INCREMENT,
    idusuario INT, 
    idEstacionamento INT,
    idAcomodacao INT,
    data_checkin DATE,
    data_checkout DATE,
    n_clientes INT,
    
    CONSTRAINT fk_reserva_cliente FOREIGN KEY (idusuario) REFERENCES cliente(idusuario),
    CONSTRAINT fk_reserva_estacionamento FOREIGN KEY (idEstacionamento) REFERENCES estacionamento(idEstacionamento),
    CONSTRAINT fk_reserva_acomodacao FOREIGN KEY (idAcomodacao) REFERENCES acomodacao(idAcomodacao)
);

CREATE TABLE consumo_frigobar (
    idConsumo INT PRIMARY KEY AUTO_INCREMENT,
    idReserva INT NOT NULL,
    idFrigobar INT NOT NULL,
    idItems INT NOT NULL,
    quantidade INT NOT NULL,
    data_consumo DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_consumo_reserva FOREIGN KEY (idReserva) REFERENCES reserva(idReserva),
    CONSTRAINT fk_consumo_frigobar FOREIGN KEY (idFrigobar) REFERENCES frigobar(idFrigobar),
    CONSTRAINT fk_consumo_items FOREIGN KEY (idItems) REFERENCES items(iditems)
);

CREATE TABLE  cargo (
idCargo INT PRIMARY KEY AUTO_INCREMENT,
cargo_nome varchar (250)

);


