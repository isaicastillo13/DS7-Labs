<?php
    require_once('modelo.php');

    class noticias extends modeloCredencialesDB{

        protected $titulo;
        protected $texto;
        protected $categoria;
        protected $fecha;
        protected $imagen;

        public function __construct(){
            parent::__construct();
        }

        public function consultar_noticias(){

            $sql = "call sp_listar_noticias()";
            $consulta = $this->_db->query($sql);
            //Obtengo todas las filas que me trajo la consulta
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
            //print_r($resultado);
            if(!$resultado){
                echo "Fallo la consulta";
            }else{
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }

        public function consultar_noticias_filtro($campo,$valor){
            $sql="call sp_listar_noticias_filtro('".$campo."','".$valor."')";

            $consulta = $this->_db->query($sql);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            //var_dump($consulta);

            if($resultado){
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }

        }
    }
?>