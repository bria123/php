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
      <?php require "includes/menu.php"; ?>
        <h1>Cadastro Cliente</h1>

        <form method="post" action="acao/acaoCliente.php">
          <div class="row">
            <div class="col-md-12">  
              <div class="form-group">
                <label for="exampleInputEmail1">Nome do Cliente</label>
                <input type="text" name="nome" class="form-control" placeholder="Nome do Cliente">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                  <label for="exampleInputEmail1">CPF</label>
                  <input type="text" name="cpf" class="form-control" placeholder="000.000-00">
                </div>
            </div>

            <div class="col-md-4"> 
              <div class="form-group">
                  <label for="exampleInputEmail1">Data Nascimento</label>
                  <input type="date" name="" class="form-control" placeholder="Data Nascimento">
              </div>
            </div>
              
            <div class="col-md-4">  
              <div class="form-check form-check-inline" style="margin-top:40px">
                  <input class="form-check-input" type="radio" name="exampleRadios" value="Masculino" checked>
                  <label class="form-check-label" for="exampleRadios1">
                    Masculino
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="exampleRadios"  value="Feminino">
                  <label class="form-check-label" for="exampleRadios2">
                    Feminino
                  </label>
                </div>
              </div>
            </div>

          
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Estado Civil</label>
                    <input type="text" name="" class="form-control" placeholder="Estado Civil">
                </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                    <label for="exampleInputEmail1">Renda Mensal</label>
                    <input type="number" name="" class="form-control" placeholder="Renda Mensal">
                </div>
              </div>
            </div>

          
            <div class="row">
              <div class="col-md-4"> 
                <div class="form-group">
                      <label for="exampleInputEmail1">Lagradouro</label>
                      <input type="text" name="" class="form-control" placeholder="Estado Civil">
                  </div>
                </div>
              <div class="col-md-4">
              <div class="form-group">
                    <label for="exampleInputEmail1">Número</label>
                    <input type="text" name="" class="form-control" placeholder="Estado Civil">
                </div>
            </div>

            <div class="col-md-4"> 
              <div class="form-group">
                    <label for="exampleInputEmail1">Complemento</label>
                    <input type="text" name="" class="form-control" placeholder="Estado Civil">
                </div>
            </div>

          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Select de exemplo</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Select de exemplo</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12"> 
              <input type="submit" value="Enviar" name="enviar" class="btn btn-primary">
            </div>
          </div>

      </form> <!-- Fecha form -->

      <?php require "includes/rodape.php"; ?>
    </div>


    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>