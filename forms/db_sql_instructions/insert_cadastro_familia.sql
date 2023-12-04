DELIMITER //

CREATE PROCEDURE insert_cadastro_familia()
BEGIN
    INSERT INTO cadastro_familia (
        nome, 
        cpf, 
        nascimento, 
        naturalidade, 
        filiacao, 
        etnia, 
        renda, 
        estado_civil, 
        situacao_emprego, 
        telefone1, 
        telefone2, 
        email, 
        endereco, 
        bairro, 
        num_comodos, 
        internet, 
        celular, 
        moradia, 
        features, 
        beneficio, 
        tratamento, 
        qual_tratamento, 
        forn_sus_tratamento, 
        medicamento, 
        qual_medicamento, 
        forn_sus_medicamento
    )
    VALUES (
        'Garotinho', 
        '12345678901', 
        '01-01-2015', 
        'São Paulo', 
        'José Silva e Maria Silva', 
        'Caucasiano', 
        'R$ 23000,00', 
        'Casado', 
        'Empregado', 
        '11987654321', 
        '11987654322', 
        'joao.silva@email.com', 
        'Rua das Flores, 123', 
        'Centro', 
        '4', 
        'Sim', 
        'Sim', 
        'Própria', 
        'Nenhuma', 
        'Bolsa Família', 
        'Não', 
        NULL, 
        NULL, 
        'Não', 
        NULL, 
        NULL
    );
END //

DELIMITER ;
