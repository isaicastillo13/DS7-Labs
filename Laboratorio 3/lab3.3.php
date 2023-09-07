<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 3</title>
</head>

<body>
    <?php
    //Checks if the given key or index exists in the array. ¿La llave "enviar" existe en el arreglo $_POST?.
    if (array_key_exists('enviar', $_GET)) {


        //An associative array that by default contains the contents of $_GET, $_POST and $_COOKIE y obtiene el valor del contenido usando la key
        if ($_REQUEST['Apellido'] != "") {
            echo "El apellido Ingresado es : $_REQUEST[Apellido]";
        } else {
            echo "Favor coloque el apellido";
        }

        echo "<br>";

        if ($_REQUEST['Nombre'] != "") {
            echo "El nombre Igresado es: $_REQUEST[Nombre]";
        } else {
            echo "Favor ingrese su Nombre ";
        }
    } else {
    ?>
        <!-- El formulario se transforma en un arreglo asociativo mediante el metodo "post". los "name's" son las "key's" -->
        <form action="lab3.3.php" method="get">
            <label for="">Nombre</label>
            <input type="text" name="Nombre">

            <label for="">Apellido</label>
            <input type="text" name="Apellido">

            <input type="submit" name="enviar" value="Enviar Datos">
        </form>
    <?php
    }
    ?>
</body>

</html>