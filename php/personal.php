<?php

// Datos de conexión a la base de datos
$servername = "localhost"; // Cambia esto si tu servidor MySQL está en otro lugar
$username = "root";
$password = "";
$database = "prueba1";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario y limpiarlos
    $nombre = htmlspecialchars($_POST["nombre"]);
    $apellido = htmlspecialchars($_POST["apellido"]);

    // Preparar la consulta SQL para insertar el personal médico
    $sql = "INSERT INTO personal_clinica (Nombre, Apellido) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    // Verificar si la consulta se preparó correctamente
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conn->error);
    }

    $stmt->bind_param("ss", $nombre, $apellido);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Personal médico agregado correctamente.";
    } else {
        echo "Error al agregar personal médico: " . $stmt->error;
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
}
?>
