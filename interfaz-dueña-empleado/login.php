<?php

$conexion = new mysqli("localhost", "root", "", "spa_sweethands");


if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}


$correo = $_POST['correo'];
$contraseña = $_POST['contrasena'];


$sql = "SELECT * FROM usuario_especialista WHERE correo = '$correo' AND contrasena = '$contraseña'";
$resultado = $conexion->query($sql);

if(isset($_POST['correo']) && isset($_POST['contrasena'])) {
    
    $correo = $_POST['correo'];
    $contraseña = $_POST['contrasena'];

    
}


if ($resultado->num_rows == 1) {
    // Inicio de sesión exitoso
    $fila_usuario = $resultado->fetch_assoc();
    $id_rol = $fila_usuario['id_rol'];

    // Obtener el rol del usuario
    $sql_rol = "SELECT nombre FROM roles WHERE id_rol = $id_rol";
    $resultado_rol = $conexion->query($sql_rol);

    if ($resultado_rol->num_rows == 1) {
        $fila_rol = $resultado_rol->fetch_assoc();
        $rol_usuario = $fila_rol['nombre'];
        

        // Aquí que hacer el rol del usuario
        switch ($rol_usuario) {
            case 'Duena':
                header("Location: inicio-admi.php");
                break;
            case 'Usuario':
                header("Location: usuario.php");
                break;
            default:
                echo "Rol de usuario desconocido";
                break;
        }
        
    }else {
        echo "Error al obtener el rol del usuario";
    }
} else {
   
    echo "Correo o contraseña incorrectos";
}


$conexion->close();
?>


