
<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os valores do formulário
    $username = $_POST["username"];
    $password = $_POST["password"];

    // // Verifica se o formulário foi enviado
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     // Obtém os valores do formulário
    //     $username = $_POST["username"];
    //     $password = $_POST["password"];

        // Conexão com o banco de dados
        $servername = "localhost";
        $username_db = "seu_usuario";
        $password_db = "sua_senha";
        $dbname = "seu_banco_de_dados";

        $conn = new mysqli($servername, $username_db, $password_db, $dbname);

        // Verifica se houve erro na conexão
        if ($conn->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conn->connect_error);
        }

        // Consulta SQL para verificar as credenciais
        $sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        // Verifica se a consulta retornou algum resultado
        if ($result->num_rows > 0) {
            // Redireciona para a página de sucesso
            header("Location: sucesso.php");
            exit;
        } else {
            // Exibe uma mensagem de erro
            $erro = "Usuário ou senha inválidos";
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tela de Login</title>
</head>
<body>
    <h1>Tela de Login</h1>

    <?php if (isset($erro)) { ?>
        <p><?php echo $erro; ?></p>
    <?php } ?>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="username">Usuário:</label>
        <input type="text" name="username" id="username" required><br>

        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" value="Entrar">
    </form>
</body>
</html>
