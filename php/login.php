<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba1";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


function validarDatos($datos) {
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = validarDatos($_POST["usuario"]);
    $contrasena = validarDatos($_POST["password"]);

    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
   
        $row = $result->fetch_assoc();
        if ($contrasena == $row["contrasena"]) {
            header("Location: ../html/formulario.php");
            exit(); 
        }
    }
          

            
        
        } else {
            echo "Contraseña incorrecta. Inténtalo de nuevo.";
            
        }

    
    



$conn->close();
?>
