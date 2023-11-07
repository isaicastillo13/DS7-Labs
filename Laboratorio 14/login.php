<?php
session_start();

if (isset($_REQUEST['usuario']) && isset($_REQUEST['clave'])) 
{
    $usuario = $_REQUEST['usuario'];
    $clave = $_REQUEST['clave'];

    $salt = substr($usuario, 0, 2);
    $clave_crypt = crypt($clave, $salt);

    require_once("class/usuarios.php");
    $obj_usuarios = new usuarios();
    $usuario_validado = $obj_usuarios->validar_usuario($usuario, $clave_crypt);

    foreach ($usuario_validado as $array_resp) {
        foreach ($array_resp as $value) {
            $nfilas=$value;
        }}

    if ($nfilas > 0) 
    {
        $usuario_valido = $usuario;
        $_SESSION["usuario_valido"] = $usuario_valido;
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C/DTD HTML 4.0//EN">
 
<HTML lang="es">
<HEAD>
  <TITLE>Laboratorio 14- Login al sitio de Noticias</TITLE>
  <link rel="stylesheet" type="text/css" href="css/estilo.css">
</HEAD>
<BODY>
  <?php
    // Sesión iniciada
    if (isset($_SESSION["usuario_valido"])) 
    {
?>
<h1>Gestion de noticias</h1>
<hr>
<ul>
        <li><a href="lab142.php">Listar todas las noticias</a></li>
        <li><a href="lab143.php">Listar noticias por partes</a></li>
        <li><a href="lab144.php">Buscar noticia</a></li>
      </ul>
      <hr>
      <p>[ <a href='logout.php'>Desconectar</a> ]</p>
      <?php
    } 
// Intento de entrada fallido
  else if (isset  ($usuario)) 
    {
       print ("<BR><BR>\n");
       print ("<P ALIGN='CENTER'>Acceso no autorizado</P>\n");
       print ("<P ALIGN='CENTER'>[<A HREF='login.php'>Conectar</A>]</P>\n");
}
//Sesion no iniciada
else
{
      print ("<BR><BR>\n");
      print ("<P CLASS='parrafocentrado'>Esta zona tiene el acceso restringido.<BR>".
           " Para entrar debe identificarse</P>\n");
      
     print("<FORM CLASS='entrada' NAME='login'  ACTION='login.php' METHOD='POST'>\n");

     echo "<p><label class='etiqueta-entrada'>Usuario:</label>";
     print("   <INPUT TYPE='TEXT' NAME='usuario' SIZE='15'></P>\n");
     echo "<p><label class='etiqueta-entrada'>Clave:</label>";
     print("   <INPUT TYPE='PASSWORD' NAME='clave' SIZE='15'></P>\n");
     print("<P><INPUT TYPE='SUBMIT' VALUE='entrar'></P>\n");
     print("</FORM>\n");

     print("<P CLASS='parrafocentrado'>NOTA: si no dispone de identificacion o tiene problemas ".
         "para entrar <BR>pongase en contacto con el " .
         "<A HREF='MAILTO:webmaster@localhost'>administrador</A> del sitio</P>\n");
    }
  ?>
</body>
</html>

