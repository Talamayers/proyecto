<?php
// Aquí iría la conexión a la base de datos
$servername = "localhost"; // Cambia esto si tu servidor MySQL está en otro lugar
$username = "root";
$password = "";
$database = "prueba1";

if (isset($_POST["paciente"])) {
    $paciente = $_POST["paciente"];

    // Realizar la consulta para buscar pacientes que coincidan con el valor proporcionado
    $sql = "SELECT nombre FROM pacientes WHERE nombre LIKE ?";
    $stmt = $conn->prepare($sql);
    $paciente_like = "%" . $paciente . "%";
    $stmt->bind_param("s", $paciente_like);
    $stmt->execute();
    $result = $stmt->get_result();

    // Construir un array con los resultados
    $sugerencias = array();
    while ($row = $result->fetch_assoc()) {
        $sugerencias[] = $row["nombre"];
    }

    // Devolver los resultados como JSON
    echo json_encode($sugerencias);
}
?>
