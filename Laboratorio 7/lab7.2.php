<?php
    include("class_lib.php");

    $clase1 = new ClaseConcreta1;
    $clase1->printOut();
    echo $clase1->prefixValor('FOO_')."<br>";
    
    $clase2 = new ClaseConcreta2;
    $clase2->printOut();
    echo $clase2->prefixValor('FOO_')."<br>";

?>