<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if(isset($_POST['correo']) && isset($_POST['contrasena'])) {
    // Recibir datos del formulario de inicio de sesión 
    $correo = $_POST['correo'];
    $contraseña = $_POST['contrasena'];

    
}


// Eliminar todas las variables de sesión
$_SESSION = array();

session_unset();

session_destroy();

// Redirigir a la página de inicio de sesión 
header("location: index.html");
exit;
?>