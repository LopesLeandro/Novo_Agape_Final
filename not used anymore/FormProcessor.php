<?php
class FormProcessor {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function processUserRegistration($data) {
        if ($this->conn === null) {
            throw new Exception("Database connection is not established.");
        }
        if(isset($_POST['submit'])){
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
                        header('Location: ../login.php');
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
    }

    public function processFamilyRegistration($data) {
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
    }

    // Outros métodos de processamento podem ser adicionados aqui
}
?>
