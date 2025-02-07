<?php
// Conexión a la base de datos
require_once "../../model/database/connection.php";
$conexion = conectarDB();
$query = "SELECT * FROM configuracion_camptrack LIMIT 1"; 
$stmt = $conexion->query($query);
$config = $stmt->fetch(PDO::FETCH_ASSOC);

// Establecer el tipo de contenido a CSS
header('Content-Type: text/css');

if ($config) {
    echo "
    :root {
        --color-header: {$config['color_header']};
        --color-nav: {$config['color_nav']};
        --color-fondo: {$config['color_fondo']};
        --color-botones: {$config['color_botones']};
        --color-texto: {$config['color_texto']};
    }
    ";
} else {
    echo ":root { --color-header: #000; --color-nav: #000; --color-fondo: #fff; --color-botones: #000; --color-texto: #000; }"; // Valores por defecto
}
?>
