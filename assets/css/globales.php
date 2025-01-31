<?php
header("Content-Type: text/css"); // Indica que este archivo devuelve CSS

require_once "connection.php"; // Asegura que se conecte a la base de datos

$conexion = conectarDB();
$query = "SELECT * FROM tu_tabla LIMIT 1"; // Reemplaza 'tu_tabla' con el nombre real de la tabla
$stmt = $conexion->query($query);
$config = $stmt->fetch(PDO::FETCH_ASSOC);

?>

:root {
    --color-header: <?php echo $config['color_header']; ?>;
    --color-nav: <?php echo $config['color_nav']; ?>;
    --color-fondo: <?php echo $config['color_fondo']; ?>;
    --color-botones: <?php echo $config['color_botones']; ?>;
    --color-texto: <?php echo $config['color_texto']; ?>;
}
