<?php
    require_once __DIR__  . "../../vendor/autoload.php";

    class Usuario {
        
        private $nome;
        private $email;
        private $senha;
        private $tipo;
        private $mensagem;

        public function getNome()
        {
                return $this->nome;
        }

        public function setNome($nome): self
        {
                $this->nome = $nome;

                return $this;
        }

        public function getEmail()
        {
                return $this->email;
        }

        public function setEmail($email): self
        {
                $this->email = $email;

                return $this;
        }

        public function getSenha()
        {
                return $this->senha;
        }

        public function setSenha($senha): self
        {
                $this->senha = $senha;

                return $this;
        }

        public function getTipo()
        {
                return $this->tipo;
        }

        public function setTipo($tipo): self
        {
                $this->tipo = $tipo;

                return $this;
        }

        public function getMensagem()
        {
                return $this->mensagem;
        }

        public function setMensagem($mensagem): self
        {
                $this->mensagem = $mensagem;

                return $this;
        }
        

        //Instanciar a Classe de Conexao com o Banco de dados
        public function __construct(){
            $this->con = new Conexao();
        }


        //Gravar no Banco de dados
        public function inserirUsuario($dados) {
            try{
                
                $this->nome = $dados['nome'];
                $this->email = $dados['email'];
                $this->senha = password_hash($dados['senha'], PASSWORD_DEFAULT);
                $this->tipo = $dados['tipo'];
                $this->mensagem = $dados['mensagem'];

                if(empty(trim($this->nome))  ){
                    echo "<html> <div class='alert alert-danger alert-dismissible fade show' role='alert'> Campo nome em branco <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div></html>";  
                } else if(empty(trim($this->email))) {
                    echo "<html> <div class='alert alert-danger alert-dismissible fade show' role='alert'> Campo Email em branco <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div></html>";  
                } else if(empty(trim($this->senha))) {
                    echo "<html> <div class='alert alert-danger alert-dismissible fade show' role='alert'> Campo Senha em branco <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div></html>";  
                } else if(empty(trim($this->tipo))) {
                    echo "<html> <div class='alert alert-danger alert-dismissible fade show' role='alert'> Campo Tipo em branco <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div></html>";  
                }else if(empty(trim($this->mensagem))) {
                    echo "<html> <div class='alert alert-danger alert-dismissible fade show' role='alert'> Campo Mensagem em branco <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div></html>";  
                } else{

                    $cst = $this->con->conectar()->prepare("INSERT INTO usuario (nome,email,senha,tipo,mensagem) VALUES(:nome, :email,:senha,:tipo,:mensagem)");
                    $cst->bindParam(":nome" , $this->nome, PDO::PARAM_STR);
                    $cst->bindParam(":email" , $this->email, PDO::PARAM_STR);
                    $cst->bindParam(":senha" , $this->senha, PDO::PARAM_STR);
                    $cst->bindParam(":tipo" , $this->tipo, PDO::PARAM_STR);
                    $cst->bindParam(":mensagem" , $this->mensagem, PDO::PARAM_STR);

                    if($cst->execute()){
                        return 'ok';
                    } else{
                        echo 'Não';
                    }
                } 
            }
            catch(PDOException $ex){
                echo $ex;
            }
        }

        //Editar no Banco de dados
        public function  editarCliente() {

        }

         //Deletar  no Banco de dados
        public function  deletarCliente() {

        }

        //Selecionar  no Banco de dados
        public function  selecionarUsuario() {
            try{
                $cst = $this->con->conectar()->prepare("SELECT * FROM usuario");
                $cst->execute();

                return $cst->fetchAll();

            }catch(PDOException $ex){
                    echo $ex;
            }
        }
    }