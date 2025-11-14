<?php
session_start(); //para iniciar o recuperar la sesión de usuario

// Array de usuarios válidos
$usuarios = [
    "admin" => "1234",
    "usuario" => "abcd",
    "DAW2" => "DAW2",
    "CristinaRoman" => "CristinaRoman"
];

// Si ya está logueado, redirigir a bienvenida, es decir, comprueba si este la variable de sesion 'usuario' 
if (isset($_SESSION['nombre'])) {  //Si hay un usuario logueado
    header("Location: bienvenida.php"); //se envia a bienvenida.php
    exit(); //Detiene la ejecucion del script despues de redirigirla
}

$error = ""; //variable para guardar mensajes de error

// Procesar el formulario cuando se envía
if ($_SERVER['REQUEST_METHOD'] == 'POST') { //verifica que el formulario ha sido enviado
    $nombreUsuario = $_POST['nombreusuario'] ?? ''; //obtiene el nombre de usuario del formulario
    $contraseña = $_POST['contraseña'] ?? ''; //obtiene la contraseña del formulario
    
    // Validar credenciales
    if (isset($usuarios[$nombreUsuario]) && $usuarios[$nombreUsuario] === $contraseña) { //Comprueba si el usuario existe en el array y si la contraseña coincide
        // Credenciales correctas
        $_SESSION['nombre'] = $nombreUsuario; //Si es correcto guarda el usuario en $_SESSION['nombre']
        header("Location: bienvenida.php"); // y redirige a bienvenida
        exit();
    } else {
        // Credenciales incorrectas
        $error = "Usuario o contraseña incorrectos"; //Si es incorrecto guarda el mensaje de error
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div class="logo"></div>
        <h2>Re·Cordis</h2>
        <p>Inicia sesión para acceder a tu cuenta</p>
        <form method="POST" action="">
            <input type="text" name="nombreusuario" placeholder="Nombre de usuario" required>
            <input type="password" name="contraseña" placeholder="Contraseña" required>
            <button type="submit">Entrar</button>
        </form>
        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <p class="info-text">
             Instagram: re.cordistudio<br>
             Contacto: recordistudio@gmail.com<br>
             Envíos a toda España<br>
            Gracias por visitar Re·Cordis. Si tienes alguna pregunta, no dudes en contactarnos.
        </p>
    </div>
</body>
</html>