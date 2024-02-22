<?php
// Obtener las categorías de la base de datos
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