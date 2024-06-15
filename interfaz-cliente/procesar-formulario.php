<?php
// Establece la conexión a la base de datos 
$servername = "localhost";
$username = "root";
$password = "";
$database = "spa_sweethands";

$conn = new mysqli($servername, $username, $password, $database);

// Verifica la conexión a la base de datos
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtiene los datos del formulario 
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];


  // Insertar datos en la tabla 
  $sql1 = "INSERT INTO clientes (nombre, apellido, dni, telefono) VALUES ('$nombre', '$apellido', '$dni', '$telefono')";

 
  if ($conn->query($sql1) === TRUE) {
      // Obtener el ID del último usuario insertado
      $last_id = $conn->insert_id;


      $sql2 = "INSERT INTO usuario_cliente (id_cliente, correo, contrasena) VALUES ('$last_id', '$email', '$contrasena')";

      if ($conn->query($sql2) === TRUE) {
          echo "Datos guardados correctamente";
      } else {
          echo "Error al guardar la contraseña: " . $conn->error;
      }
  } else {
      echo "Error al guardar los datos del usuario: " . $conn->error;
  }


$conn->close();



/*codigo de referenci
$sql = "INSERT INTO usuarios
(nombre, apellido, email, telefono, contrasena, ciudad)
VALUES ('$nombre', '$apellido', '$dni', '$telefono', '$email', '$contrasena')";

if (mysqli_query($conn, $sql)) {
  echo "inserción exitosa";
} else {
  echo "error en la insercion: " . mysqli_error($conn);
}

mysqli_close($conn);*/

?>