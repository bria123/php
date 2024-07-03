<?php 
    class Cliente extends Sistema {

        public $cpf;

        //Método para Imprimir Atributos
        public function atributosCliente(){
            $this->nome = $_POST['nome'];
            $this->cpf  = $_POST['cpf'];
            $this->mensagem = $_POST['mensagem'];

            // echo $this->getNome() . "  " . $this->getCpf() . " " . $this->getMensagem();
            echo $this->nome . "  " . $this->cpf . " " . $this->mensagem;
        }

    }

?>