<?php
// session_start();
// include('./conexao.php');
// include('./registro.php');

// $conexao = new ConexaoDB('LANDING', 'localhost', 'root', '');

// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     $email = $_POST['email'];
//     $senha = $_POST['senha'];

//     if(empty($email)) {
//         echo "Digite seu email";
//     }

//     if(empty($senha)){
//         echo "Digite sua senha";
//     }

    
//     $senhacriptografada = password_hash($senha, PASSWORD_DEFAULT);
//     $sql = "SELECT email, senha FROM users WHERE email = :e";
//     $cmd = $conexao->getConn()->prepare($sql);
//     $cmd->bindValue(":e", $email);
//     $cmd->execute();

//     if($cmd->rowCount() > 0 ){
//         $row = $cmd->fetch(PDO::FETCH_ASSOC);
//         $senhaArmazenada = $row['senha'];

//         if(password_verify($senha, $senhaArmazenada)){
//             $_SESSION['nome'] = $nome;
//             header("Location: ../views/principal.php");
//             exit();
//         } else {
//             echo "senha incorreta";
//         }
//     }
// }



    class Login {
        private $pdo;
    
        public function __construct($pdo){
            $this->pdo = $pdo;
        }
    
        public function autenticarPessoa($email, $senha){
            $cmd = $this->pdo->prepare("SELECT email, senha FROM users WHERE email = :email LIMIT 1");
            $cmd->bindValue(":email", $email);
            $cmd->execute();
    
            if($cmd->rowCount() > 0){
                $row = $cmd->fetch(PDO::FETCH_ASSOC);
                $senhaArmazenada = $row['senha'];
    
                if(password_verify($senha, $senhaArmazenada)){
                    header("Location: ../views/principal.php");
                    exit();
                } else {
                    echo "Senha incorreta";
                }
            } else {
                echo "Usuário não encontrado";
            }
        }
    }
    