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

            $usuario = new Usuario();
            $conexao = new Conexao();

            if(isset($_POST['enviar'])){

              if($usuario->inserirUsuario($_POST) == "ok" ){
                echo "<html> <div class='alert alert-primary alert-dismissible fade show' role='alert'> Cadastrado com Sucesso <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div></html>";
              }
          }
          ?>

            <h1>Cadastro Usuário</h1>
            <form method="post" action="">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome do Usuário</label>
                    <input type="text" name="nome" class="form-control" placeholder="Nome do Cliente">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email do Usuário</label>
                    <input type="email" name="email" class="form-control" placeholder="Endereço do Cliente">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Senha do Usuário</label>
                    <input type="password" name="senha" class="form-control" placeholder="Endereço do Cliente">
                </div>
                <div class="form-group">
                <label for="exampleFormControlSelect1">Nível</label>
                <select class="form-control" name="tipo">
                  <option value="padrao">Padrão</option>
                  <option value="admin">Admin</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Observações</label>
                <textarea class="form-control" name="mensagem" rows="3"></textarea>
              </div>
                <input type="submit" name="enviar" value="Cadastro Ususário" class="btn btn-primary">
            </form>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Email</th>
                  <th scope="col">Senha</th>
                  <th scope="col">Tipo</th>
                  <th scope="col">Observação</th>
                  <th scope="col">Editar</th>
                  <th scope="col">Deletar</th>
                </tr>
              </thead>
              <tbody>
              <?php 

                  $usuario->selecionarUsuario();

                  foreach($usuario->selecionarUsuario() as $resultado){
                  ?>
                        <tr>
                          <th scope="row"> <?php echo $resultado['id']; ?>  </th>
                          <td> <?php echo $resultado['nome']; ?> </td>
                          <td><?php echo $resultado['email'] ?></td>
                          <td><?php echo $resultado['senha'] ?></td>
                          <td><?php echo $resultado['tipo'] ?></td>
                          <td><?php echo $resultado['mensagem'] ?></td>
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