<?php
class ConexaoDB {
    private $conn;

    public function __construct($dbname, $host, $user, $pass ){
        try{
            $this->conn = new PDO("mysql:dbname=".$dbname."; host=".$host,$user,$pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "erro com a conexao com banco de dados " . $e->getMessage();
        }
    }


    public function getConn(){
        return $this->conn;
    }
}


$conexao = new ConexaoDB('LANDING','localhost','root','');
?>