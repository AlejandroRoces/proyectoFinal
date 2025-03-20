<?php
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['user'])) {
    header("Location: ../../login.php");
    exit();
}

// Obtener el nombre de usuario desde la sesión
$userName = $_SESSION['user'];
// Incluir el archivo de conexión
require_once 'database/connection.php';
$pdo = conectarDB();

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario de manera segura
    $destinatarios = $_POST['destinatarios'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];
    $fecha_envio = date('Y-m-d');  // Fecha actual
    $hora_envio = date('H:i:s');   // Hora actual
    $remitente = $_SESSION['user'];  // Asumiendo que el remitente es el usuario de la sesión

    // Sentencia SQL para insertar el mensaje en la base de datos
    $sql = "INSERT INTO mensajes_camptrack (destinatarios, asunto, mensaje, fecha_envio, hora_envio, remitente) 
            VALUES (:destinatarios, :asunto, :mensaje, :fecha_envio, :hora_envio, :remitente)";

    try {
        // Preparar la consulta
        $stmt = $pdo->prepare($sql);

        // Vincular los parámetros con las variables
        $stmt->bindParam(':destinatarios', $destinatarios);
        $stmt->bindParam(':asunto', $asunto);
        $stmt->bindParam(':mensaje', $mensaje);
        $stmt->bindParam(':fecha_envio', $fecha_envio);
        $stmt->bindParam(':hora_envio', $hora_envio);
        $stmt->bindParam(':remitente', $remitente);

        // Ejecutar la consulta
        $stmt->execute();

        // Redirigir o mostrar un mensaje de éxito
        echo "Mensaje enviado con éxito.";

    } catch (PDOException $e) {
        // Si ocurre un error, mostrarlo
        echo "Error al enviar el mensaje: " . $e->getMessage();
    }
}
?>
