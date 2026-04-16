CREATE DATABASE parnaoica;
USE parnaoica;

-- tabela de cargo
CREATE TABLE cargo (
    idCargo INT PRIMARY KEY AUTO_INCREMENT,
    cargo_nome VARCHAR(250) NOT NULL
);
 
-- tabela de status do usuário
CREATE TABLE uStatus (
    iduStatus INT PRIMARY KEY AUTO_INCREMENT,
    statusAtual VARCHAR(1),
    descricao VARCHAR(250)
);

-- tabela de status da reserva
CREATE TABLE rStatus (
    idStatus INT PRIMARY KEY AUTO_INCREMENT,
    statusAtual VARCHAR(1),
    descricao VARCHAR(250)
);

-- tabela de estacionamento

CREATE TABLE estacionamento (
    idEstacionamento INT PRIMARY KEY AUTO_INCREMENT,
    status VARCHAR(1),
    idAcomodacao INT,
     CONSTRAINT fk_reserva_acomodacao FOREIGN KEY (idAcomodacao) REFERENCES acomodacao(idAcomodacao)
);

-- tabela de itens

CREATE TABLE itens (
    iditens INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50),
    quantidade INT,
    valor DECIMAL(10,2),
    iStatus VARCHAR(1) DEFAULT 'A' 
);



-- tabela cliente
CREATE TABLE cliente (
    idusuario INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(250) NOT NULL,
    data_nascimento DATE,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    email VARCHAR(250),
    telefone VARCHAR(15), 
    estado CHAR(2),
    cidade VARCHAR(40),
    cStatus VARCHAR(1) DEFAULT 'A' 
);

CREATE TABLE acomodacao (
    idAcomodacao INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(250) NOT NULL,
    numero_quarto INT, 
    aStatus VARCHAR(1) DEFAULT 'A',
    tipoAcomodacao VARCHAR(250),
    capacidade INT, 
    valor DECIMAL(10,2) 
);

CREATE TABLE funcionario (
    idFuncionario INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(250) NOT NULL,
    cpf VARCHAR (14) NOT NULL,
    telefone VARCHAR(15),
    email VARCHAR(255),
    status VARCHAR(1) DEFAULT 'A',
    idCargo INT,
    CONSTRAINT fk_funcionario_cargo FOREIGN KEY (idCargo) REFERENCES cargo(idCargo)
);

-- 3. TABELAS DEPENDENTES (FILHAS)
CREATE TABLE login (
    id INT PRIMARY KEY AUTO_INCREMENT,
    login VARCHAR(50) UNIQUE,
    senha VARCHAR(255),
    idFuncionario INT NOT NULL,
    CONSTRAINT fk_id_funcionario FOREIGN KEY (idFuncionario) REFERENCES funcionario(idFuncionario)
);

CREATE TABLE frigobar (
    idFrigobar INT PRIMARY KEY AUTO_INCREMENT,
    idAcomodacao INT,
    fstatus VARCHAR(1),
    FOREIGN KEY (idAcomodacao) REFERENCES acomodacao(idAcomodacao)
);

CREATE TABLE reserva (
    idReserva INT PRIMARY KEY AUTO_INCREMENT,
    idusuario INT, 
    idEstacionamento INT,
    idAcomodacao INT,
    data_checkin DATE,
    data_checkout DATE,
    n_clientes INT,
    valor_total_pago DECIMAL(10,2), 
    CONSTRAINT fk_reserva_cliente FOREIGN KEY (idusuario) REFERENCES cliente(idusuario),
    CONSTRAINT fk_reserva_estacionamento FOREIGN KEY (idEstacionamento) REFERENCES estacionamento(idEstacionamento),
    CONSTRAINT fk_reserva_acomodacao FOREIGN KEY (idAcomodacao) REFERENCES acomodacao(idAcomodacao)
);

CREATE TABLE consumo_frigobar (
    idConsumo INT PRIMARY KEY AUTO_INCREMENT,
    idReserva INT NOT NULL,
    idFrigobar INT NOT NULL,
    idItens INT NOT NULL,
    quantidade INT NOT NULL,
    valor_unitario_pago DECIMAL(10,2),
    data_consumo DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_consumo_reserva FOREIGN KEY (idReserva) REFERENCES reserva(idReserva),
    CONSTRAINT fk_consumo_frigobar FOREIGN KEY (idFrigobar) REFERENCES frigobar(idFrigobar),
    CONSTRAINT fk_consumo_itens FOREIGN KEY (idItens) REFERENCES itens(iditens)
);

-- TABELA DE LOG 
CREATE TABLE logs (
    idLog INT PRIMARY KEY AUTO_INCREMENT,
    idFuncionario INT,
    acao VARCHAR(255),
    tabela_afetada VARCHAR(50),
    data_hora DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_log_func FOREIGN KEY (idFuncionario) REFERENCES funcionario(idFuncionario)
);


CREATE TABLE kit_frigobar (
idKitFrigobar INT PRIMARY KEY AUTO_INCREMENT,
idFrigobar INT,
idItens INT , 
quantidade int not null,
dataHora DATETIME DEFAULT CURRENT_TIMESTAMP,
CONSTRAINT fk_id_frigobar FOREIGN KEY (idFrigobar) REFERENCES frigobar(idFrigobar),
CONSTRAINT fk_id_itens FOREIGN KEY (idItens) REFERENCES itens(iditens)

);


//criei tambem uma tabela para Status do frigobar;

//colocar o status na reserva 