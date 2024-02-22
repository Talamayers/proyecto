<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Citas</title>
    <link rel="stylesheet" href="../css/agendarcita.css">
</head>
<body>

<?php
include('../conexion/conexion.php');

// Obtener personal clínico de la base de datos
$result_personal = $conn->query("SELECT * FROM personal_clinica");
$personal = $result_personal->fetch_all(MYSQLI_ASSOC);

// Obtener pacientes de la base de datos
$result_pacientes = $conn->query("SELECT * FROM pacientes");
$pacientes = $result_pacientes->fetch_all(MYSQLI_ASSOC);

$conn->close();

?>
    <div class="container">
        <h1>Gestión de Citas</h1>
        <form action="../php/procesaecita.php" method="post">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required>
            <label for="hora">Hora:</label>
            <input type="time" id="hora" name="hora" required>

<label for="ID_Paciente">Paciente:</label>
<select name="ID_Paciente" id="ID_Paciente">                         
    <?php foreach ($pacientes as $paciente): ?>
        <option value="<?php echo $paciente['ID_Paciente']; ?>"><?php echo $paciente['Nombre']; ?></option>
    <?php endforeach; ?>
</select>
            
<label for="ID_Personal">Dentista:</label>
<select name="ID_Personal" id="ID_Personal">                         
    <?php foreach ($personal as $persona): ?>
        <option value="<?php echo $persona['ID_Personal']; ?>"><?php echo $persona['Nombre']; ?></option>
    <?php endforeach; ?>
</select>


            <button type="submit">Agendar Cita</button>
            <br>
            <br>
            
            <a href="../html/formulario.php"><button type="button">Volver</button></a>
        </form>
    </div>
</body>
</html>