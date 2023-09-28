<?php

use function PHPSTORM_META\type;

    class calcularFactorial{

        protected $valor;

        function __construct($valor){
            $this->valor = $valor;
        }

        function calcular(){

            $factorial = 1;

            for($i=1;$i<= $this->valor; $i++){
                $factorial = $factorial * $i;
            }
            
            return "El factorial de: ".$this->valor." es: ".$factorial;
        }
    }

    class evaluarDesempeño{

        protected $valor;

        function __construct($valor){
            $this->valor = $valor;
        }

        function evaluar(){

            $resultadoEva = "";

            if ($this->valor >= 80) {
                $resultadoEva =  "<img src='image/carita_verde.png' alt='Mi Imagen'>";
            } else if ($this->valor>= 50 && $this->valor <= 79) {
                $resultadoEva ="<img src='image/carita_amarilla.png' alt='Mi Imagen'>";
            } else if ($this->valor >= 0 && $this->valor <= 49 ) {
                $resultadoEva = "<img src='image/carita_roja.png' alt='Mi Imagen'>";
            }else {
                $resultadoEva = "No haz introducido ningun valor.";
            }

            return $resultadoEva;
        }

    }

    class matriz{

        protected $fila;
        protected $columnas;

        function __construct($fila,$columnas)
        {
            $this->fila=$fila;
            $this->columnas=$columnas;
        }

        function generarMatriz(){

            for ($i=0; $i < $this->fila ; $i++) {
                for ($f=0; $f < $this->columnas ; $f++) {
            
                    if($i == $f){
            
                        $array [$i][$f] = 1;
                    }else {
            
                        $array [$i][$f] = 0;
                    }
                   
                }
            }
            
            for ($i=0; $i < $this->fila ; $i++) {
                for ($f=0;  $f < $this->columnas ; $f++) {
                        echo $array [$i][$f]." | ";   
                }
            
                echo "<br>";
            }
        }

    }

?>