<?php
$array [0][0];

for ($i=0; $i < 15 ; $i++) {
    for ($f=0; $f < 15 ; $f++) {

        if($i == $f){

            $array [$i][$f] = 1;
        }else {

            $array [$i][$f] = 0;
        }
       
    }
}

for ($i=0; $i < 4 ; $i++) {
    for ($f=0; $f < 4 ; $f++) {
            echo $array [$i][$f]." | ";   
    }

    echo "<br>";
}
