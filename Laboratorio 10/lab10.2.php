<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 10.2</title>
</head>
<body>
    <h1>Encuesta</h1>
    <h3>Resultado de la Votacion</h3>

    <?php
        require_once('class/votos.php');

        $obj_votosq` = new votos();
        $resultados_votos = $obj_votos->listar_votos();

        foreach($resultados_votos as $result_votos){
            $votos1=$result_votos['votos1'];
            $votos2=$result_votos['votos2'];
        }

        $totalVotos = $votos1 + $votos2;


        print("<table>");
        print("<tr>\n");
        print("<th>Respuesta</th>");
        print("<th>Votos</th>");
        print("<th>Procentaje</th>");
        print("<th>Representacion Grafica</th>\n");
        print("</tr>\n");

        $procentaje = round (($votos1/$totalVotos)*100,2);
        print("<tr>\n");
        print("<td class='izquierda'>Si</td>\n");
        print("<td class= 'derecha'>$votos1</td>\n");
        print("<td class= 'derecha'>$procentaje%</td>\n");
        print("<td class= 'izquierda' width='400'><img src='img/puntoamarillo.gif' height='10' width='".$procentaje*4 ."'></td>\n");
        print("</tr>");

        $procentaje = round (($votos2/$totalVotos)*100,2);
        print("<tr>\n");
        print("<td class='izquierda'>No</td>\n");
        print("<td class= 'derecha'>$votos2</td>\n");
        print("<td class= 'derecha'>$procentaje%</td>\n");
        print("<td class= 'izquierda' width='400'><img src='img/puntoamarillo.gif' height='10' width='".$procentaje*4 ."'></td>\n");
        print("</tr>");
        print("</table>");

        print("<p>Numero total de votos emitidos: $totalVotos<\p>");
        print("<p><a href = 'http://localhost:3000/lab10.1.php'>Pagina Votacion<\p>");
        

    ?>
</body>
</html>