<!-- <?php
session_start();

if (isset($_SESSION['error_message'])) {
    echo '<p class="error">' . $_SESSION['error_message'] . '</p>';
    unset($_SESSION['error_message']);
}

if(isset($_SESSION['success_message'])) {
    echo '<p class="success">' . $_SESSION['success_message'] . '</p>';
    unset($_SESSION['success_message']);
}

if(isset($_SESSION['user_email'])) {
    $_SESSION['success'] = 'Bem-vindo, ' . $_SESSION['user_email'] . '!';
    echo '<p class="success">' . $_SESSION['success'] . '</p>';
}

// Configuração do banco de dados
$servername = "localhost";
$username = "root";
$password = "@Ruth12345";
$dbname = "agape";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);
$msgErro = "";

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Processamento do formulário
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['nome'])){
    $radiovalue = $_POST['inlineRadioOptions'];
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confirmarsenha = $_POST["confirmarsenha"];

    // Verifica se os campos estão preenchidos
    if (empty($radiovalue) || empty($nome) || empty($telefone) || empty($email) || empty($senha) || empty($confirmarsenha)) {
        $_SESSION['error_message'] = "Por favor, preencha todos os campos!";
        header('Location: ../cadastro.php');
        exit();
    } else {
        // Validar comprimento mínimo da senha
        if (strlen($senha) < 8) {
            $_SESSION['error_message'] = "A senha deve ter pelo menos 8 caracteres!";
            header('Location: ../cadastro.php');
            exit();
            //  
        } else {
            // Criptografa a senha
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            // Inserção no banco de dados usando declarações preparadas
            $stmt = $conn->prepare("INSERT INTO cadastro (radiovalue, nome, telefone, email, senha) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $radiovalue, $nome, $telefone, $email, $senhaHash);

            if ($stmt->execute()) {
                $_SESSION['success_message'] = "Usuário cadastrado com sucesso!";
                header('Location: ../cadastro.php');
                exit();
            } else {
                echo "Erro ao cadastrar o usuário: " . $conn->error;
            }

            // Fecha a declaração
            $stmt->close();
        }
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>
<!-- 
    // Verifica se os campos estão preenchidos
    if (empty($nome) || empty($telefone) || empty($email) || empty($senha) || empty($confirmarsenha)) {
        echo "Por favor, preencha todos os campos!";
        exit();
    }

    // Validar comprimento mínimo da senha
    if (strlen($senha) < 8) {
        echo "A senha deve ter pelo menos 8 caracteres!";
        exit();
    }

    // Validar caracteres especiais
    // if (!preg_match("/[!@#$%^&*()_+{}:\"<>?,.|]/", $senha)) {
    //     echo "A senha deve conter pelo menos um caractere especial!";
    //     exit();
    // }

    // // Validar letras maiúsculas, minúsculas e números
    // if (!preg_match("/[a-z]/", $senha)) {
    //     echo "A senha deve conter pelo menos uma letra minúscula!";
    //     exit();
    // }
    // if (!preg_match("/[A-Z]/", $senha)) {
    //     echo "A senha deve conter pelo menos uma letra maiúscula!";
    //     exit();
    // }
    // if (!preg_match("/[0-9]/", $senha)) {
    //     echo "A senha deve conter pelo menos um número!";
    //     exit();
    // }

    // // Verifica se as senhas coincidem
    // if ($senha != $confirmarsenha) {
    //     echo "As senhas não coincidem!";
    //     exit();
    // } -->