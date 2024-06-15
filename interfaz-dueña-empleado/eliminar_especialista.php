<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "spa_sweethands"; 


$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el ID del especialista a eliminar
if(isset($_GET['id'])) {
    $id_especialista = $_GET['id'];

    
    $sql = "DELETE FROM especialista WHERE id_especialista = $id_especialista";

    if ($conn->query($sql) === TRUE) {
        // Si la eliminación fue exitosa
        http_response_code(200);
        exit(); 
    } else {
        // Si hubo un error al eliminar al especialista
        http_response_code(500);
        exit();
    }
} else {
    // Si no se proporcionó un ID de especialista
    http_response_code(400);
    exit(); }


$conn->close();
?>
