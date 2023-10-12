<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 9</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Consulta de Noticia</h1>

    <?php
    require_once("class/noticias.php");

    $obj_noticias = new noticias();
    $noticias = $obj_noticias->consultar_noticias();

    $nfilas = count($noticias);
    //print ("<h1>".$nfilas."</h1>");
    
    if($nfilas > 0){
        print ("<table>\n");
        print ("<tr>\n");
        print ("<th>Titulo</th>\n");
        print ("<th>Texto</th>\n");
        print ("<th>Categoria</th>\n");
        print ("<th>Fecha</th>\n");
        print ("<th>Imagen</th>\n");
        print ("</tr>\n");

        foreach ($noticias as $resultado){
            //var_dump($noticias);
            print("<tr>\n");
            print("<td>".$resultado['titulo']."</td>\n");
            print("<td>".$resultado['texto']."</td>\n");
            print("<td>".$resultado['categoria']."</td>\n");
            print("<td>".date("j/n/y",strtotime($resultado['fecha']))."</td>\n");

            if($resultado['imagen'] != ""){
                print("<td><a target = '_blank' href= 'img/".$resultado['imagen']."'><img border = '0' src='img/icontexto.gif'></a></td>\n");
    
                }else{
                    print ("<td>&nbsp;</td>\n");
                }
                
                print ("</tr>\n");
            }

            print("</table>\n");
        }else{
            print("No hay noticias disponibles");
        }

    ?>
</body>
</html>