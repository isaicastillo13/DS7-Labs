<?php
    require_once('modelo.php');

    class votos extends modeloCredencialesDB{

        public function __construct(){
            parent::__construct();
        }

        public function listar_votos(){
            $sql = "call sp_listar_votos";

            $consulta = $this->_db->query($sql);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if($resultado){
                return $resultado;
                $resultado -> close();
                $this->_db->close();

            }
        }

        public function actualizar_votos($voto1,$voto2){
            $sql="call sp_actualizar_votos('".$voto1."','".$voto2."')";
            $actualizar=$this->_db->query($sql);

            if($actualizar){
                return $actualizar;
                $actualizar -> close();
                $this->_db->close();

            }

        }
    }
?>