<?php

require '../../include/funciones.php';
$auth = estaAutenticado();

var_dump($auth);


if(!$auth){
    header('Location: /');
}

//validar que sea un id valido
$id = $_GET['id'];
$id = filter_var($id,FILTER_VALIDATE_INT);

if(!$id){
    header('Location: /admin');
}
// Base de Datos
require '../../include/config/databases.php';
$db = conectarBD();

//Obtener los datos de la propiedad
$consultaDatosPropiedad = "SELECT * FROM propiedades WHERE id = {$id}";
$resultadoDatosPropiedad = mysqli_query($db,$consultaDatosPropiedad);
$propiedad = mysqli_fetch_assoc($resultadoDatosPropiedad);




// Consultar para obtener los vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

// Arreglo para el manejo de errores
    $errores = [];

    $titulo =$propiedad['titulo'];
    $precio =$propiedad['precio'];
    $descripcion =$propiedad['descripcion'];
    $habitaciones =$propiedad['habitaciones'];
    $banios =$propiedad['banios'];
    $estacionamiento =$propiedad['estacionamiento'];
    $vendedores_id =$propiedad['vendedores_id'];
    $imagen = $propiedad['imagen'];
    


// Ejecutar el codigo despues de enviar el formulario al base de datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {



    // Asignar valor a las variables/validar que los datos que vayan a la base de datos vayan como una cadena
    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $banios = mysqli_real_escape_string($db, $_POST['banios']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedores_id = mysqli_real_escape_string($db, $_POST['vendedores_id']);
    $creado = date('Y/m/d');

    $imagen = $_FILES['imagen'];

    if (!$titulo) {
        $errores[] = "Debes Añadir un Titulo.";
    }

    if (!$precio) {
        $errores[] = "Debes Añadir el Precio de la Propiedad.";
    }

    if (strlen($descripcion) < 50) {
        $errores[] = "Debes Añadir la Descripción de la Propiedad.";
    }
    if (!$habitaciones) {
        $errores[] = "Debes Añadir el numero de habitacion de la Propiedad.";
    }
    if (!$banios) {
        $errores[] = "Debes Añadir el numero de los Baños de la Propiedad.";
    }
    if (!$estacionamiento) {
        $errores[] = "Debes Añadir el numero de estacionamientos de la Propiedad.";
    }
    if (!$vendedores_id) {
        $errores[] = "Debes Seleccionar el vendedor de la Propiedad.";
    }
   
    
    // echo "<pre>";
    // var_dump($errores);
    // echo "</pre>";

    // exit;

    // Validar por tamaño

    $medida = 1000 * 1000;

    if($imagen['size']>$medida){
        $errores[]='La imagen es muy pesada, asegurate que la imagen no exceda';
    }

    if (empty($errores)) {

        // Crear carpeta
    $carpetaImagenes = '../../imagenes/';
    if(!is_dir($carpetaImagenes)){
    mkdir($carpetaImagenes);
    }

    $nombreImagenes = '';

    /*Subida de Archivos.*/

  
   

    if($imagen['name']){
       
        // Eliminar la imagen existente
        unlink($carpetaImagenes . $propiedad['imagen']);

         // Generar un nombre unico
        $nombreImagenes = md5( uniqid( rand(),true ) ).".jpg";
    
        // Subir imagen
        move_uploaded_file($imagen['tmp_name'],$carpetaImagenes.$nombreImagenes);
        

    }else{
        $nombreImagenes = $propiedad['imagen'];     
    }


        // Inserta en la bse de datos
        $query = "UPDATE propiedades SET titulo = '{$titulo}', 
        precio = {$precio}, 
        imagen = '{$nombreImagenes}', 
        descripcion = '{$descripcion}', 
        habitaciones = {$habitaciones}, 
        banios = {$banios}, 
        estacionamiento = {$estacionamiento}, 
        vendedores_id = {$vendedores_id} 
        WHERE id = {$id}";

        // echo $query;

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            // Redireccionar
            header('Location: /admin?resultado=2');
            // echo "Insertado Correctamente";

        }
    }
}


incluirTemplates('header');


?>

<main class="contenedor seccion">
    <h1>Actualizar Propiedad</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php
    foreach ($errores as $error):
    ?>

    <div class="alerta error">
    <?php
    echo $error;
    ?>
    </div>

    <?php
    endforeach;
    ?>

    
    
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Informacion General</legend>

            <label for="titulo">Titulo:</label>
            <input
            type="text" 
            id="titulo" 
            name="titulo" 
            placeholder="Titulo Propiedad" 
            value="<?php echo $titulo; ?>">


            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" placeholder="Precio de la Propiedad" value="<?php echo $precio; ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg" name="imagen">

            <img class="imagen-small" src="/imagenes/<?php echo $imagen; ?>" alt="Imagen de la propiedad">

            <label for="descripcion">Descripcion:</label>
            <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion de la Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 1" min="1" value="<?php echo $habitaciones; ?>">


            <label for="banios">Baños:</label>
            <input type="number" id="banios" name="banios" placeholder="Ej: 1" min="1" value="<?php echo $banios; ?>">


            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 1" min="1" value="<?php echo $estacionamiento; ?>">
        </fieldset>

        <fieldset>
            <legend for="vendedores_id">Vendedor:</legend>
            <select id="vendedores_id" name="vendedores_id">
                <option value="" selected disabled>--Selccione--</option>

                <?php while($vendedor = mysqli_fetch_assoc($resultado) ): ;?>
                    <option <?php echo $vendedores_id === $vendedor['id'] ?'selected':'';?> value="<?php echo $vendedor['id']?>"><?php echo $vendedor['nombre']. " ". $vendedor['apellido']?></option>
                <?php endwhile;?>

            </select>
        </fieldset>

        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">


    </form>
</main>


<?php
incluirTemplates('footer');
?>