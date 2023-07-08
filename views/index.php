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
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $conexao = new ConexaoDB('LANDING', 'localhost', 'root', '');

    $registrar = new Registrar($conexao->getConn());

    $nome = $_POST['nome'];
    $email  = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];

    $resultado = $registrar->cadastrarPessoa($nome, $email, $telefone, $senha);
        if ($resultado){
            echo 'Cadastro realizado com sucesso';
        } else {
            echo "Pessoa ja cadastrada";
        }
    }
?>
<body>
    <form action="" method="post">
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
</body>
</html>