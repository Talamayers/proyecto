<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$sql = "SELECT c.ID_Cita, c.Fecha, c.Hora, c.Estado, CONCAT(CONCAT(p.Nombre, ' '), p.Apellido) AS Nombre_Paciente, CONCAT(CONCAT(pc.Nombre, ' '),pc.Apellido) AS Nombre_Personal FROM  citas c JOIN  pacientes p ON c.ID_Paciente = p.ID_Paciente JOIN  personal_clinica pc ON c.ID_Personal = pc.ID_Personal where c.Estado='Pendiente'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Comienzas la tabla HTML
    echo "<table border='1'>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Medico</th>
                <th>Paciente</th>
                <th>Estado</th>
            </tr>";

    while($row = $result->fetch_assoc()) {
        // Empiezas una nueva fila de la tabla y muestras los datos de cada cita
        echo "<tr>";
        echo "<td>" . $row["Fecha"] . "</td>";
        echo "<td>" . $row["Hora"] . "</td>";
        echo "<td>" . $row["Nombre_Personal"] . "</td>";
        echo "<td>" . $row["Nombre_Paciente"] . "</td>";
        echo "<form action='confirmar.php' method='post'>";
        echo "<input type='hidden' name='id_cita' value='" . $row["ID_Cita"] . "'>";
        echo "<td>
        <select name='accion'>
        <option value='confirmar'>Confirmar</option>
        <option value='cancelar'>Cancelar</option>
        </select>
        <button type='submit'>Enviar</button>
        </td>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }

    // Cierras la tabla HTML
    echo "</table>";
    
} else {
    // Si no hay resultados, imprimes un mensaje indicando que no hay citas
    echo "No se encontraron citas.";
}
?>
 "<style>";

body {
    background-color: #0056b3; /* Color de fondo de la página */
}

table {
    margin: 0 auto; /* Centra la tabla horizontalmente en la página */
    border-collapse: collapse;
    width: 80%; /* Ancho de la tabla */
    background-color: #fff; /* Color de fondo de la tabla */
    border-radius: 10px; /* Borde redondeado de la tabla */
    overflow: hidden; /* Oculta el contenido que se desborde */
}

th, td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: #0056b3; /* Color de fondo del encabezado (azul oscuro) */
    color: #fff; /* Color del texto del encabezado */
}

tr:nth-child(odd) {
    background-color: #fff; /* Color de fondo de filas impares (blanco) */
}



td {
    border: 1px solid #dddddd;
}

