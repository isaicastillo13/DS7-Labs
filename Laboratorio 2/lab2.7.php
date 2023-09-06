<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 7</title>
</head>
<body>
    <?php
    $posicion = "arriba";

    switch($posicion){
        case "arriba": //Bloque 1
            echo "La variable contiene ";
            echo "El valor arriba";
            break;
        case "abajo": //Bloque 2
            echo "La Variable contiene ";
            echo "El valor abajo";
            break;
        default: //Bloque 3
            echo "La Variable contiene otro valor";
            echo "Distinto de arriba y abajo";
    }
    ?>
</body>
</html>