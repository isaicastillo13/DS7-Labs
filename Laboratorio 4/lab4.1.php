<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desempeño en las Ventas</title>
</head>

<body>

    <?php
    if (array_key_exists('enviar', $_POST) != "") {
        if ($_REQUEST['desempeño'] >= 80) {

            echo "carita verde";
        } else if ($_REQUEST['desempeño'] >= 50 && $_REQUEST['desempeño'] <= 79) {
            echo "carita amarilla";
        } else if ($_REQUEST['desempeño'] >= 0 && $_REQUEST['desempeño'] <= 49 ) {
            echo "carita roja";
        }else {
            echo "No haz introducido ningun valor.";
        }
    } else {
    ?>
        <h1>Indicador de Desempeño en Ventas</h1>
        <form action="http://localhost:3000/lab4.1.php" method="POST">

            <label for="">Desempeño</label>
            <input type="text" name="desempeño">

            <input type="submit" name="enviar" value="Enviar">

            
        </form>

    <?php
    }
    ?>
</body>

</html>