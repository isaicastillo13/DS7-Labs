<?php
    require '../include/funciones.php';
    $auth = estaAutenticado();


    if(!$auth){
        header('Location: /');
    }

    //Importar la conexion
    require '../include/config/databases.php';
    $db = conectarBD();

    //Escribir el Query
    $query = "SELECT * FROM propiedades";

    //Consultar la BD
    $resultadoConsulta = mysqli_query($db,$query);

//Muestra mensaje condicional
$resultado=$_GET['resultado'] ?? null;


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if($id){

        //Eliminar el archivo (imagen de la propiedad)
        $query = "SELECT imagen FROM propiedades WHERE id = {$id}";  
        $resultado = mysqli_query($db, $query);
        $propiedad = mysqli_fetch_assoc($resultado);

        unlink('../imagenes' . $propiedad['imagen']);


        //Eliminar el anuncio
        $query = "DELETE FROM propiedades WHERE id = {$id}";      
        $resultado = mysqli_query($db, $query);

        if($resultado){
            header('Location: /admin?resultado=3');
        }
    }
}

//Incluye un template

incluirTemplates('header');

?>

<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>
    <?php if(intval($resultado) === 1):?>
        <p class="alerta exito">Anuncion Creado Correctamente</p>
        <?php elseif(intval($resultado) === 2):?>
            <p class="alerta exito">Anuncio Actualizado Correctamente</p>
            <?php elseif(intval($resultado) === 3):?>
            <p class="alerta exito">Anuncio Eliminado Correctamente</p>
    <?php endif;?>
    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>

                <tbody> <!--Mostrar los resultados-->
             

                <?php while( $propiedad = mysqli_fetch_assoc($resultadoConsulta)): ?>
                  
                    <tr>
                        <td><?php echo $propiedad ['id']?></td>
                        <td><?php echo $propiedad ['titulo']?></td>
                        <td><img class="imagen-tabla" src="/imagenes/<?php echo $propiedad ['imagen']?>" alt="imagen-tabla"></td>
                        <td>$<?php echo $propiedad ['precio']?></td>
                        <td>

                        <form class="w-100" method="POST" >
                            <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">
                            <input class="boton-rojo-block" type="submit" value="Eliminar">
                        </form>

                            <a href="admin/propiedades/actualizar.php?id=<?php echo $propiedad ['id']?>" class="boton-amarillo" >Actualizar</a>
                        </td>
                    </tr>
                    <?php endwhile ;?>
                </tbody>
            </tr>
        </thead>
    </table>
</main>

<?php

//Cerra la conexion
mysqli_close($db);
incluirTemplates('footer');
?>