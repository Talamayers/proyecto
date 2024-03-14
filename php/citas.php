<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$sql = "SELECT c.ID_Cita, c.Fecha, c.Hora, c.ID_Paciente,c.Estado, CONCAT(CONCAT(p.Nombre, ' '), p.Apellido) AS Nombre_Paciente, CONCAT(CONCAT(pc.Nombre, ' '),pc.Apellido) AS Nombre_Personal FROM  citas c JOIN  pacientes p ON c.ID_Paciente = p.ID_Paciente JOIN  personal_clinica pc ON c.ID_Personal = pc.ID_Personal where c.Estado='Pendiente'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Comienzas la tabla HTML
    echo "<table border='1'>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Medico</th>
                <th>Paciente</th>
                <th>Descripcion</th>
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
        echo "<td><input type='text' name='descripcion'></td>";
        echo "<input type='hidden' name='id_cita' value='" . $row["ID_Cita"] . "'>";
        echo "<input type='hidden' name='ID_Paciente' value='" . $row["ID_Paciente"] . "'>";
        echo "<input type='hidden' name='Fecha' value='" . $row["Fecha"] . "'>";
        echo "<td>
        <select name='accion'>
        <option value='confirmar'>Confirmar</option>
        <option value='cancelar'>Cancelar</option>
        </select>
        <button type='submit'>Enviar</button>
        </td>";
        echo "</form>";
        echo "</tr>";
    }

    // Cierras la tabla HTML
    echo "</table>";
    
} else {
    // Si no hay resultados, imprime un mensaje indicando que no hay citas
    echo "No se encontraron citas.";
}
?>
 "<style>";

body {
    background-color: #0056b3; /* Color de fondo de la página */
}

table {
    margin: 0 auto;
    border-collapse: collapse;
    width: 80%; 
    background-color: #fff; 
    border-radius: 10px; 
    overflow: hidden; 
}

th, td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: #0056b3; 
    color: #fff; 
}

tr:nth-child(odd) {
    background-color: #fff; 
}



td {
    border: 1px solid #dddddd;
}

