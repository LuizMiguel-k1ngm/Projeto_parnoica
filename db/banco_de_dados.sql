#criando tabela cliente

create database parnoica;

use parnoica;

create table cliente(
    idusuario int primary key auto_increment,
    nome varchar(250) ,
    data_nascimento date,
    cpf varchar(14) unique,
    email varchar(250),
    telefone varchar (11),
	estado char(2),
    cidade varchar(40)
);



#TABELA ACOMODAÇÃO

# create database acomodacao;

# use acomodacao;

#lembrar de atualizar o fk do frigobar
create table acomodacao(
 idAcomodacao int primary key auto_increment,
 nome varchar (250),
 aStatus varchar (1),
 tipoAcomodacao varchar (250),
 capacidade varchar (2),
 valor varchar (50),
 frigobar_id varchar (2)
);



#TABELA FRIGOBAR

#create database frigobar;

#use frigobar;

#criar um fk para o frigobar linkar com quarto
create table frigobar (
idFrigobar int primary key auto_increment,
acomodacaoId varchar(10),
fstatus varchar (1)

);

#CRIANDO O ESTACIONAMENTO 

#create database estacionamento;

#use estacionamento;

create table estacionamento (
idEstacionamento int primary key auto_increment,
status varchar (1)
);


# TABELA ITEMS

#create database items;

#use items;
 
create table items(
iditems int primary key auto_increment,
nome varchar (50),
quantidade int (2),
valor varchar (10)

);

#TABELA FUNCIONARIO

#create database funcionario;

#use funcionario;

create table funcionario(
idFuncionario int primary key auto_increment,
nome varchar (250),
status varchar(1)

);




#TABELA STATUS
#create database fStatus;

#use fstatus;

create table fStatus (
idStatus int primary key auto_increment,
statusAtual varchar (1),
descricao varchar (250)
);

#TABELA RESERVA
#create database reserva;

#use reserva;

create table reserva(
idReserva int primary key auto_increment,
foreign key (idusuario) references cliente(idusuario),
foreign key (idEstacionamento) references estacionamento(idEstacionamento),
foreign key(idAcomodacao) references acomodacao(idAcomodacao),
data_checkin date,
data_checkout date,
n_clientes int (2)
 
);
