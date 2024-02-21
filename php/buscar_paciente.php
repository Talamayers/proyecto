<?php
$servername = "localhost"; // Cambia esto si tu servidor MySQL está en otro lugar
$username = "root";
$password = "";
$database = "prueba1";


if (isset($_POST["paciente"])) {
    $paciente = $_POST["paciente"];

  
    $sql = "SELECT nombre FROM pacientes WHERE nombre LIKE ?";
    $stmt = $conn->prepare($sql);
    $paciente_like = "%" . $paciente . "%";
    $stmt->bind_param("s", $paciente_like);
    $stmt->execute();
    $result = $stmt->get_result();

    // Construir opciones de sugerencias
    $sugerencias = "";
    while ($row = $result->fetch_assoc()) {
        $sugerencias .= "<option value='" . $row["nombre"] . "'>" . $row["nombre"] . "</option>";
    }

    // Devolver las sugerencias como opciones
    echo $sugerencias;
}
?>
