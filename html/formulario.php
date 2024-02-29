<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/formularios.css">
    <title>Panel de Administrador</title>
</head>
<body>
    <header>
        <div class="header-letf">
            <img src="../imagenes/logodentisaludheader-1.svg" alt="" class="diente">
        </div>
        <div class="header-right">
            <a href="https://www.xvideos.com/">
                <img src="../imagenes/instagram.png" alt="">
            </a>
            <a href="https://www.xvideos.com/">
                <img src="../imagenes/twiter.png" alt="">
            </a>
            <a href="https://www.xvideos.com/">
                <img src="../imagenes/tiktok.png" alt="">
            </a>
            <a href="https://www.xvideos.com/">
                <img src="../imagenes/facebook.png" alt="">
            </a>
            <a href="https://www.xvideos.com/">
                <img src="../imagenes/yotube.png" alt="">
            </a>

        </div>
    </header>
    <nav>
        <div id="cabeza">

            <ul class="menu">
                <li><a href="../html/pacientes.html">Gestionar Pacientes</a>
                </li>

                <li><a href="../html/agendar.php">Gestionar Citas</a>

                </li>
                <li><a href="../html/personal.html">Gestionar personal</a>

                </li>
                <li><a href="">Gestionar ofertas y servicios</a></li>
                <li><a href="../php/citas.php">Citas Agendadas </a></li>
                <li><a href="../php/logout.php">Cerrar sesión</a></li>
                
            </ul>
        </div>
    </nav>
    <?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba1";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$query = "SELECT * FROM pacientes";
$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) > 0) {

    echo "<div class='container'>";
    echo "<h1>Listado de Pacientes</h1>";
    echo "<table class='pacientes'>";
    echo "<tr><th>Nombre</th><th>Apellido</th><th>Cédula</th><th>Edad</th><th>Correo Electrónico</th></tr>";
    
    
    
   
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
       
        echo "<td>".(isset($row['Nombre']) ? $row['Nombre'] : '')."</td>";
        echo "<td>".(isset($row['Apellido']) ? $row['Apellido'] : '')."</td>";
        echo "<td>".(isset($row['cedula']) ? $row['cedula'] : '')."</td>";
        echo "<td>".(isset($row['edad']) ? $row['edad'] : '')."</td>";
        echo "<td>".(isset($row['correo']) ? $row['correo'] : '')."</td>";
        echo "<td><button class='button' data-id='".$row['ID_Paciente']."'>Ver</button></td>";
        echo "</tr>";
    }
    
    echo "</table>";
    echo "</div>";
} else {
    echo "No se encontraron pacientes registrados.";
}

// Cerrar la conexión
mysqli_close($conn);
?>


    
</body>
</html>
