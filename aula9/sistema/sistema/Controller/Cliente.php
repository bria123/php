<?php
     require_once "../../vendor/autoload.php";

     class Cliente {

        private $id;
        private $nome;
        private $estado;
        private $mensagem;

         /**
         * Get the value of id
         */
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         */
        public function setId($id): self
        {
                $this->id = $id;

                return $this;
        }

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
            $this->objfn = new Funcoes();
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

                        $cst =  $this->con->conectar()->prepare("SELECT i.id, i.nome, i.mensagem, t.estado
                        FROM clientes i
                        join estado t on t.id = i.estado");

                        $cst->execute();

                        return $cst->fetchAll();

                }catch(PDOExecption $ex){
                        echo $ex;
                }
        }

        public function selecionarEstado()
        {
            try
            {
                $cst = $this->con->conectar()->prepare("SELECT id, estado FROM estado ");
                $cst->execute();

                return $cst->fetchAll();
            }

            catch(PDOException $ex)
            {
                echo $ex;
            }
        }

        //Método para Recuper o ID do Banco de Dados
        public function selecionaId($dado) {
                try{
                    $this->id = $this->objfn->base64($dado, 2);
                    $cst = $this->con->conectar()->prepare("SELECT id, nome, estado, mensagem FROM clientes WHERE id = :idCliente ");
                    $cst->bindParam(":idCliente", $this->id, PDO::PARAM_INT);
    
                        $cst->execute();
    
                        return $cst->fetch();
                }
                catch(PDOException $ex){
                    echo $ex;
                }
            }

        //Método Editar
        public function editarCliente($dados){
                try{

                        $this->id = $this->objfn->base64($dados['func'],2);
                        $this->nome = $dados['nome'];
                        $this->estado = $dados['estado'];
                        $this->mensagem = $dados['mensagem']; 

                        $cst = $this->con->conectar()->prepare("UPDATE clientes SET nome = :nome ,estado = :estado, mensagem = :mensagem WHERE id = :idCliente");
                        $cst->bindParam(":idCliente" , $this->id , PDO::PARAM_INT);
                        $cst->bindParam(":nome" , $this->nome , PDO::PARAM_STR);
                        $cst->bindParam(":estado" , $this->estado , PDO::PARAM_STR);
                        $cst->bindParam(":mensagem" , $this->mensagem , PDO::PARAM_STR);
                        
                        if($cst->execute()){
                                return "ok";
                        }else{
                                echo "Não editou";
                        }

                }catch(PDOException $ex) {
                        echo $ex;
                }        

        }
        //Método para Deletar 
        public function deletarId($dado){
                try{
                        $this->id = $this->objfn->base64($dado, 2);
            
                        $cst = $this->con->conectar()->prepare("DELETE FROM clientes WHERE id= :idCliente");
                        $cst->bindParam(":idCliente" , $this->id, PDO::PARAM_INT);
                            if($cst->execute()){
                                return "ok";
                            } else{
                                return "Não deu";
                            }
                        }catch(PDOException $ex){
                            echo $ex;
                        }
        }
       
} 

?>