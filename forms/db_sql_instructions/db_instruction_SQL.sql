create database agape;

USE agape;
CALL insert_cadastro_familia();

CREATE TABLE cadastro(
	id_usuario int AUTO_INCREMENT PRIMARY key,
    radiovalue varchar(50),
    nome varchar(100),
    telefone varchar(11),
    email varchar(100),
    senha varchar(240)
);

SELECT * FROM cadastro;
TRUNCATE TABLE cadastro;

-- Deletar registro das duas tabelas
DELETE cadastro
FROM cadastro
INNER JOIN cadastro_familia ON cadastro.id_usuario = cadastro_familia.id_usuario;

DELETE cadastro
FROM cadastro
LEFT JOIN cadastro_familia ON cadastro.id_usuario = cadastro_familia.id_usuario
WHERE cadastro_familia.id_usuario IS NULL;


-- TABELA FICHA CADASTRAL FAMILIAS

CREATE TABLE cadastro_familia(
	id_usuario int,
    nome varchar(100),
    cpf varchar(11),
    nascimento varchar(10),
    naturalidade varchar(100),
    filiacao varchar(100),
    etnia varchar(100),
    renda varchar(100),
    estado_civil varchar(100),
    situacao_emprego varchar(100),
    telefone1 varchar(100),
    telefone2 varchar(100),
    email varchar(100),
    endereco varchar(100),
    bairro varchar(100),
    num_comodos varchar(100),
    internet varchar(100),
    celular varchar(100),
    moradia varchar(100),
    features varchar(100),
    beneficio varchar(100),
    tratamento varchar(100),
    qual_tratamento varchar(100),
    forn_sus_tratamento varchar(100),
    medicamento varchar(100),
    qual_medicamento varchar(100),
    forn_sus_medicamento varchar(100)
);

ALTER TABLE cadastro_familia 
ADD FOREIGN KEY (id_usuario) REFERENCES cadastro(id_usuario);

SELECT * FROM cadastro_familia;

DROP PROCEDURE insert_cadastro_familia;