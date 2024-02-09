<?php
// Iniciar sesión si no está iniciada
session_start();

// Eliminar todas las variables de sesión
$_SESSION = array();

// Destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión
header("Location: ../html/login.html");
exit;
?>