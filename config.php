<?php

    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'Agape';

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    // if($conexao->connect_errno){
    //     echo "Falha na conexão";
    // }else
    // {
    //     echo "Conexão realizada com sucesso";
    // }
?>