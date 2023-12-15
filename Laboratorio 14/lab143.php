<?PHP

  session_start ();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Laboratorio 111</title>
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

        $resultadosPorPagina = 5;
        $paginasTotales = ceil($nfilas / $resultadosPorPagina);

        // Obtener el número de página actual desde la URL
        $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

        // Calcular el índice de inicio y fin de resultados para la página actual
        $inicio = ($paginaActual - 1) * $resultadosPorPagina;
        $fin = $inicio + $resultadosPorPagina;

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

                <?php for ($i = $inicio; $i < $fin; $i++) { 
                    if ($i < $nfilas) {
                        $resultado = $noticias[$i];
                ?>
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
                <?php } } ?>

            </table>

            <!-- Mostrar guía de páginas -->
            <div class="pagination">
                <?php
                if ($paginasTotales > 1) {
                    $paginaAnterior = ($paginaActual > 1) ? $paginaActual - 1 : 1;
                    $paginaSiguiente = ($paginaActual < $paginasTotales) ? $paginaActual + 1 : $paginasTotales;
                ?>
                Mostrando Noticias <?= $inicio + 1 ?> a <?= min($fin, $nfilas) ?> de un total de <?= $nfilas ?>
                [<a href="?pagina=<?= $paginaAnterior ?>">Anterior</a>
                <?php for ($i = 1; $i <= $paginasTotales; $i++) { ?>
                    <a href="?pagina=<?= $i ?>"><?= $i ?></a>
                <?php } ?>
                <a href="?pagina=<?= $paginaSiguiente ?>">Siguiente</a>]
                <?php } ?>
            </div>
        <?php } else { ?>
            <p>No hay noticias disponibles</p>
            <?php } 
      
      ?>
      <p>[<a href='login.php'>Menu principal</a>]</p>
       <?php } 
  else { ?>
      <p><br><br></p>
      <p align="center">Acceso no autorizado</p>
      <p align="center">[<a href='login.php' target='_top'>Conectar</a>]</p>
  <?php } ?>
</body>
</html>
