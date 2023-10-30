<HTML LANG="es">
<HEAD>
<TITLE>Laboratorio 13</TITLE>
<LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</HEAD>
<BODY>
<H1>Eliminar Cookie</H1>
<?php
if(isset($_COOKIE ["user"])) {
setcookie("user", "", time() + 60*5);
echo "<H3>La cookie 'user' ha sido eliminada satisfactoriamente</H3><br/>";
}
else{
echo "<H3>La cookie 'user' no existe</H3><br/>";
}
if(isset($_COOKIE ["contador"])) {
setcookie("contador", "", time() + 365*24*60*60);
echo "<H3>La cookie 'contador' ha sido eliminada satisfactoriamente</H3><br/>";
}
else{
echo "<H3>La cookie 'contador' no existe</H3><br/>";
}
?>
<A HREF="lab131.php">Volver al contador de visitas</A>&nbsp;
<A HREF="lab132.php">Volver al saludo a usuario</A>
</BODY>
</HTML>
