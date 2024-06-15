<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "spa_sweethands"; 

// Mensaje de estado inicial
$status = "";

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $dni = $_POST["dni"];
    $direccion = $_POST["direccion"];
    
   
    $conn = new mysqli($servername, $username, $password, $database);

    
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    
    $sql = "INSERT INTO especialista (nombre, apellido, dni, direccion) VALUES ('$nombre', '$apellido', '$dni', '$direccion')";

    if ($conn->query($sql) === TRUE) {
        $status = "Nuevo especialista agregado exitosamente";

    } else {
        $status = "Error al agregar el especialista: " . $conn->error;
    }

  
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Especialista</title>
    <h1>Agregar Especialista</h1>
    <style>
        .status {
            color: green;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php
    // Mostrar mensaje de estado
    if ($status !== "") {
        echo '<p class="' . ($status === "Nuevo especialista agregado exitosamente" ? "status" : "error") . '">' . $status . '</p>';
    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellido">Apellido:</label><br>
        <input type="text" id="apellido" name="apellido" required><br><br>

        <label for="dni">DNI:</label><br>
        <input type="text" id="dni" name="dni" required><br><br>

        <label for="direccion">Dirección:</label><br>
        <input type="text" id="direccion" name="direccion" required><br><br>

        <input type="submit" value="Agregar Especialista">
    </form>
</body>
</html>