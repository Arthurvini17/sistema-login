<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>
</head>

<body>
    <form action="../models/logar.php" method="post">
        <div class="container">
            <img src="../models/imagens/home.svg" alt="">
        <input type="email" placeholder="Digite seu email" name="email">
        <input type="password" placeholder="Digite sua senha" name="senha">
        <button type="submit">Enviar</button>
        <a href="index.php"> Não tenho uma conta</a>
        </div>
    </form>
</body>

</html>