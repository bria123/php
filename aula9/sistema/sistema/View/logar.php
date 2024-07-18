<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <?php
        require_once "../../vendor/autoload.php";
        $usuario = new Usuario();

        if(isset($_POST["Logar"]))
        {
            $usuario->logarUsuarios($_POST);
        }

    ?>

<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Endereço de email</label>
            <input type="email" name="email" class="form-control"  aria-describedby="emailHelp" placeholder="Seu email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <input type="password" name="senha" class="form-control"  placeholder="Senha">
        </div>
        <button type="submit" name="Logar" class="btn btn-primary">Enviar</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
</body>
</html>