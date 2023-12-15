<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario PHP</title>
</head>
<body>
     <form action="lab18.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    <br>
    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" id="apellido" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <br>
    <label for="repetirPassword">Repetir Password:</label>
    <input type="password" name="repetirPassword" id="repetirPassword" required>
    <br>
    <label for="ip">IP:</label>
    <input type="text" name="ip" id="ip" required>
    <br>
    <input type="submit" value="Registrar Usuario">
  </form>

  <?php
  // se incluye el archivo funciones.php
  include 'funciones.php';
  // se verifica que se haya enviado el formulario
  if (isset($_POST['nombre'])) {
    // se valida que el nombre de usuario no se encuentre vacío
    if ($_POST['nombre'] == "") {
      echo "Requiere ingresar un nombre de usuario";
    }
    // se verifica que el apellido no esté vacío
    elseif ($_POST['apellido'] == "") {
      echo "Requiere ingresar un apellido";
    }
    // se verifica que el email no esté vacío
    elseif ($_POST['email'] == "") {
      echo "Requiere ingresar un email";
    }
    // se verifica que el email sea válido
    elseif (!verificar_email($_POST['email'])) {
      echo "Requiere ingresar un email válido";
    }
    // se verifica que el password no esté vacío
    elseif ($_POST['password'] == "") {
      echo "Requiere ingresar un password";
    }
    // se verifica que el password sea válido
    elseif (!verificar_password_strenght($_POST['password'])) {
      echo "Requiere ingresar un password válido";
    }
    // se verifica que el password sea igual al repetirPassword
    elseif ($_POST['password'] != $_POST['repetirPassword']) {
      echo "Las contraseñas no coinciden";
    }
    // se verifica que la IP no esté vacía
    elseif ($_POST['ip'] == "") {
      echo "Requiere ingresar una IP";
    }
    // se verifica que la IP sea válida
    elseif (!verificar_ip($_POST['ip'])) {
      echo "Requiere ingresar una IP válida";
    }
    // si todo está bien, se muestra un mensaje de éxito
    else {
     echo "<script>alert('Usuario registrado exitosamente');</script>";
    }
  }
  ?>

  
</body>
</html>