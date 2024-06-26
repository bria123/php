<?php 
    if(isset($_POST['enviar'])){

        $nome = $_POST['nome'];
        $cpf  = $_POST['cpf'];

        if(empty(trim($nome))){
            echo "<script> alert('Campo em Branco');window.location.href='../cadastroCliente.php';</script>";
        }else if(empty(trim($cpf))){
            echo "<script> alert('Campo em Branco');window.location.href='../cadastroCliente.php';</script>";    
        } else{
            echo $nome . " " . $cpf;
        }

    }
?>