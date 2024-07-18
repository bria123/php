<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
<?php
       session_start();
       require "../../vendor/autoload.php";
       $a = new Usuario();


        if($_SESSION["logado"] == "logar")
        {
            $a->verificaLogado($_SESSION["func"]);
        }
        else
        {
            header("Location:index.php");
        }
    ?>

<div class="container">
    <?php require "../Includes/menu.php" ?>
    <h2> Olá <?php echo $_SESSION["nome"] . " " . $_SESSION["nivel"]; ?></h2>
    <?php
            if($_SESSION["nivel"] == "ADMIN"  )
            {
                echo "admin";
            }
            else if( $_SESSION["nivel"] == "PADRAO" )
            {
                echo "padrao";
            }
            else
            {
                header("Location:index.php");
            }


    ?>
    <?php require_once "../Includes/rodape.php";?>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
</body>
</html>