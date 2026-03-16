CREATE DATABASE  parnoica;
USE parnoica;

-- TABELA CLIENTE
CREATE TABLE cliente(
    idusuario INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(250) NOT NULL,
    data_nascimento DATE,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    email VARCHAR(250),
    telefone VARCHAR(15), -- Aumentado para suportar (XX) XXXXX-XXXX
    estado CHAR(2),
    cidade VARCHAR(40)
);

-- TABELA ACOMODACAO
-- Removi o frigobar_id daqui para evitar dependência circular, 
-- já que a tabela frigobar aponta para acomodação.
CREATE TABLE acomodacao(
    idAcomodacao INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(250) NOT NULL,
    aStatus VARCHAR(1),
    tipoAcomodacao VARCHAR(250),
    capacidade INT, -- Alterado para INT para cálculos
    valor DECIMAL(10,2) -- Alterado para DECIMAL para operações financeiras
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
    valor DECIMAL(10,2) -- Alterado para DECIMAL
);

-- TABELA FUNCIONARIO
CREATE TABLE funcionario(
    idFuncionario INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(250) NOT NULL,
    status VARCHAR(1)
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
    idusuario INT, -- É necessário declarar a coluna antes de referenciar
    idEstacionamento INT,
    idAcomodacao INT,
    data_checkin DATE,
    data_checkout DATE,
    n_clientes INT,
    -- Definição das Chaves Estrangeiras
    CONSTRAINT fk_reserva_cliente FOREIGN KEY (idusuario) REFERENCES cliente(idusuario),
    CONSTRAINT fk_reserva_estacionamento FOREIGN KEY (idEstacionamento) REFERENCES estacionamento(idEstacionamento),
    CONSTRAINT fk_reserva_acomodacao FOREIGN KEY (idAcomodacao) REFERENCES acomodacao(idAcomodacao)
);
