<?php

    class ClaseBase{
        public function test(){
            echo "ClaseBase::test() llamada\n";
        }

        final public function masTests(){
            echo "ClaseBase::masTest() llamada\n";
        }
    }

    /*class ClaseHijo extends ClaseBase{
        public function masTests(){
            echo "ClaseHijo::masTest() llamada\n";
        }


    }
    la palabr final indica que no se puede heredar el metodo de la clase padre.
    */


?>