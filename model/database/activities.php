<?php
include 'connection.php';


// Conectar a la base de datos
$conexion = conectarDB();

// Consulta SQL para obtener las actividades
$sql = "SELECT * FROM actividades_camptrack";
$stmt = $conexion->prepare($sql);
$stmt->execute();

// Recuperar los datos de las actividades
$actividades = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
