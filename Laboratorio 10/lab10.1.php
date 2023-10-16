<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 10.1</title>
    <link rel="stylessheet" type="text/css" href= "css/estilo.css">
</head>
<body>

<?php
    require("class/votos.php");

    if(array_key_exists('enviar',$_POST)){

        print("<h1>Encuesta Voto Registrado </h1>\n");

        $obj_votos = new votos();
        $resultado_votos = $obj_votos->listar_votos();

        foreach($resultado_votos as $result_voto){
            $votos1 = $result_voto['votos1'];
            $votos2 = $result_voto['votos2'];
        }

        $voto = $_REQUEST['voto'];
        var_dump($voto);

        if($voto == "si"){
            $votos1 = $votos1 + 1;
            var_dump("Votó que si ".$votos1);
        }
        else if ($voto == "no"){
            var_dump("Votó `que no ".$votos2);
            $votos2 = $votos2 + 1;
        }
        

        $obj_votos = new votos();
        $result = $obj_votos-> actualizar_votos($votos1, $votos2);
        
       
        if($result){
            print("<p>Su Voto ha sido registrado. Gracias por participar</p>\n");

            print("<a href='http://localhost:3000/lab10.2.php'>Ver Votos</a>\n");

        }else{
            print ("<a href = 'http://localhost:3000/lab10.1.php'>Error al actualizar su votos</a>\n");
        }

    }else{
?>

<h1>Encuesta</h1>
<p>Cree usted. que el precio de las viviendas seguira subiendo al ritmo actual?</p>

<form action="http://localhost:3000/lab10.1.php" method ="POST">
    <input type="radio" name="voto" value="si" checked>
    <label for="">Si</label>
    
    <input type="radio" name="voto" value="no">
    <label for="">No</label>

    <input type="SUBMIT" name="enviar" value="votar">
</form>

<a href="http://localhost:3000/lab10.1.php">Ver Resultado</a>

<?php
    }
?>
    
</body>
</html>