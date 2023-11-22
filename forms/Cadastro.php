<?php

Class Cadastro

{
    private $pdo;
    public $msgErro = "";

    public function conectar($db_name, $hostname, $usuario, $senha)
    {
        global $pdo;
        global $msgErro;
        try
        {
            $pdo = new PDO("mysql:dbname=".$db_name.";host=".$hostname,$usuario,$senha);
        }
        catch(PDOException $e)
        {
            $msgErro = $e->getMessage();
        }
        catch(Exception $e)
        {
            echo "Erro genérico: ".$e->getMessage();
            exit();
        }

    }

    public function cadastrar($nome, $telefone, $email, $senha)
    {
        global $pdo;
        //verificar se já existe o email cadastrado
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

    public function logar($email, $senha)
    {
        global $pdo;
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