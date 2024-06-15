<?php
session_start();
// Conexión a la base de datos 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "spa_sweethands";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);

}

// Recibe los datos del formulario
$username = $_POST['Email'];
$password = $_POST['Password'];

// Consulta la base de datos para verificar las credenciales
$sql = "SELECT * FROM usuario_cliente WHERE correo = '$username' AND contrasena = '$password'";

$result = $conn->query($sql);

if (!$result) {
    echo "Error al ejecutar la consulta: " . $conn->error;
    exit;
}

if ($result->num_rows == 1) {
    // Las credenciales son correctas, iniciar sesión y redirigir al usuario a la página de inicio
    $_SESSION["Email"] = $username;
    header("Location: inicio.php");
    exit;
} else {
    // Las credenciales son incorrectas, redirigir al usuario al formulario de inicio de sesión con un mensaje de error
    header("Location: index.html");
    exit;
}


$conn->close();
?>