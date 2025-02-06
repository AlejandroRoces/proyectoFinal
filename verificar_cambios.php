<?php
require_once "model/database/connection.php";

$conexion = conectarDB();
$query = "SELECT MAX(updated_at) as last_update FROM configuracion_camptrack";
$result = $conexion->query($query);
$row = $result->fetch(PDO::FETCH_ASSOC);

session_start();
if (!isset($_SESSION['last_update'])) {
    $_SESSION['last_update'] = $row['last_update'];
}

if ($_SESSION['last_update'] != $row['last_update']) {
    $_SESSION['last_update'] = $row['last_update'];
    echo "1"; // Indica que hay cambios
} else {
    echo "0"; // No hay cambios
}
?>
