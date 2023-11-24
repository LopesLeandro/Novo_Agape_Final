<?php


// Configuração do banco de dados
$servername = "localhost";
$username = "root";
$password = "@Ruth12345";
$dbname = "pagina_login";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Class Cadastro
// {
//     public function cadastrar($nome, $telefone, $email, $senha)
//     {
//         // global $pdo;
//         //verificar se já existe o email cadastrado
//         $sql = $pdo->prepare("SELECT id_usuario FROM cadastro WHERE email = :e");
//         $sql->bindValue(":e",$email);
//         $sql->execute();
//         if($sql->rowCount() > 0)
//         {
//             return false; //já está cadastrada
//         }
//         else
//         {
//             //caso não, Cadastrar
//             $sql = $pdo->prepare("INSERT INTO cadastro (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
//             $sql->bindValue(":n",$nome);
//             $sql->bindValue(":t",$telefone);
//             $sql->bindValue(":e",$email);
//             $sql->bindValue(":s",md5($senha));
//             $sql->execute();
//             return true; //tudo ok

//         }

//     }
// }


// Processamento do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confirmarsenha = $_POST["confirmarsenha"];

    // Verifica se os campos estão preenchidos
    if (empty($nome) || empty($telefone) || empty($email) || empty($senha) || empty($confirmarsenha)) {
        echo "Preencha todos os campos!";
        exit();
    }

    // Validar comprimento mínimo da senha
    if (strlen($senha) < 8) {
        echo "A senha deve ter pelo menos 8 caracteres!";
        exit();
    }

    // Validar caracteres especiais
    if (!preg_match("/[!@#$%^&*()_+{}:\"<>?,.|]/", $senha)) {
        echo "A senha deve conter pelo menos um caractere especial!";
        exit();
    }

    // Validar letras maiúsculas, minúsculas e números
    if (!preg_match("/[a-z]/", $senha)) {
        echo "A senha deve conter pelo menos uma letra minúscula!";
        exit();
    }
    if (!preg_match("/[A-Z]/", $senha)) {
        echo "A senha deve conter pelo menos uma letra maiúscula!";
        exit();
    }
    if (!preg_match("/[0-9]/", $senha)) {
        echo "A senha deve conter pelo menos um número!";
        exit();
    }

    // Verifica se as senhas coincidem
    if ($senha != $confirmarsenha) {
        echo "As senhas não coincidem!";
        exit();
    }

    // Criptografa a senha
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // Inserção no banco de dados usando declarações preparadas
    $stmt = $conn->prepare("INSERT INTO cadastro (nome, telefone, email, senha) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nome, $telefone, $email, $senhaHash);

    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o usuário: " . $conn->error;
    }

    // Fecha a declaração e a conexão com o banco de dados
    $stmt->close();
    $conn->close();
}


?>