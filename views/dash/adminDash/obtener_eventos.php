<?php
header("Content-Type: application/json");
require_once "../../../model/database/connection.php";

$colores = [
    "Colonia San Jose" => "#FF5733",
    "Campamento Juvenil" => "#33FF57",
    "Albergue Juvenil" => "#3357FF",
    "Campus Turistico" => "#FF33A1",
    "Albergue Maristas" => "#F3FF33",
    "Santibañez de Vidriales" => "#A133FF"
];

try {
    $conexion = conectarDB();
    $sql = "SELECT id, instalacion, DATE(fecha_inicio) AS fecha_inicio, DATE(fecha_fin) AS fecha_fin, motivo 
            FROM reservasInstalaciones_camptrack";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($reservas as &$reserva) {
        $reserva["color"] = $colores[$reserva["instalacion"]] ?? "#000000"; // Color por defecto si no está en la lista
    }

    // Limpiar buffer de salida antes de enviar JSON
    ob_end_clean();
    echo json_encode($reservas, JSON_UNESCAPED_UNICODE);
} catch (PDOException $e) {
    echo json_encode(["error" => "Error al obtener reservas: " . $e->getMessage()]);
}
