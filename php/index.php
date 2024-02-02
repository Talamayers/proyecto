<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos del formulario
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$numero = $_POST['numero'];
$tipoDocumento = $_POST['tipoDocumento'];
$numeroDocumento = $_POST['numeroDocumento'];
$servicioOdontologico = $_POST['servicioOdontologico'];
$ciudadContacto = $_POST['ciudadContacto'];
$horarioAtencion = $_POST['horarioAtencion'];

// Insertar datos en la base de datos
$sql = "INSERT INTO tabla_formulario (nombres, apellidos, correo,numero, tipo_documento, numero_documento, servicio_odontologico, ciudad_contacto, horario_atencion)
        VALUES ('$nombres', '$apellidos', '$correo', '$password', '$tipoDocumento', '$numeroDocumento', '$servicioOdontologico', '$ciudadContacto', '$horarioAtencion')";

if ($conn->query($sql) === TRUE) {
    echo "Formulario enviado correctamente";
} else {
    echo "Error al enviar el formulario: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>