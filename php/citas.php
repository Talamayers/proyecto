<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$sql = "SELECT c.ID_Cita, c.Fecha, c.Hora, c.Estado, CONCAT(CONCAT(p.Nombre, ' '), p.Apellido) AS Nombre_Paciente, CONCAT(CONCAT(pc.Nombre, ' '),pc.Apellido) AS Nombre_Personal FROM  citas c JOIN  pacientes p ON c.ID_Paciente = p.ID_Paciente JOIN  personal_clinica pc ON c.ID_Personal = pc.ID_Personal";
$result = $conn->query($sql);


if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo  "  " . $row["Nombre_Paciente"] . " " . $row["Nombre_Personal"] . " - Fecha: " . $row["Fecha"] . " - Hora: " . $row["Hora"] . " - Estado: " . $row["Estado"] . "<br>";

        
    }
} else {
    echo "No hay citas agendadas.";
}
$conn->close();
?>
