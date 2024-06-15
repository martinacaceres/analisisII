<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "spa_sweethands"; 


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el ID del especialista de la URL
if(isset($_GET['id'])) {
    $id_especialista = $_GET['id'];
    
    
    $sql = "SELECT * FROM especialista WHERE id_especialista = $id_especialista";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Mostrar el formulario de edición con los detalles del especialista
        echo '
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Especialista</title>
        </head>
        <body>
            <h1>Editar Especialista</h1>
            <form action="editar_especialista.php?id=' . $id_especialista . '" method="post">
                <label for="nombre">Nombre:</label><br>
                <input type="text" id="nombre" name="nombre" value="' . $row['nombre'] . '"><br>

                <label for="apellido">Apellido:</label><br>
                <input type="text" id="apellido" name="apellido" value="' . $row['apellido'] . '"><br>

                <label for="dni">DNI:</label><br>
                <input type="text" id="dni" name="dni" value="' . $row['dni'] . '"><br>

                <label for="direccion">Dirección:</label><br>
                <input type="text" id="direccion" name="direccion" value="' . $row['direccion'] . '"><br>

                <input type="submit" value="Guardar cambios">
            </form>
        </body>
        </html>';

        // Después de procesar la edición cuando se envía el formulario
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $dni = $_POST['dni'];
            $direccion = $_POST['direccion'];
            
            // Actualizar los detalles del especialista en la base de datos
            $sql = "UPDATE especialista SET nombre = '$nombre', apellido = '$apellido', dni = '$dni', direccion = '$direccion' WHERE id_especialista = $id_especialista";
            
            if ($conn->query($sql) === TRUE) {
                // Redireccionar al usuario de vuelta a la página de lista de especialistas con un mensaje de confirmación
                header("Location: inicio-admi.php?editado=true");
                exit(); 
            } else {
                echo "Error al actualizar el especialista: " . $conn->error;
            }
        }
    } else {
        echo "Especialista no encontrado";
    }
} else {
    echo "ID de especialista no proporcionado";
}


$conn->close();
?>