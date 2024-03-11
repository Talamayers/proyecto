<?php


$servername = "localhost"; 
$username = "root";
$password = "";
$database = "prueba1";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $nombre = htmlspecialchars($_POST["nombre"]);
    $apellido = htmlspecialchars($_POST["apellido"]);

    
    $sql = "INSERT INTO personal_clinica (Nombre, Apellido) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

   
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conn->error);
    }

    $stmt->bind_param("ss", $nombre, $apellido);

   
    if ($stmt->execute()) {
        echo "Personal médico agregado correctamente.";
        header("Location: ../html/formulario.php");
    } else {
        echo "Error al agregar personal médico: " . $stmt->error;
    }

   
    $stmt->close();
    $conn->close();
}
?>
