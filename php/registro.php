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


// ... (código anterior)

// Procesar el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $usuario = validarDatos($_POST["usuario"]);
    $contrasena = password_hash(validarDatos($_POST["password"]), PASSWORD_DEFAULT);
    $rol = $_POST["rol"];

    // Verificar si el usuario ya existe
    $verificar_usuario = $conn->prepare("SELECT usuario FROM usuarios WHERE usuario = ?");
    $verificar_usuario->bind_param("s", $usuario);
    $verificar_usuario->execute();
    $verificar_usuario->store_result();

    if ($verificar_usuario->num_rows > 0) {
        echo "El nombre de usuario ya está en uso. Por favor, elige otro.";
    } else {
        // Insertar datos en la tabla de usuarios usando consulta preparada
        $stmt = $conn->prepare("INSERT INTO usuarios (usuario, contrasena,rol) VALUES (?, ?,?)");
        $stmt->bind_param("ssi", $usuario, $contrasena, $rol);

        if ($stmt->execute()) {
            echo "Registro exitoso. ¡Ahora puedes iniciar sesión!";
            // Redirigir al usuario a login.html después de 2 segundos
            header("Location: ../html/login.html");
            exit(); // Asegurar que no se procesen más instrucciones después de la redirección
        } else {
            echo "Error al registrar: " . $stmt->error;
        }

        // Cerrar la consulta preparada
        $stmt->close();
    }

    // Cerrar la consulta preparada
    $verificar_usuario->close();
}

// Cerrar la conexión
$conn->close();

