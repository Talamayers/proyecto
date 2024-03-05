<?php
// Verifica si se ha enviado un formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si se han recibido los datos necesarios
    if (isset($_POST["id_cita"]) && isset($_POST["accion"])) {
        // Recupera los datos del formulario
        $id_cita = $_POST["id_cita"];
        $accion = $_POST["accion"];

        // Realiza la conexión a la base de datos (incluye este código según tu configuración)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "prueba1";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica si la conexión fue exitosa
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Actualiza el estado de la cita según la acción seleccionada
        if ($accion == "confirmar") {
            // Aquí puedes realizar cualquier acción adicional cuando se confirma la cita
            // Por ejemplo, puedes enviar la información al historial clínico
            // Simplemente agregué un mensaje de ejemplo aquí
            echo "La cita con ID $id_cita ha sido confirmada.";
        } elseif ($accion == "cancelar") {
            // Aquí puedes realizar cualquier acción adicional cuando se cancela la cita
            // Simplemente agregué un mensaje de ejemplo aquí
            echo "La cita con ID $id_cita ha sido cancelada.";
        }

        // Actualiza el estado de la cita en la base de datos
        $sql = "UPDATE citas SET Estado = '$accion' WHERE ID_Cita = $id_cita";

        if ($conn->query($sql) === TRUE) {
            echo "Estado de la cita actualizado correctamente.";
        } else {
            echo "Error al actualizar el estado de la cita: " . $conn->error;
        }

        // Cierra la conexión a la base de datos
        $conn->close();
    } else {
        // Si no se reciben los datos necesarios, muestra un mensaje de error
        echo "Error: Falta información en el formulario.";
    }
} else {
    // Si no se ha enviado un formulario, redirige al usuario a la página anterior o muestra un mensaje de error
    echo "Error: No se ha enviado un formulario.";
}
?>
