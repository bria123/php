<?php
     require_once "../../vendor/autoload.php";

     class Pais {

        private $nome;
        private $estado;
        private $mensagem;

        /**
         * Get the value of nome
         */
        public function getNome()
        {
                return $this->nome;
        }

        /**
         * Set the value of nome
         */
        public function setNome($nome): self
        {
                $this->nome = $nome;

                return $this;
        }

        /**
         * Get the value of estado
         */
        public function getEstado()
        {
                return $this->estado;
        }

        /**
         * Set the value of estado
         */
        public function setEstado($estado): self
        {
                $this->estado = $estado;

                return $this;
        }

        /**
         * Get the value of mensagem
         */
        public function getMensagem()
        {
                return $this->mensagem;
        }

        /**
         * Set the value of mensagem
         */
        public function setMensagem($mensagem): self
        {
                $this->mensagem = $mensagem;

                return $this;
        }

        //Chamar Conexao com Banco de dados
        public function __construct (){
            $this->con = new Conexao();
        }

        //Método para Inserir Cliente
        public function inserirCliente($dados){
         
         try{
            $this->nome = $dados['nome'];
            $this->estado = $dados['estado'];
            $this->mensagem = $dados['mensagem'];

            $cst =  $this->con->conectar()->prepare("INSERT INTO clientes (nome,estado,mensagem) VALUES (:nome,:estado, :mensagem) ");
            $cst->bindParam(":nome" , $this->nome , PDO::PARAM_STR);
            $cst->bindParam(":estado" , $this->estado , PDO::PARAM_INT);
            $cst->bindParam(":mensagem" , $this->mensagem , PDO::PARAM_STR);

            if($cst->execute() ){
                  return "ok";
            } else{
               echo "Não deu";
            }

         }catch(PDOExecption $ex){
            echo $ex;
         }

        }

        //Método para Listar Clientes
        public function selecionarCliente(){
         
                try{
       
                   $cst =  $this->con->conectar()->prepare("SELECT * FROM clientes");
                   $cst->execute();

                   return $cst->fetchAll();
       
                }catch(PDOExecption $ex){
                   echo $ex;
                }
        }

     }

?>