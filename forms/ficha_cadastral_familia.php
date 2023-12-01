<!-- <?php
session_start();

// include 'db_connect.php';


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
    //Identificação
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $nascimento = $_POST["nascimento"];
    $naturalidade = $_POST["naturalidade"];
    $filiacao = $_POST["filiacao"];
    $etnia = $_POST["etnia"];
    $renda = $_POST["renda"];
    $estado_civil = $_POST["estado_civil"];
    $situacao_emprego = $_POST["situacao_emprego"];
    $telefone1 = $_POST["telefone1"];
    $telefone2 = $_POST["telefone2"];
    $email = $_POST["email"];
    //Moradia
    $endereco = $_POST["endereco"];
    $bairro = $_POST["bairro"];
    $num_comodos = $_POST["num_comodos"];
    $internet = $_POST["internet"];
    $celular = $_POST["celular"];
    $moradia = $_POST["moradia"];
    $features = $_POST["features"];
    //Saúde e benefícios sociais
    $beneficio = $_POST["beneficio"];
    $tratamento = $_POST["tratamento"];
    $qual_tratamento = $_POST["qual_tratamento"];
    $forn_sus_tratamento = $_POST["forn_sus_tratamento"];
    $medicamento = $_POST["medicamento"];
    $qual_medicamento = $_POST["qual_medicamento"];
    $forn_sus_medicamento = $_POST["forn_sus_medicamento"];

    // Verifica se os campos estão preenchidos
    // if (empty($nome) || empty($cpf) || empty($nascimento) || empty($naturalidade) || empty($filiacao) || empty($etnia) || empty($renda) || empty($estado_civil) || empty($situacao_emprego) || empty($telefone1) || empty($telefone2) || empty($email) || empty($endereco) || empty($bairro) || empty($num_comodos) || empty($internet) || empty($celular) || empty($moradia) || empty($features) || empty($beneficio) || empty($tratamento) || empty($qual_tratamento) || empty($forn_sus_tratamento) || empty($medicamento) || empty($qual_medicamento) || empty($forn_sus_medicamento)) {
    //     $_SESSION['error_message'] = "Por favor, preencha todos os campos!";
    //     header('Location: ../cadastro_familia.php');
    //     exit();
    // } else {
        // Inserção no banco de dados usando declarações preparadas
        $stmt = $conn->prepare("INSERT INTO cadastro_familia (nome, cpf, nascimento, naturalidade, filiacao, etnia, renda, estado_civil, situacao_emprego, telefone1, telefone2, email, endereco, bairro, num_comodos, internet, celular, moradia, features, beneficio, tratamento, qual_tratamento, forn_sus_tratamento, medicamento, qual_medicamento, forn_sus_medicamento) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssssssssssssssssss", $nome, $cpf, $nascimento, $naturalidade, $filiacao, $etnia, $renda, $estado_civil, $situacao_emprego, $telefone1, $telefone2, $email, $endereco, $bairro, $num_comodos, $internet, $celular, $moradia, $features, $beneficio, $tratamento, $qual_tratamento, $forn_sus_tratamento, $medicamento, $qual_medicamento, $forn_sus_medicamento);
        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Registros gravados com sucesso!";
            header('Location: ../cadastro_familia.php');
            exit();
        } else {
            echo "Erro ao gravar os registros: " . $conn->error;
        // }

        $stmt->close();
        
    }
    $conn->close();
}