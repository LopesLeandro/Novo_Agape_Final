<!-- <?php
session_start();
include 'db_connect.php';
include 'forms/functions.php';


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


// Processamento do formulário
if(isset($_POST['submit'])){
    // Atribuições dos campos do formulário
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
    $endereco = $_POST["endereco"];
    $bairro = $_POST["bairro"];
    $num_comodos = $_POST["num_comodos"];
    $internet = $_POST["internet"];
    $celular = $_POST["celular"];
    $moradia = $_POST["moradia"];
    $features = $_POST["features"];
    $beneficio = $_POST["beneficio"];
    $tratamento = $_POST["tratamento"];
    $qual_tratamento = $_POST["qual_tratamento"];
    $forn_sus_tratamento = $_POST["forn_sus_tratamento"];
    $medicamento = $_POST["medicamento"];
    $qual_medicamento = $_POST["qual_medicamento"];
    $forn_sus_medicamento = $_POST["forn_sus_medicamento"];

    // Verifica se os campos estão preenchidos
    if (empty($nome) || empty($cpf)) {
        // Exibir mensagem de erro
        // Redirecionar para a página do formulário
        $_SESSION['error_message'] = "Registros não atualizados!";
        header('Location: ../cadastro_familia.php');
        exit();
    } else {
        // Verifica se o usuário já existe
        $stmt = $conn->prepare("SELECT id_usuario FROM cadastro_familia WHERE id_usuario = ?");
        $stmt->bind_param("i", $_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $userExists = $result->num_rows > 0;

        if ($userExists) {
            // Atualiza o registro existente
            $stmt = $conn->prepare("UPDATE cadastro_familia SET nome = ?, cpf = ?, nascimento = ?, naturalidade = ?, filiacao = ?, etnia = ?, renda = ?, estado_civil = ?, situacao_emprego = ?, telefone1 = ?, telefone2 = ?, email = ?, endereco = ?, bairro = ?, num_comodos = ?, internet = ?, celular = ?, moradia = ?, features = ?, beneficio = ?, tratamento = ?, qual_tratamento = ?, forn_sus_tratamento = ?, medicamento = ?, qual_medicamento = ?, forn_sus_medicamento = ? WHERE id_usuario = ?");
            $stmt->bind_param("ssssssssssssssssssssssssssi", $nome, $cpf, $nascimento, $naturalidade, $filiacao, $etnia, $renda, $estado_civil, $situacao_emprego, $telefone1, $telefone2, $email, $endereco, $bairro, $num_comodos, $internet, $celular, $moradia, $features, $beneficio, $tratamento, $qual_tratamento, $forn_sus_tratamento, $medicamento, $qual_medicamento, $forn_sus_medicamento, $_SESSION['user_id']);
        } else {
            // Insere um novo registro
            $stmt = $conn->prepare("INSERT INTO cadastro_familia (id_usuario, nome, cpf, nascimento, naturalidade, filiacao, etnia, renda, estado_civil, situacao_emprego, telefone1, telefone2, email, endereco, bairro, num_comodos, internet, celular, moradia, features, beneficio, tratamento, qual_tratamento, forn_sus_tratamento, medicamento, qual_medicamento, forn_sus_medicamento) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("issssssssssssssssssssssssss", $_SESSION['user_id'], $nome, $cpf, $nascimento, $naturalidade, $filiacao, $etnia, $renda, $estado_civil, $situacao_emprego, $telefone1, $telefone2, $email, $endereco, $bairro, $num_comodos, $internet, $celular, $moradia, $features, $beneficio, $tratamento, $qual_tratamento, $forn_sus_tratamento, $medicamento, $qual_medicamento, $forn_sus_medicamento);
        }

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Registros gravados com sucesso!";
            header('Location: ../cadastro_familia.php');
            exit();
        } else {
            echo "Erro ao gravar os registros: " . $conn->error;
        }

        $stmt->close();
    }
    $conn->close();
}
?> 
