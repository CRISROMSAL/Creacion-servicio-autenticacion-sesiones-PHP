<?php
session_start(); //para iniciar o recuperar la sesión de usuario

// Array de usuarios válidos
$usuarios = [
    "admin" => "1234",
    "usuario" => "abcd",
    "DAW2" => "DAW2"
    "CristinaRoman" => "CristinaRoman"
];

// Si ya está logueado, redirigir a bienvenida, es decir, comprueba si este la variable de sesion 'usuario' 
if (isset($_SESSION['usuario'])) {
    header("Location: bienvenida.php"); //Si existe se envia a bienvenida.php
    exit(); //Detiene la ejecucion del script despues de redirigirla
}

$error = ""; //variable para guardar mensajes de error

// Procesar el formulario cuando se envía
if ($_SERVER['REQUEST_METHOD'] == 'POST') { //verifica que el formulario ha sido enviado
    $username = $_POST['username'] ?? ''; //obtiene el nombre de usuario del formulario
    $password = $_POST['password'] ?? ''; //obtiene la contraseña del formulario
    
    // Validar credenciales
    if (isset($usuarios[$username]) && $usuarios[$username] === $password) {
        // Credenciales correctas
        $_SESSION['usuario'] = $username;
        header("Location: bienvenida.php");
        exit();
    } else {
        // Credenciales incorrectas
        $error = "Usuario o contraseña incorrectos";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Autenticación</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Nombre de usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Entrar</button>
        </form>
        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>