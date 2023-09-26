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

    class soporte{
        public $titulo;
        protected $numero;
        private $precio;

        function __construct($tit, $num, $precio){
            $this->titulo = $tit;
            $this->numero = $num;
            $this->precio = $precio;
        }

        public function damePrecioSinItbm(){
            return $this->precio;
        }

        public function damePrecioConItbm(){
            return $this->precio * 0.07;
        }

        public function dameNumeroIdentificacion(){
            return $this->numero;
        }

        public function imprimeCaracteristicas(){ 
            echo "<br>" . $this->titulo; 
            echo "<br>" . $this->precio . " (ITBM no incluido)"; 
        } 
    }

    class video extends soporte{
        protected $duracion;

        function __construct($tit,$num,$precio,$duracion){
            //Recibe los parametros de la clase padre soporte.
            parent:: __construct($tit,$num,$precio);
            $this->duracion = $duracion;
        }

        public function imprimeCaracteristicas(){ 
            
            echo "<br> Película en Blu-Ray:"; 
            parent::imprimeCaracteristicas(); 
            echo "<br>Duración: " . $this->duracion; 
        }
    }

    class juego extends soporte{
        protected $consola;
        protected $minNumJugadores;
        protected $maxNumJugadores;

        function __construct($tit,$num,$precio,$consola,$min_j,$max_j){
            //le pasa los paramatros que necesita el contructor de la clase padre.
            parent::__construct($tit, $num, $precio);
            $this->consola = $consola; 
            $this->min_num_jugadores = $min_j; 
            $this->max_num_jugadores = $max_j;
        }

        public function imprimeCaracteristicas(){ 
            echo "<br>Juego para: " . $this->consola; 
            parent::imprimeCaracteristicas(); 
            echo "<br>" . $this->imprime_jugadores_posibles(); 
        }

        public function imprimeJugadoresPosibles(){

            if($this->minNumJugadores == $this -> maxNumJugadores){
                if($this->minNumJugadores == 1)
                    echo "<br>Para un jugador";
                else
                echo "<br> De ".$this->minNumJugadores."a".$this->maxNumJugadores." jugadores";
            }
        }
    }

    class Foo {
        public static $miStatic = 'foo';
        public function staticValor(){
            return self::$miStatic;
        }
    }

    class Bar extends Foo{
        public function fooStatic(){
            return parent::$miStatic;
        }
    }



    
?>