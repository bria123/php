<?php

    class Conexao{

        private $usuario;
        private $senha;
        private $banco;
        private $servidor;
        private static $pdo;


        public function __construct (){
            $this->usuario = "root";
            $this->senha = "";
            $this->banco = "sistema";
            $this->servidor = "localhost";

        }

        public function conectar(){

            try{

                if(is_null(self:: $pdo) ){
                    self:: $pdo = new PDO("mysql:host=" . $this->servidor.";dbname=" . $this->banco, $this->usuario, $this->senha);

                    return self::$pdo;
                    

                }

            }catch(PDOExecption $ex){
                    echo $ex;
            }
        }


    }