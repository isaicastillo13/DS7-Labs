

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Matriz</h1>
    <form action="http://localhost:3000/lab8.3.php" method="POST">

        <label for="">Fila</label>
        <input type="text" name="fila">

        <label for="">Columnas</label>
        <input type="text" name="columnas">

        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>

</html>

<?php
include('class_lib.php');

$fila = $_POST['fila'];
$columnas = $_POST['columnas'];



$matriz = new matriz($fila, $columnas);

$matrizGenerada = $matriz->generarMatriz();

echo $matrizGenerada;

?>