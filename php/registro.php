<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario";

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
    $contrasena = password_hash(validarDatos($_POST["password"]), PASSWORD_DEFAULT);
    $rol = $_POST["rol"];


    $verificar_usuario = $conn->prepare("SELECT usuario FROM usuarios WHERE usuario = ?");
    $verificar_usuario->bind_param("s", $usuario);
    $verificar_usuario->execute();
    $verificar_usuario->store_result();

    if ($verificar_usuario->num_rows > 0) {
        echo "El nombre de usuario ya está en uso. Por favor, elige otro.";
    } else {
        
        $stmt = $conn->prepare("INSERT INTO usuarios (usuario, contrasena,rol) VALUES (?, ?,?)");
        $stmt->bind_param("ssi", $usuario, $contrasena, $rol);

        if ($stmt->execute()) {
            echo "Registro exitoso. ¡Ahora puedes iniciar sesión!";
           
            header("Location: ../html/login.html");
            exit(); 
        } else {
            echo "Error al registrar: " . $stmt->error;
        }

       
        $stmt->close();
    }

  
    $verificar_usuario->close();
}


$conn->close();

