<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 5</title>
</head>
<body>
    <?php
        $figuras = array ('Cuadrado','Triangulo','Circulo');
        $figuras [1] = 'Rectangulo';

        mostrar_figuras($figuras,"asignacion de Rectangulo");

        array_push($figuras,'Pentagono');
        mostrar_figuras($figuras,"Adicion del Pentagono al final");

        array_unshift($figuras,'Hexagono');
        mostrar_figuras($figuras,"Adicion del Hexagono al inicio");
        
        array_pop($figuras);
        mostrar_figuras($figuras,"Eliminacion del ultimo");
        
        array_shift($figuras);
        mostrar_figuras($figuras,"Eliminacion del primero");
        
        function mostrar_figuras($figuras, $mensaje){
        echo "<br> Arrglo despues de $mensaje <br>";
        foreach ($figuras as &$figura) {
            echo "$figura <br>";
        }
    }
    ?>
</body>
</html>