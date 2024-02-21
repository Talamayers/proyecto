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

// Obtener los datos del formulario y limpiarlos
$nombre = htmlspecialchars($_POST['nombre']);
$apellido = htmlspecialchars($_POST['apellido']);
$cedula = htmlspecialchars($_POST['cedula']);
$edad = htmlspecialchars($_POST['edad']);
$correo = htmlspecialchars($_POST['correo']);

// Preparar la consulta SQL para insertar el paciente utilizando sentencias preparadas
$sql = "INSERT INTO pacientes (Nombre, Apellido, cedula, edad, correo) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Vincular parámetros y ejecutar la consulta
$stmt->bind_param("sssis", $nombre, $apellido, $cedula, $edad, $correo);

if ($stmt->execute()) {
    echo "Paciente registrado correctamente";
} else {
    echo "Error al registrar paciente: " . $conn->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>

