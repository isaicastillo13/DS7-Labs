<?php
include("class_lib.php");

print Foo::$miStatic . " value (1)<br>";

$foo = new Foo();
print $foo->staticValor()." value(2)<br>";


print $foo->staticValor()." value(3)<br>";
//"Propiedad" no definida miStatic
//

print Bar::$miStatic." value(4)";

$bar = new Bar();
print $bar->fooStatic()." value (5)<br>";


?>