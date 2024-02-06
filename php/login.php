<?php
// Conexión a la base de datos (reemplaza con tus propios detalles)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Función para limpiar y validar datos
function validarDatos($datos) {
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

// Procesar el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $usuario = validarDatos($_POST["usuario"]);
    $contrasena = validarDatos($_POST["password"]);

    // Consultar la base de datos para verificar las credenciales
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Usuario encontrado, verificar la contraseña
        $row = $result->fetch_assoc();
        if (password_verify($contrasena, $row["contrasena"])) {
            echo "Inicio de sesión exitoso. ¡Bienvenido!";
            // Puedes redirigir al usuario a otra página aquí si es necesario
 
        } else {
            echo "Contraseña incorrecta. Inténtalo de nuevo.";
        }
    } else {
        echo "Usuario no encontrado. Regístrate si no tienes una cuenta.";
    }
}

// Cerrar la conexión
$conn->close();
?>
