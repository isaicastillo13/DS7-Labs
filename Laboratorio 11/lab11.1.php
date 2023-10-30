<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 11</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Consulta de Noticia</h1>
    <form action="http://localhost:3000/lab11.1.php" name="formFiltro" method="POST">
        <br>
        <input type="submit" name="primeraPagina" value="Anterior" >
       <input type="submit" name="segundaPagina" value="Siguiente" >
        <p>Filtrar por: </p>
        <select name="campos" id="">
            
            <option value="titulo">Titulo</option>
            <option value="texto" selected>Descripcion</option>
            <option value="categoria">Categoria</option>
            
        </select>

        <p>con el valor</p>
        <input type="text" name="valor">
        <input type="submit" name="consultarTodos" value="Ver todos" >
        <input type="submit" name="consultarFiltro" value="Filtrar Datos" >
    </form>
    <?php
    require_once("class/noticias.php");

    $obj_noticias = new noticias();
    $noticias = $obj_noticias->consultar_noticias(0,0);

    if(array_key_exists('consultarTodos',$_POST)){
        $obj_noticias = new noticias();
        $noticias = $obj_noticias->consultar_noticias();
    }
    if(array_key_exists('consultarFiltro',$_POST)){
        $obj_noticias = new noticias();
        $noticias = $obj_noticias->consultar_noticias_filtro($_REQUEST['campos'],$_REQUEST['valor']);
        //var_dump($noticias);
    }

    if(array_key_exists('primeraPagina',$_POST)){
        $obj_noticias = new noticias();
        $noticias = $obj_noticias->consultar_noticias(3,0);
    }
    if(array_key_exists('segundaPagina',$_POST)){
        $obj_noticias = new noticias();
        $noticias = $obj_noticias->consultar_noticias(3,2);

        //var_dump($noticias);
    }

    

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