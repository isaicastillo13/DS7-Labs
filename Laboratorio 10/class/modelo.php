<?php
//incluye la clase config.php y no la incluye mas.
    require_once('config.php');


    class modeloCredencialesDB{
        protected $_db;

        public function __construct(){
            //_db almacena la conexion a la base de datos.
            $this->_db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

            //validamos si tenemos error de conexion a la base de datos.
            if($this->_db->connect_errno){

                //Devuelve el código de error de la última llamada
                echo"No se conecto a la base de datos".$this->_db->connect_errno;
                return;
            }
        }
    }
?>