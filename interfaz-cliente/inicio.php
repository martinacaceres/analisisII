<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["Email"])) {
    // Si el usuario no ha iniciado sesión, redirigirlo al formulario de inicio de sesión
    header("Location: login.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        html {
    --s: 100px; 
    
    --c:#0000 48%,#F8EDD1 0 52%,#0000 0;
    background:
      linear-gradient(-45deg,var(--c)),
      linear-gradient( 45deg,var(--c)),
      repeating-conic-gradient(from 45deg,#e5aef3 0 25%,#e5d0e7 0 50%);
    background-size: var(--s) var(--s);
}
        .btn {
            background-color: #e5aef3;
            border-radius: 8px;
            border-color: black;
            color: black;
        }
        .btn:hover {
            background-color: black;
        }
    </style>
</head>
<body>
    
    
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand">inicio</a>
          <form class="d-flex" role="search"  action="cerrar-sesion.php" method="post">
            <button class="btn btn-outline-success" type="submit" >cerrar sesion</button>
          </form>
        </div>
    </nav>
    <h2>Bienvenido a sweethands</h2>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>