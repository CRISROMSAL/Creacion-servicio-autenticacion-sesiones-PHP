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

// Mensaje bienvenida especifico según el usuario
$mensaje_bienvenida = "¡Bienvenido/a, " . $usuario . "! Gracias por acceder a Re·Cordis, aquí encontraras toda la información que necesitas.";

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
        <div class="logo"></div>
        <h2>¡Bienvenido a Re·Cordis!</h2>
        
        <div class="mensaje">
            <h3>Información del usuario:</h3>
            <p><strong>Usuario:</strong> <?php echo $usuario; ?></p>
            <p><strong>Fecha:</strong> <?php echo $fecha_actual; ?></p>
            <p><strong>Hora actual:</strong> <?php echo $hora_actual; ?></p>
        </div>
        
        <div class="mensaje">
            <p><?php echo $mensaje_bienvenida; ?></p>
        </div>
        
        <a href="bienvenida.php?logout=true">
            <button class="btn-logout">Cerrar Sesión</button>
        </a>

    </div>

    <footer class="footer">
        <p>Instagram: re.cordistudio</p>
        <p>Contacto: recordistudio@gmail.com</p>
        <p>Envíos a toda España</p>
        <p>Gracias por visitar Re·Cordis. Si tienes alguna pregunta, no dudes en contactarnos.</p>
    </footer>
    
</body>
</html>