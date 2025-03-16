<?php
require_once '../../../model/database/connection.php';

try {
    $conexion = conectarDB();

    // Consulta para obtener las reservas ordenadas
    $sql = "SELECT id, instalacion, fecha_inicio, fecha_fin, motivo 
            FROM reservasInstalaciones_camptrack 
            ORDER BY instalacion, fecha_inicio";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Agrupar reservas por instalación
    $instalaciones = [];
    foreach ($reservas as $reserva) {
        $instalaciones[$reserva['instalacion']][] = $reserva;
    }
} catch (PDOException $e) {
    error_log("Error al obtener los datos: " . $e->getMessage());
    $error = "No se pudieron obtener las reservas. Inténtelo más tarde.";
}
?>