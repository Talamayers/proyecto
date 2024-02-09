<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "formulario";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Query para obtener los formularios de los pacientes ordenados por fecha
$sql = "SELECT * FROM formularios ORDER BY fecha";

// Ejecutar la consulta
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Mostrar los formularios
    while($row = $result->fetch_assoc()) {
        echo '<div class="formulario-item">';
        echo '<h2>' . $row['nombre'] . '</h2>';
        echo '<p>Fecha: ' . $row['fecha'] . '</p>';
        echo '<p>Descripción: ' . $row['descripcion'] . '</p>';
        echo '</div>';
    }
} else {
    // Si no hay resultados, mostrar un mensaje
    echo "No se encontraron formularios";
}

// Cerrar la conexión
$conn->close();
?> 
