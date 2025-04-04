<?php
session_start();
require_once '../../../model/database/connection.php';  // Asegúrate de que la ruta sea correcta

// Conexión a la base de datos
$conn = conectarDB();  // Llamamos a la función conectarDB() del archivo connection.php

// Obtener el idChat de la URL o de otra forma
$idChat = $_GET['idChat'];  // Aquí asumimos que idChat es pasado como parámetro en la URL

// Consulta SQL para obtener los mensajes del chat
$sql = "SELECT * FROM mensajes_chat_camptrack WHERE idChat = :idChat ORDER BY fecha, hora";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':idChat', $idChat, PDO::PARAM_INT);
$stmt->execute();

// Mostrar los mensajes
$mensajes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .chat-container {
            max-width: 600px;
            margin: auto;
            height: 90vh;
            display: flex;
            flex-direction: column;
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            background: white;
        }
        .chat-header {
            background: #007bff;
            color: white;
            padding: 10px;
            display: flex;
            align-items: center;
        }
        .chat-header img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .chat-messages {
            flex-grow: 1;
            padding: 10px;
            overflow-y: auto;
        }
        .message {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            max-width: 100%;
        }
        .message-icon {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: #007bff;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 10px;
        }
        .message-text {
            background: #e9ecef;
            padding: 10px;
            border-radius: 10px;
            flex-grow: 1;
            word-wrap: break-word;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .message-date {
            font-size: 12px;
            color: gray;
            margin-bottom: 3px;
        }
        .sent {
            justify-content: flex-end;
        }
        .sent .message-text {
            background: #007bff;
            color: white;
        }
        .sent .message-icon {
            background: #28a745;
            margin-left: 10px;
            margin-right: 0;
        }
        .chat-input {
            display: flex;
            padding: 10px;
            background: white;
            border-top: 1px solid #ccc;
        }
        .chat-input input {
            flex-grow: 1;
            margin-right: 10px;
        }
        .send-btn {
            background: #007bff;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">
            <img src="../assets/img/aventura/img3.jpg" alt="Usuario">
            <strong>CAMPAMENTO ESPEOLOGIA</strong>
        </div>
        <div class="chat-messages">
            <?php
            // Verifica si hay mensajes y muéstralos
            if ($mensajes) {
                foreach ($mensajes as $mensaje) {
                    $emisor = htmlspecialchars($mensaje['emailEmisor']);
                    $mensajeTexto = nl2br(htmlspecialchars($mensaje['mensaje']));
                    $fechaHora = $mensaje['fecha'] . ' ' . $mensaje['hora'];

                    // Definimos el estilo según si el mensaje es del emisor o no
                    $isSent = ($emisor == $_SESSION['email']);  // Asumimos que tienes la sesión con el email del usuario

                    // Si el mensaje es enviado por el usuario, se mostrará en el lado derecho
                    if ($isSent) {
                        echo "<div class='message sent'>";
                        echo "<div>";
                        echo "<div class='message-date'>{$fechaHora}</div>";
                        echo "<div class='message-text'>{$mensajeTexto}</div>";
                        echo "</div>";
                        echo "<div class='message-icon'>" . strtoupper($emisor[0]) . "</div>";
                        echo "</div>";
                    } else {
                        echo "<div class='message received'>";
                        echo "<div class='message-icon'>" . strtoupper($emisor[0]) . "</div>";
                        echo "<div>";
                        echo "<div class='message-date'>{$fechaHora}</div>";
                        echo "<div class='message-text'>{$mensajeTexto}</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
            } else {
                echo "<p>No hay mensajes para este chat.</p>";
            }
            ?>
        </div>
        <div class="chat-input">
            <button class="btn btn-light">+</button>
            <input type="text" class="form-control" placeholder="Escribe un mensaje...">
            <button class="send-btn">▶</button>
        </div>
    </div>
</body>
</html>
