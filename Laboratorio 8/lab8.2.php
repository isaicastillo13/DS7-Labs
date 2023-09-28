<?php
    include('class_lib.php');
    $valor = $_POST['valor'];

    $evaluacion = new evaluarDesempeño($valor);

    $resultado = $evaluacion->evaluar();

    echo $resultado;


?>