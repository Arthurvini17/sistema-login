<?php

include('./conexao.php');

$conexao = new ConexaoDB('LANDING', 'localhost', 'root', '');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if(empty($email)) {
        echo "Digite seu email";
    }

    if(empty($senha)){
        echo "Digite sua senha";
    }

    $senhacriptografada = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "SELECT email, senha FROM users WHERE email = :e";
    $cmd = $conexao->getConn()->prepare($sql);
    $cmd->bindValue(":e", $email);
    $cmd->execute();

    if($cmd->rowCount() > 0 ){
        $row = $cmd->fetch(PDO::FETCH_ASSOC);
        $senhaArmazenada = $row['senha'];

        if(password_verify($senha, $senhaArmazenada)){
            header("Location: ../views/principal.php");
            echo "sucesso";
            exit();
        } else {
            echo "senha incorreta";
        }
    }
}