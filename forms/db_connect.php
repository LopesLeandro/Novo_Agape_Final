<?php

// Configuração do banco de dados
$servername = "localhost";
$username = "root";
$password = "@Ruth12345";
$dbname = "agape";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);
$msgErro = "";

// Verifica a conexão
// if ($conn->connect_error) {
//     die("Conexão falhou: " . $conn->connect_error);
// }

?>
