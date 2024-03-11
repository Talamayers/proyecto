<?php

$servername = "localhost"; 
$username = "root";
$password = "";
$database = "prueba1";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$paciente = $_POST['ID_Paciente'];
$dentista = $_POST['ID_Personal'];

$sql = "INSERT INTO citas (ID_Paciente, ID_Personal, Fecha, Hora, Estado) VALUES (?, ?, ?, ?, 'Pendiente')";
$stmt = $conn->prepare($sql);




$stmt->bind_param("iiss", $paciente, $dentista, $fecha, $hora);

if ($stmt->execute()) {
    echo "Cita agendada correctamente";
    header("Location: ../html/formulario.php");
} else {
    echo "Error al agendar cita: " . $conn->error;
}

$stmt->close();
$conn->close();
?>

