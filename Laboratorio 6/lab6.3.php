<?php
include ("class_lib.php");

//Clase padre

$soporte1 = new soporte ("The Soccer Game",22,3);
echo "<br>". $soporte1->titulo."<br>";
echo "<br>Precio: " . $soporte1->damePrecioSinItbm()." dolares";
echo "<br>Precio con IBM incluido" .$soporte1->damePrecioConItbm . "dolares";

//Clase hija.
$mivideo = new video("Los Otros",22,4.5,"115 min");
echo"<br><br>";
echo"<br>" . $mivideo->$titulo."<br>";
echo"<br>Precio:".$mivideo->damePrecioSinItbm()." dolares";
echo"<br>Precio ITBM incluido: " . $mivideo->damePrecioConItbm()." dolares ";
echo"<br>".$mivideo->imprimeCaracteristicas();

$mijuego = new juego("EFootball",21,2.5,"Xbox 360",1,4);
$mijuego->imprimeCaracteristicas();
$mijuego->imprimeJugadoresPosibles();
echo"<p>";


$mijuego2 = new juego("EA FC 24",27,3,"PS 4",1,4);
echo"<br>".$mijuego2->titulo."<br>";
$mijuego2->imprimeJugadoresPosibles();



?>