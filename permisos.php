<?php
session_start();

// Si está autenticado, redirigir a bienvenida, es una protección para que un usuario logueado no entre en esta página
if (isset($_SESSION['usuario'])) {
    header("Location: bienvenida.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Denegado</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Acceso Denegado</h2>
        
        <div class="warning">
            <p><strong>No tienes permisos para acceder a esta página.</strong></p>
            <p>Debes iniciar sesión para continuar.</p>
        </div>
        
        <a href="login.php">
            <button>Ir al Login</button>
        </a>
    </div>
</body>
</html>