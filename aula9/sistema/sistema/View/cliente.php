<?php

    require "../../vendor/autoload.php";
    $cliente = new Cliente();
    $objfn = new Funcoes();

    //Saber qual é a ação Editar e Deletar
    if(isset($_GET['acao'])){

        switch($_GET['acao']){

           case "edit":  $func = $cliente->selecionaId($_GET['func']);
             break;
           case "delet": 
               if( $cliente->deletarId($_GET['func']) == "ok"){
                   echo "Deletado com Sucesso";
                   header("Location:cliente.php");
               } else{
                 echo "Não Deletou";
               }
             break;
        } 
     }
    

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<title>Sistema</title>
</head>
<body>

<div class="container"> 
    <?php require "../Includes/menu.php" ?>
    <div class="row" style="margin-top:40px">
        <div class="col-md-6"> <h1>Clientes Cadastrados </h1> </div>
        <div class="col-md-6"> <a style="float:right" href="../acao/formcliente.php"> Cadastro Cliente </a> </div>
    </div>

     <form method="post" action="">
        <div class="form-group mt-5">
                <label for="exampleFormControlInput1">Filtro:</label>
                <input type="text" name="filtro" id="filtro" class="form-control col-md-4" placeholder="Nome">
            </div>
        <input type="submit" class="btn btn-primary" name="btnfiltro" value="Consultar">
    </form>

        <table class="table" style="margin-top:50px">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Estado</th>
                <th scope="col">Mensagem</th>
                <th scope="col">Editar</th>
                <th scope="col">Deletar</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if (isset($_POST["btnfiltro"])) {
                    $filtro = $_POST['filtro'];
                    $contagem = 1;
                    $resultados = $cliente->querySelecionaFiltro($filtro);
                } else {
                    $contagem = 1;
                    $resultados = $cliente->selecionarCliente();
                }

                foreach ($resultados as $ytaa) {
            ?>
                <tr>
                    <th scope="row"><?php echo $contagem++; ?></th>
                    <td><?php echo $ytaa['nome'];  ?></td>
                    <td><?php echo $ytaa['estado'];  ?></td>
                    <td><?php echo $ytaa['mensagem'];  ?></td>
                    <td><a class="btn btn-warning" href="../acao/formcliente.php?acao=edit&func=<?= $objfn->base64($ytaa["id"], 1) ?>">Editar</a></td>
                    <td><a class="btn btn-danger" href="?acao=delet&func=<?= $objfn->base64($ytaa["id"], 1) ?>">Deletar</a>
                </tr>
        <?php } ?>
            </tbody>
         </table>
    
         <?php require "../Includes/rodape.php" ?>
    </div>

<!-- JavaScript (Opcional) -->
<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>