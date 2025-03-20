<?php
require_once '../../../model/database/connection.php'; // Asegúrate de que la ruta sea correcta

$messageId = intval($_GET['id']); // Convertir a entero por seguridad

// Conectar a la base de datos
$pdo = conectarDB();

// Obtener el mensaje de la base de datos
$sql = "SELECT * FROM mensajes_camptrack WHERE id = :messageId AND destinatarios = :userName";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':messageId', $messageId, PDO::PARAM_INT);
$stmt->bindParam(':userName', $userName, PDO::PARAM_STR);
$stmt->execute();
$message = $stmt->fetch(PDO::FETCH_ASSOC);

// Si el mensaje no existe o no pertenece al usuario, mostrar error
if (!$message) {
    die("No tienes permiso para ver este mensaje.");
}

// Marcar el mensaje como leído
$updateSql = "UPDATE mensajes_camptrack SET leido = 1 WHERE id = :messageId";
$updateStmt = $pdo->prepare($updateSql);
$updateStmt->bindParam(':messageId', $messageId, PDO::PARAM_INT);
$updateStmt->execute();

// Variables para la vista
$asunto = htmlspecialchars($message['asunto']);
$remitente = htmlspecialchars($message['remitente']);
$fecha = date('d/m/Y', strtotime($message['fecha_envio']));
$hora = date('H:i', strtotime($message['hora_envio']));
$mensaje = nl2br(htmlspecialchars($message['mensaje'])); // nl2br para mantener los saltos de línea
?>


<div class="bg-gray-100 p-6">
    <div class=" bg-white shadow-md p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-semibold text-gray-700">Detalle del mensaje</h1>
            <button onclick="window.history.back()" class="bg-blue-500 text-white px-4 py-2 text-sm flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>Volver
            </button>
        </div>

        <div class="border p-4 bg-gray-50 text-sm text-gray-700">
            <div class="flex justify-end space-x-2 mb-4">
                <button class="bg-white border border-gray-300 px-3 py-1 text-sm flex items-center"><i class="fas fa-reply mr-2"></i>Responder</button>
                <button class="bg-white border border-gray-300 px-3 py-1 text-sm flex items-center"><i class="fas fa-envelope-open-text mr-2"></i>Marcar como no leído</button>
                <button class="bg-white border border-gray-300 px-3 py-1 text-sm flex items-center"><i class="fas fa-trash-alt mr-2"></i>Enviar a la papelera</button>
            </div>
            <p><span class="font-semibold">Asunto:</span> <span class="font-bold"><?php echo $asunto; ?></span></p>
            <p><span class="font-semibold">De:</span> <i class="fas fa-user mr-1"></i> <?php echo $remitente; ?></p>
            <p><span class="font-semibold">Fecha:</span> <?php echo $fecha; ?> a las <?php echo $hora; ?></p>
            <div class="border-t mt-4 pt-4">
                <?php echo $mensaje; ?>
            </div>
        </div>
    </div>
</div>

