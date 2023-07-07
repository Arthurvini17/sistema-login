<?php
class Registrar {

    private $pdo;
    public function __construct($pdo){
       $this->pdo = $pdo;
    }


    public function cadastrarPessoa($nome, $email, $telefone, $senha){
        $cmd = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $cmd->bindvalue(":email", $email);
        $cmd->execute();

        if($cmd->rowCount() > 0 ){
            return false;
        } else {
            $senhacriptografada = password_hash($senha, PASSWORD_DEFAULT);
            $cmd = $this->pdo->prepare("INSERT INTO users (nome, email, telefone, senha) VALUES (:nome, :email, :telefone, :senha)");
            $cmd->bindvalue(":nome", $nome);
            $cmd->bindvalue(":email", $email);
            $cmd->bindvalue(":telefone", $telefone);
            $cmd->bindvalue(":senha", $senhacriptografada);
            $cmd->execute();
            return true;
        }

    }
}


?>