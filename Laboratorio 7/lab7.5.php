<?php
    include("class_lib.php"); 
 
    $obj = new myCloneable(); 
     
    $obj->object1 = new subObject(); 
    $obj->object2 = new subObject(); 
     
    $obj2 = clone $obj; 
     
     
    print("<br>Original Object: "); 
    print_r($obj); 
     
    print("<br>Cloned Object: "); 
    print_r($obj2);
?>