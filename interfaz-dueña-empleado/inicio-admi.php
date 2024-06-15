<?php
session_start();


if(isset($_POST['correo']) && isset($_POST['contrasena'])) {
    
    $correo = $_POST['correo'];
    $contraseña = $_POST['contrasena'];

   
}




$servername = "localhost";
$username = "root";
$password = ""; 
$database = "spa_sweethands"; 


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


$sql = "SELECT * FROM especialista";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo '
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Especialistas</title>
        <h1>Lista de Especialistas</h1>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #D29BFD;
            }
            .btn {
                padding: 5px 10px;
                border: none;
                cursor: pointer;
            }
            .btn-editar {
                background-color: #4CAF50;
                color: white;
            }
            .btn-eliminar {
                background-color: #f44336;
                color: white;
            }
        </style>
    </head>
    <body>
    <button class="btn" onclick="agregarEspecialista()">Agregar Especialista</button>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>';
        // Imprimir los datos de cada fila en forma de tabla
        while($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["nombre"] . '</td>';
            echo '<td>' . $row["apellido"] . '</td>';
            echo '<td>' . $row["dni"] . '</td>';
            echo '<td>' . $row["direccion"] . '</td>';
            echo '<td>
            <button class="btn btn-editar" onclick="editarEspecialista(' . $row["id_especialista"] . ')">Editar</button>
            <button class="btn btn-eliminar" onclick="confirmarEliminar(' . $row["id_especialista"] . ')">Eliminar</button>

    
                </td>';
            echo '</tr>';
        }
        echo '
        </table>

        <script>
            function editarEspecialista(id) {
                // Redirigir a la página de edición con el ID del especialista
                window.location.href = "editar_especialista.php?id=" + id;
            }
            
            function eliminarEspecialista(id) {
                console.log("Eliminar especialista con ID: " + id);
            }
        </script>
        <script>
    function confirmarEliminar(id) {
        if (confirm("¿Estás seguro de que deseas eliminar a este especialista?")) {
            eliminarEspecialista(id);
        }
    }

    function eliminarEspecialista(id) {
        // Enviar una solicitud AJAX para eliminar al especialista
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Recargar la página después de eliminar al especialista
                window.location.reload();
            }
        };
        xhttp.open("GET", "eliminar_especialista.php?id=" + id, true);
        xhttp.send();
    }
</script>
    <script>
    function agregarEspecialista() {
        // Redirigir a la página de agregar especialista
        window.location.href = "agregar_especialista.php";
    }
    </script>
    </body>
    </html>';
} else {
    echo "No se encontraron especialistas";
}


$conn->close();
?>
