create database agape;

USE agape;

CREATE TABLE cadastro(
	id_usuario int AUTO_INCREMENT PRIMARY key,
    radiovalue varchar(50),
    nome varchar(100),
    telefone varchar(11),
    email varchar(100),
    senha varchar(240)
);

SELECT * FROM cadastro;

-- TRUNCATE TABLE cadastro;
