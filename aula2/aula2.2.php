<?php

    if(  isset($_POST["enviar"])  ){

        $nome   = $_POST['nome'];
        $estado = $_POST['estado'];
        $idade = $_POST['idade'];
        $area2  = $_POST['area2'];

        echo $nome . " " .  $estado . " " . $area2 " " . $idade;

    }else{
        echo "Não foi possivel enviar o formulário";
    }


?>