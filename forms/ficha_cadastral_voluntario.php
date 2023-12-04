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
    $email = $_POST["email"];
    $nome_completo = $_POST["nome_completo"];
    $data_nascimento = $_POST["data_nascimento"];
    $cpf = $_POST["cpf"];
    $telefone = $_POST["telefone"];
    $redes_sociais = $_POST["redes_sociais"];
    $escolaridade = $_POST["escolaridade"];
    $area_conhecimento = $_POST["area_conhecimento"];
    $profissao = $_POST["profissao"];
    $definicao_voluntariado = $_POST["definicao_voluntariado"];
    $experiencia_voluntariado = $_POST["experiencia_voluntariado"];
    $habilidades = $_POST["habilidades"];
    $conhecimento_ongs = $_POST["conhecimento_ongs"];
    $objetivo_ongs = $_POST["objetivo_ongs"];
    $motivacao_contato = $_POST["motivacao_contato"];
    
    // Verifica se os campos estão preenchidos
    if (empty($email) || empty($nome_completo)) {
        // Exibir mensagem de erro
        // Redirecionar para a página do formulário
        $_SESSION['error_message'] = "Registros não atualizados!";
        header('Location: ../cadastro_voluntario.php');
        exit();
    } else {
        // Verifica se o usuário já existe
        $stmt = $conn->prepare("SELECT id_usuario FROM cadastro_voluntario WHERE id_usuario = ?");
        $stmt->bind_param("i", $_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $userExists = $result->num_rows > 0;

        if ($userExists) {
            // Atualiza o registro existente
            $stmt = $conn->prepare("UPDATE cadastro_voluntario SET email = ?, nome_completo = ?, data_nascimento = ?, cpf = ?, telefone = ?, redes_sociais = ?, escolaridade = ?, area_conhecimento = ?, profissao = ?, definicao_voluntariado = ?, experiencia_voluntariado = ?, habilidades = ?, conhecimento_ongs = ?, objetivo_ongs = ?, motivacao_contato = ? WHERE id_usuario = ?");
            $stmt->bind_param("sssssssssssssssi", $email, $nome_completo, $data_nascimento, $cpf, $telefone, $redes_sociais, $escolaridade, $area_conhecimento, $profissao, $definicao_voluntariado, $experiencia_voluntariado, $habilidades, $conhecimento_ongs, $objetivo_ongs, $motivacao_contato, $_SESSION['user_id']);
        } else {
            // Insere um novo registro
            $stmt = $conn->prepare("INSERT INTO cadastro_voluntario (id_usuario, email, nome_completo, data_nascimento, cpf, telefone, redes_sociais, escolaridade, area_conhecimento, profissao, definicao_voluntariado, experiencia_voluntariado, habilidades, conhecimento_ongs, objetivo_ongs, motivacao_contato) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isssssssssssssss", $_SESSION['user_id'], $email, $nome_completo, $data_nascimento, $cpf, $telefone, $redes_sociais, $escolaridade, $area_conhecimento, $profissao, $definicao_voluntariado, $experiencia_voluntariado, $habilidades, $conhecimento_ongs, $objetivo_ongs, $motivacao_contato);
        }

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Registros gravados com sucesso!";
            header('Location: ../cadastro_voluntario.php');
            exit();
        } else {
            echo "Erro ao gravar os registros: " . $conn->error;
        }

        $stmt->close();
    }
    $conn->close();
}
?> 
