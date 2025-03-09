<?php
require_once 'connection.php'; // Verifica que la ruta es correcta


header('Content-Type: application/json');

if (isset($_POST['instalacion'])) {
    $instalacion = $_POST['instalacion'];

    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    if ($conn->connect_error) {
        die(json_encode(['success' => false, 'error' => 'Error de conexión a la base de datos: ' . $conn->connect_error]));
    }

    $stmt = $conn->prepare("SELECT aforo, num_habitaciones FROM instalaciones_camptrack WHERE nombre = ?");
    $stmt->bind_param("s", $instalacion);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        echo json_encode([
            'success' => true,
            'aforo' => $row['aforo'],
            'num_habitaciones' => $row['num_habitaciones']
        ]);
    } else {
        echo json_encode(['success' => false, 'error' => 'No se encontró la instalación']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'error' => 'No se recibió la instalación']);
}
?>
