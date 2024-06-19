<?php 
    //Estrutura de Decisão
    $a = 45;
    $b = 75;
    $c = 30;

    if($a > $b && $a > $c){
        echo "A é maior";
    }else if($b > $a && $b > $c){
        echo "B é maior";
    }else{
        echo "C é maior";
    }

?>