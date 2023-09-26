<?php
    class cliente{
        var $nombre;
        var $numero;
        var $peliculas_alquiladas;

        function __construct($nombre,$numero){
            $this->nombre = $nombre;
            $this->numero = $numero;
            $this->peliculas_alquiladas = array();
        }
        /*El método destructor será llamado tan pronto como no hayan otras referencias a un objeto determinado, o en cualquier otra circunstancia de finalización.*/
        function __destruct (){
            echo "<br>Se ha destruido el objeto " .$this->nombre;
        }

        function dameUnNumero (){
            return $this->numero;
        }
    }

    //instanciamos un par de objetos cliente
    $cliente1 = new cliente ("Pepe", 1);
    $cliente2 = new cliente ("Roberto", 564);

    //mostramos el numero de cada cliente creado
    echo "El número del primer cliente es: ".$cliente1 ->dameUnNumero()."<hr>";
    echo "El número del segundo cliente es: ".$cliente2 ->dameUnNumero()."<hr>";
?>