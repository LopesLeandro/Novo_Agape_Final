<?php

Class Usuario
{
    private $pdo;
    public $msgErro = "";

    public function Conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        global $msgErro;
        // $nome = "agape";
        // $host = "localhost";
        // $usuario = "root";
        // $senha = "@Ruth12345";

        try{
            $pdo = new PDO("mysql:dbname=".$home.";host=".$host,$usuario,$senha);
        } catch(PDOException $e){
            $msgErro = $e->getMessage();
        }
    }

    public function Cadastrar($nome, $telefone, $email, $senha)
    {
        global $pdo;
        global $msgErro;
        $sql = $pdo->prepare("SELECT id_usuario FROM cadastro WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false; //já está cadastrada
        }
        else
        {
            //caso não, Cadastrar
            $sql = $pdo->prepare("INSERT INTO cadastro (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true; //tudo ok
        }
    }

    public function Logar($email, $senha)
    {
        global $pdo;
        global $msgErro;
        //verificar se o email e senha estão cadastrados no banco de dados, se sim
        $sql = $pdo->prepare("SELECT id_usuario FROM cadastro WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            //entrar no sistema (sessão)
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true; //logado com sucesso
        }
        else
        {
            return false; //não foi possível logar
        }
    }
}


?>