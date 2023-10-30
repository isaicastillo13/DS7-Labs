<?php
if (is_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name'])) {
    $nombreDirectorio = "imagenes/";
    $nombreArchivo = $_FILES['nombre_archivo_cliente']['name'];
    $nombreCompleto = $nombreDirectorio . $nombreArchivo;
    $size = filesize($_FILES['nombre_archivo_cliente']['tmp_name']);
    $sizeMg = round($size / 1024 / 1024, 2);
    $mglimite = 2 ;
  

   

    if (is_file($nombreCompleto)) {

        $idUnico = time();
        $nombreArchivo = $idUnico . "-" . $nombreArchivo;
        echo "Archivo repetido, se cambiara el nombre a $nombreArchivo <br><br>";
    }

        if($sizeMg > $mglimite){
            echo "El archivo es muy pesado, el limite es 2MB";
        }else {
            move_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name'], $nombreDirectorio.$nombreArchivo);
            echo "El Archivo se ha subido satisfactoriamente al directorio " . $_FILES['nombre_archivo_cliente']['tmp_name'] . "<br>";
        }
    exit; 


} else {
    echo "No se pudo cargar el archivo";
}
?>