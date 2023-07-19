<?php

include ('../models/conexao.php');
include ('../models/registro.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/registrar.css">
    <title>Registro</title>
</head>

<?php
session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $conexao = new ConexaoDB('LANDING', 'localhost', 'root', '');

    $registrar = new Registrar($conexao->getConn());

    $nome = $_POST['nome'];
    $email  = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];

    $resultado = $registrar->cadastrarPessoa($nome, $email, $telefone, $senha);
        if ($resultado){
            $_SESSION['nome'] = $nome;
           $_SESSION['msg'] = "<p style='color:green;'> Usuario cadastrado com sucesso </p>";
         
        } else {
            $_SESSION['msg'] = "<p style='color:red;'> Usuario nao cadastrado</p>";
        }
    }
?>
<body>
    <form action="" method="post">
        <?php

        ?>
        <div class="container">
            <img src="../models/imagens/home.svg" alt="">
        <input type="text" name="nome" placeholder="Digite seu nome">
        <input type="email" name="email" placeholder="Digite seu email">
        <input type="number" name="telefone" placeholder="Digite seu telefone">
        <input type="password" name="senha" placeholder="Digite sua senha">
        <button type="submit">Enviar</button>
        <a href="login.php"> Já tenho uma conta</a>
        </div>
    </form>

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']); // Limpa a mensagem da sessão para que ela não seja exibida novamente
    }
    ?>

</body>
</html>