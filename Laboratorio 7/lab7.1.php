<?php
    include("class_lib.php");
    echo miClase::constante . "<br>";
    $clase = new miClase();
    $clase->mostrarConstante();
?>