<?php
    include("class_lib.php");

    $valor = $_POST['valor'];

    $calcularFact = new calcularFactorial($valor);

    $factorial = $calcularFact->calcular();

    echo $factorial;
?>