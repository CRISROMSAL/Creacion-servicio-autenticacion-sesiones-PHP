<?php
session_start(); //Recupera la info de la sesión que se guardó en login.php, sin esto no podria acceder a $_SESSION['nombre']


if (!isset($_SESSION['nombre'])) { //Si no existe el nombre de este usuario
    header("Location: permisos.php"); //redirige al usuario a la pagina de permisos(no tiene permiso para entrar en esta sin login)
    exit(); //Detiene la ejecución del codigo
}

// Verificar si se quiere cerrar sesión
if (isset($_GET['logout'])) { //Si en la URL aparece ?logout=true
    session_destroy(); //destruye toda la sesion
    header("Location: login.php"); //redirige al login porque ya no estaría logueado
    exit();
}

// Obtener datos del usuario
$usuario = $_SESSION['nombre'];
$hora_actual = date('H:i:s');
$fecha_actual = date('d/m/Y');

// Mensaje personalizado según el usuario
$mensajes = [
    "admin" => "Bienvenido administrador, aquí tienes acceso al sistema.",
    "usuario" => "Bienvenido usuario, aquí puedes encontrar la información que necesites.",
    "DAW2" => "Bienvenido usuario de segundo de desarrollo de aplicaciones web, aquí puedes encontrar la información que necesites.",
    "CristinaRoman" => "Bienvenida Cristina Román, aquí puedes encontrar la información que necesites."
];

$mensaje_bienvenida = $mensajes[$nombreUsuario] ?? "Bienvenido al sistema."; //mensaje que se le pondría a un usuario que esté logueado pero no esté en array de mensajes
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>¡Bienvenido!</h2>
        
        <div class="mensaje">
            <h3>Información del usuario:</h3>
            <p><strong>Usuario:</strong> <?php echo $usuario; ?></p>
            <p><strong>Fecha:</strong> <?php echo $fecha_actual; ?></p>
            <p><strong>Hora actual:</strong> <?php echo $hora_actual; ?></p>
        </div>
        
        <div class="mensaje">
            <p><?php echo $mensaje_personalizado; ?></p>
        </div>
        
        <a href="bienvenida.php?logout=true">
            <button class="btn-logout">Cerrar Sesión</button>
        </a>
    </div>
</body>
</html>