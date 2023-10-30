<?php
include ("class_lib.php");

//instanciamos un par de objetos
$cliente1 = new cliente("Pepe", 3);
$cliente2 = new cliente("Sergio Ramos", 4);

//mostramos el numero de cada cliente
echo "<br> El identificador del cliente 1 es: ".$cliente1->dameUnNumero();
echo "<br> El identificador del cliente 2 es: ".$cliente2->dameUnNumero();
?>