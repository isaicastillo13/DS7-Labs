
<?php
/*
-Llenar un arreglo unidimensional de 20 elementos
-luego de llenar el arreglo mostrar en pantalla la posición y el valor del elemento mayor almacenado en el arreglo.Todos los elementos deben ser diferentes.  
        */
$array = [
    "1" => 1,
    "2" => 2,
    "3" => 3,
    "4" => 46,
    "5" => 1,
    "6" => 63,
    "7" => 7,
    "8" => 18,
    "9" => 9,
    "10" => 10,
    "11" => 80,
    "12" => 12,
    "13" => 13,
    "14" => 14,
    "15" => 60,
    "16" => 16,
    "17" => 17,
    "18" => 18,
    "19" => 19,
    "20" => 20,
];

$valorMayor;
$keyMayor;


foreach($array as $key=> $valor){

if($valor > $valorMayor){
    $valorMayor = $valor;
    $keyMayor = $key;
}
   
}

echo "La posicion del valor mas grande dentro del arreglo es la: ". $keyMayor." y el valor es: ".$valorMayor;

?>