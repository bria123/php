<?php

    if( isset($_POST['enviar'])  ){

        $produto    = $_POST['produto'];
        $categoria  = $_POST['categoria'];
        $foto = $_FILES["foto"]["name"];
        $foto_tamanho = $_FILES["foto"]["size"];
        $foto_tipo = $_FILES["foto"]["type"];
        $md5 = md5(time());
        $caminho = "imagem/";
        $mensagem = $_POST['mensagem'];


        if(empty(trim($produto))  ){
            echo "<script> alert('Campo em Branco');window.location.href='../cadastroProduto.php';</script>";
        }else if( strpos($foto_tipo, 'png') && $foto_tamanho < 100000000 ){
            move_uploaded_file($_FILES["foto"]["tmp_name"], $caminho . $md5 .  $_FILES["foto"]["name"] );
        }else{
            echo "<script> alert('Não foi possível enviar');window.location.href='../cadastroProduto.php';</script>";
        }

        echo "<img width='100' src='imagem/"  .$md5 .  $_FILES["foto"]["name"] . " ' /> ";
        echo $produto . " " . $categoria . " " . $mensagem;

    }else{
        echo "Não foi possível cadastrar";
    }


?>