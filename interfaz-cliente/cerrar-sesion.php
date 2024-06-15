<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["Email"])) {
    // Si el usuario no ha iniciado sesión, redirigirlo al formulario de inicio de sesión
    header("Location: index.html");
    exit;
}


// Eliminar todas las variables de sesión
$_SESSION = array();

// Finalizar la sesión
session_destroy();

// Redirigir a la página de inicio de sesión 
header("location: index.html");
exit;
?>