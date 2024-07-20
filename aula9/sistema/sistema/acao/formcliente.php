<?php

    require "../../vendor/autoload.php";
    $cliente = new Cliente();
    $objfn = new Funcoes();

    //Cadastrar
    if(isset($_POST['btCadastrar'])){
            
        if($cliente->inserirCliente($_POST) == "ok" ){
            echo "inserido com suceso";
            header("Location: ../View/cliente.php");
        }else{
            echo "Não deu";
        }
    }

    //Editar
    if(isset($_POST['btAlterar'])){
        
        if($cliente->editarCliente($_POST) == "ok" ){
            echo "Editado com Sucesso";
            header("Location: ../View/cliente.php");
        }else{
            echo "Não deu";
        }
    }

    //Saber qual é a ação Editar e Deletar
    if(isset($_GET['acao'])){

        switch($_GET['acao']){
            case "edit" : 
                    $func = $cliente->selecionaId($_GET['func']);
                break;
            case "delet" : 
                if($cliente->deletarId($_GET['func']) == "ok"){
                    echo "Deletado com Sucesso";
                    header("Location:../cliente.php");
                }else{
                    echo "Não Deletou";
                }
                
                break;
        }

    }


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<!-- Meta tags Obrigatórias -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<title>Sistema</title>
</head>
<body>

<div class="container"> 
    <?php require "../Includes/menu.php" ?>
    <div class="row">
        <div class="col-md-4" style="margin-top:40px"> <h1>Cadastro Cliente</h1> </div>
        <div class="col-md-8">   </div>
    </div>
    
    <form method="post" action="">
        <div class="form-group">
            <label for="exampleInputEmail1">Nome do Cliente</label>
            <input type="text" name="nome" class="form-control" id="nome" value="<?=(isset($func["nome"]) ?  ($func["nome"]) : ("") )   ?>">
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Estado</label>
            <select class="form-control"  name="estado" id="estado">
                        <?php
                        foreach ($cliente->selecionarEstado() as $rst){
                            if ($rst["id"] == $func["estado"] ):
                                ?>
                                <option value='<?php echo $rst["id"]; ?>' selected> <?php echo $rst["estado"]; ?></option>;
                            <?php else:
                                ?>
                                <option value='<?php echo $rst["id"]; ?>'><?php echo $rst["estado"]; ?></option>;
                            <?php endif; }?>
      </select>
        </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Mensagem</label>
                <textarea class="form-control" name="mensagem"  rows="3">   <?php echo (isset($func["mensagem"]) ? ($func["mensagem"]) : ("")  ); ?> </textarea>
            </div>

            <input type="submit" class="btn btn-primary"
                name=" <?= (isset($_GET["acao"]) == "edit" ?
                    ("btAlterar") : ("btCadastrar" ) )
                    ?>" value="<?= (isset($_GET["acao"]) == "edit" ? ("Alterar")
                    : ("Cadastrar") )
            ?>">
            <input type="hidden" name="func" value="<?=
                    (isset($func["id"]) ? $objfn->base64($func["id"],
                    1) : " " )
            ?>">
        </form>

        
         <?php require "../Includes/rodape.php" ?>
    </div>

<!-- JavaScript (Opcional) -->
<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>