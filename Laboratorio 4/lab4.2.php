<?php
$valor = $_POST['valor'];
$factorial = 1;

for($i=1;$i<= $valor; $i++){
    $factorial = $factorial * $i;
}

echo "El factorial de: ".$valor." es: ".$factorial;

?>