<?php


class miClase{
    const constante = 'valor constante';

    function mostrarConstante(){
        echo self::constante."\n";
    }
}

abstract class ClaseAbstracta{
    abstract protected function tomarValor();
    abstract protected function prefixValor($prefix);

    public function printOut(){
        print $this->tomarValor()."<br>";
    }
}

class ClaseConcreta1 extends ClaseAbstracta{
    protected function tomarValor(){
        return "ClaseConcreta1";
    }

    public function prefixValor ($prefix){
        return "{$prefix}ClaseConcreta1";
    }
}

class ClaseConcreta2 extends ClaseAbstracta{
    protected function tomarValor(){
        return "ClaseConcreta2";
    }

    public function prefixValor ($prefix){
        return "{$prefix}ClaseConcreta2";
    }
}


interface ITemplate {
    public function ponerVariable($nombre,$var);
    public function verHtml($template);
}

class Template implements ITemplate{
    private $vars = array();

    public function ponerVariable($nombre,$var){

    $this->vars[$nombre] = $var;

    }

    public function verHtml ($template){
        foreach($this->vars as $nombre => $value){
            $template = str_replace('{'.$nombre.'}',$value,$template);
            //echo "Key: $nombre, Value: $value<br>";
        }

        return $template;

    }
}

class subObject{
    static $instances = 0;
    public $instance;

    public function __construct(){
        $this->instance = ++self::$instances;
    }
    
    public function __clone(){
        $this->instance = ++self::$instances;
    }
}

class myCloneable{
    public $object1;
    public $object2;

    function __clone(){

        $this->object1 = clone $this->object1;
    }
    
}

class Cilindro 
{ 
 protected $pi; 
 protected $diametro; 
 protected $altura; 
 protected $radio; 
 
function __construct($d, $a){ 
 $this->diametro = $d; 
 $this->altura = $a;  
 $this->pi = 3.141593; 
 $this->radio=$d/2; 
} 
 
function obtener_radio(){ 
 return $radio; 
} 
 
function calc_volumen(){ 
 return $this->pi*$this->radio*$this->radio*$this->altura; 
} 
 
function calc_area(){ 
 return 2*$this->pi*$this->radio*($this->radio+$this->altura); 
} 
 
} 

    ?>