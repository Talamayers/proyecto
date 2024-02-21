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
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$paciente = $_POST['paciente'];


$dentista = $_POST['dentista'];

// Preparar la consulta SQL para insertar la cita
$sql = "INSERT INTO citas (ID_Paciente, ID_Personal, Fecha, Hora, Estado) VALUES (?, ?, ?, ?, 'Pendiente')";
$stmt = $conn->prepare($sql);

// Obtener el ID del dentista seleccionado

// Reemplaza esto con la lógica adecuada para obtener el ID del dentista según tu base de datos

// Vincular parámetros y ejecutar la consulta
$stmt->bind_param("iiss", $paciente, $id_dentista, $fecha, $hora);

if ($stmt->execute()) {
    echo "Cita agendada correctamente";
} else {
    echo "Error al agendar cita: " . $conn->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>

