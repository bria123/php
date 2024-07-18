<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Olá, mundo!</title>
  </head>
  <body>
    <div class="container">
        <?php include "../includes/menu.php"; ?>

          <?php 
            require_once "../vendor/autoload.php";

            $cliente = new Cliente();
            $pais    = new Pais();
            $conexao = new Conexao();

            if( isset($_POST['enviar'])){

              if($cliente->inserirCliente($_POST) == "ok" ){
                  echo "<script>alert('OK');window.location.href='http://localhost:8080/php/aula6_5/sistema/View/cliente.php';</script>";
                unset($_POST);           
              }else{
                echo "<script>alert('Erro');window.location.href='http://localhost:8080/php/aula6_5/sistema/View/cliente.php';</script>";
                unset($_POST);
              }
          }
          ?>

            <h1>Cadastro Cliente</h1>
            <form method="post" action="">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome do Cliente</label>
                    <input type="text" name="cliente" class="form-control" placeholder="Nome do Cliente">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Endereço do Cliente</label>
                    <input type="text" name="endereco" class="form-control" placeholder="Endereço do Cliente">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Selecione o País</label>
                  <select name="pais" class="form-control" id="exampleFormControlSelect1">
                      <?php  $pais->selecionarPais();
                          foreach($pais->selecionarPais() as $resultado){
                            ?>
                              <option value="<?php echo $resultado['id']; ?>"> <?php echo $resultado['pais']; ?> </option>
                         <?php } ?>
                  </select>
                </div>
                <input type="submit" name="enviar" value="Cadastro Cliente" class="btn btn-primary">
            </form>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Cliente</th>
                  <th scope="col">Endereço</th>
                  <th scope="col">País</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Cidade</th>
                  <th scope="col">Editar</th>
                  <th scope="col">Deletar</th>
                </tr>
              </thead>
              <tbody>
              <?php 

                  $cliente->selecionarCliente();
                  $contagem = 1;
                
                  foreach($cliente->selecionarCliente() as $resultado){
                  ?>
                        <tr>
                          <th scope="row"> <?php echo $contagem++ ?>   </th>
                          <td> <?php echo $resultado['cliente']; ?> </td>
                          <td><?php echo $resultado['endereco'] ?></td>
                          <td><?php echo $resultado['pais'] ?></td>
                          <td><?php echo $resultado['estado'] ?></td>
                          <td><?php echo $resultado['cidade'] ?></td>
                          <td><button type="button" class="btn btn-warning">Editar</button></td>
                          <td><button type="button" class="btn btn-danger">Deletar</button></td>
                        </tr>
                
                <?php   } ?>
 
              </tbody>
            </table>
            <?php include "../includes/rodape.php"; ?>
    </div>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>