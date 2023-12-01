<?php
session_start();
include 'db_connect.php'; // Inclua seu script de conexão ao banco de dados aqui

if(isset($_SESSION['user_email'])) {
    $_SESSION['success'] = 'Bem-vindo, ' . $_SESSION['user_email'] . '!';
    echo '<p class="success">' . $_SESSION['success'] . '</p>';
}

if(isset($_POST['email']) && isset($_POST['senha'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Modificar a declaração para incluir a coluna 'radiovalue'
    $stmt = $conn->prepare("SELECT senha, radiovalue FROM cadastro WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if(password_verify($senha, $row['senha'])){
            // Login bem-sucedido
            $_SESSION['user_email'] = $email; // Armazenar e-mail na sessão

            // Redirecionar com base no valor de 'radiovalue'
            if ($row['radiovalue'] == 'familia') {
                header('Location: ../cadastro_familia.php');
            } elseif ($row['radiovalue'] == 'voluntario') {
                header('Location: ../cadastro_voluntario.html');
            } else {
                // Caso 'radiovalue' não seja nem 'familia' nem 'voluntario'
                $_SESSION['error_message'] = "Tipo de usuário inválido!";
                header('Location: ../login.php');
            }
            // Incluir a mensagem de sucesso
            $_SESSION['success'] = 'Login bem-sucedido!';
        } else {
            // Senha incorreta
            $_SESSION['error_message'] = "E-mail e/ou senha incorretos!";
            header('Location: ../login.php');
        }
    } else {
        // Usuário não encontrado
        $_SESSION['error_message'] = "Usuário não encontrado!";
        header('Location: ../login.php');
    }

    $stmt->close();
    $conn->close();
} else {
    header('Location: ../login.php'); // Redirecionar se não houver dados de POST
}
?>
