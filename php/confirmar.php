<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (isset($_POST["id_cita"]) && isset($_POST["accion"])) {
        
        $id_cita = $_POST["id_cita"];
        $accion = $_POST["accion"];
        $ID_Paciente = $_POST["ID_Paciente"];
        
        $Fecha = $_POST["Fecha"];


        $descripcion = $_POST["descripcion"];

                 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "prueba1";


        $conexion = mysqli_connect($servername, $username, $password, $dbname) or
        die("Problemas con la conexión");

        $conn = mysqli_connect($servername, $username, $password, $dbname) or
        die("Problemas con la conexión");

              
        if ($accion == "confirmar") {

            mysqli_query($conexion, "INSERT INTO historiales_clinicos(ID_Paciente,Fecha_creacion,Descripcion) VALUES 
            ('$_REQUEST[ID_Paciente]','$_REQUEST[Fecha]','$_REQUEST[descripcion]')")
            or die("Problemas en el select" . mysqli_error($conexion));

            mysqli_close($conexion);
            echo "La cita con ID $id_cita Se registro.";
            
    





            
           
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
        echo "id cita es: "+ $id_cita+"accion es: "+ $accion;
    }
} else {
    
    echo "Error: No se ha enviado un formulario.";
}
?>
