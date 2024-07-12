<?php

    require "../../vendor/autoload.php";

    class Estado
    {
        private $estado;

         /**
         * Get the value of estado
         */
        public function getEstado()
        {
                return $this->estado;
        }

        public function setEstado($estado): self
        {
                $this->estado = $estado;

                return $this;
        }
       

        //Chamar conexão com banco de dados
        public function __construct()
        {
            $this->con = new Conexao();
        }


        //Método para inserir cliente
        public function inserirEstado($dados)
        {
            try
            {
                $this->estado = $dados['estado'];

                $cst = $this->con->conectar()->prepare("INSERT INTO estado (estado) VALUES (:estado)");
                $cst->bindParam(":estado", $this->estado, PDO::PARAM_STR);

                if($cst->execute())
                {
                    return "ok";
                }
                else
                {
                    echo "Não deu";
                }
            }
            catch(PDOException $ex)
            {
                echo $ex;
            }
        }

        //Método para listar clientes
        public function selecionarEstado()
        {
            try
            {
                $cst = $this->con->conectar()->prepare("SELECT * FROM estado");
                $cst->execute();

                return $cst->fetchAll();
            }

            catch(PDOException $ex)
            {
                echo $ex;
            }
        }

    }
       

?>