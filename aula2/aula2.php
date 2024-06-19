<?php
    //Função de data e Hora Nativas
    echo date("d/m/y") . "<br>";
    echo date("d/m/Y") . "<br>";
    echo date("H:i:s") . "<br>";

    //Funções para Servidor Globais
    echo $_SERVER['PHP_SELF'] . "<br>"; // Arquivo
    echo $_SERVER['SERVER_NAME']. "<br>"; // Localhost
    echo $_SERVER['REMOTE_ADDR']. "<br>"; // Status
    echo $_SERVER['REMOTE_HOST']. "<br>"; // Domínio
    
?>