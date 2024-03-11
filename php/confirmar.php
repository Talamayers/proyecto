<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (isset($_POST["id_cita"]) && isset($_POST["accion"])) {
        
        $id_cita = $_POST["id_cita"];
        $accion = $_POST["accion"];

        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "prueba1";

        $conn = new mysqli($servername, $username, $password, $dbname);

        
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        
        if ($accion == "confirmar") {
            
            echo "La cita con ID $id_cita ha sido confirmada.";
        } elseif ($accion == "cancelar") {
            
            echo "La cita con ID $id_cita ha sido cancelada.";
        }

        
        $sql = "UPDATE citas SET Estado = '$accion' WHERE ID_Cita = $id_cita";

        if ($conn->query($sql) === TRUE) {
            echo "Estado de la cita actualizado correctamente.";
        } else {
            echo "Error al actualizar el estado de la cita: " . $conn->error;
        }

       
        $conn->close();
    } else {
        
        echo "Error: Falta información en el formulario.";
    }
} else {
    
    echo "Error: No se ha enviado un formulario.";
}
?>
