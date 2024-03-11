<?php
$servername = "localhost"; 
$username = "root";
$password = "";
$database = "prueba1";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = htmlspecialchars($_POST['nombre']);
$apellido = htmlspecialchars($_POST['apellido']);
$cedula = htmlspecialchars($_POST['cedula']);
$edad = htmlspecialchars($_POST['edad']);
$correo = htmlspecialchars($_POST['correo']);

$sql = "INSERT INTO pacientes (Nombre, Apellido, cedula, edad, correo) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);


$stmt->bind_param("sssis", $nombre, $apellido, $cedula, $edad, $correo);

if ($stmt->execute()) {
    echo "Paciente registrado correctamente";
    header("Location: ../html/formulario.php");
} else {
    echo "Error al registrar paciente: " . $conn->error;
}


$stmt->close();
$conn->close();
?>

