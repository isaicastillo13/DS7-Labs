<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Laboratorio 9.1</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
    <h1>Consulta de noticias</h1>

    <?php
    if (isset($_SESSION["usuario_valido"])) {
        require_once("class/noticias.php");
        $obj_noticia = new Noticia();
        $noticias = $obj_noticia->consultar_noticias();
        $nfilas = count($noticias);

        if ($nfilas > 0) {
    ?>
            <table>
                <tr>
                    <th>Titulo</th>
                    <th>Texto</th>
                    <th>Categoria</th>
                    <th>Fecha</th>
                    <th>Imagen</th>
                </tr>

                <?php foreach ($noticias as $resultado) { ?>
                    <tr>
                        <td><?= $resultado['titulo'] ?></td>
                        <td><?= $resultado['texto'] ?></td>
                        <td><?= $resultado['categoria'] ?></td>
                        <td><?= date("j/n/Y", strtotime($resultado['fecha'])) ?></td>
                        <td>
                            <?php if ($resultado['imagen'] != "") { ?>
                                <a target="_blank" href="img/<?= $resultado['imagen'] ?>">
                                    <img border="0" src="img/iconotexto.gif">
                                </a>
                            <?php } else { ?>
                                &nbsp;
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        <?php } else { ?>
            <p>No hay noticias disponibles</p>
        <?php } 
      
        ?>
        <p>[<a href='login.php'>Menu principal</a>]</p>
    <?php } else { ?>
        <p><br><br></p>
        <p align="center">Acceso no autorizado</p>
        <p align="center">[<a href='login.php' target='_top'>Conectar</a>]</p>
    <?php } ?>
</body>
</html>
