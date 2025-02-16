<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexion = conectarDB();

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $instalacion = $_POST['instalacion'];
    $fecha_inicio_inscripcion = $_POST['fecha_inicio_inscripcion'];
    $fecha_fin_inscripcion = $_POST['fecha_fin_inscripcion'];
    $tarifa = $_POST['tarifa'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];

    // Manejo de imagen
    $rutaImagen = "";
    if ($_FILES["imagen"]["error"] == UPLOAD_ERR_OK) {
        $directorio = "../../assets/img/campamentos/";
        $rutaImagen = $directorio . basename($_FILES["imagen"]["name"]);
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaImagen);
    }

    // Query para insertar la actividad
    $sql = "INSERT INTO actividades_camptrack (nombre, descripcion, instalacion, fecha_inicio_inscripcion, fecha_fin_inscripcion, tarifa, fecha_inicio, fecha_fin, imagen) 
            VALUES (:nombre, :descripcion, :instalacion, :fecha_inicio_inscripcion, :fecha_fin_inscripcion, :tarifa, :fecha_inicio, :fecha_fin, :imagen)";

    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':instalacion', $instalacion);
    $stmt->bindParam(':fecha_inicio_inscripcion', $fecha_inicio_inscripcion);
    $stmt->bindParam(':fecha_fin_inscripcion', $fecha_fin_inscripcion);
    $stmt->bindParam(':tarifa', $tarifa);
    $stmt->bindParam(':fecha_inicio', $fecha_inicio);
    $stmt->bindParam(':fecha_fin', $fecha_fin);
    $stmt->bindParam(':imagen', $rutaImagen);

    if ($stmt->execute()) {
        echo "<script>alert('Actividad creada con éxito'); window.location.href='form_actividades.php';</script>";
    } else {
        echo "<script>alert('Error al crear la actividad'); window.history.back();</script>";
    }
}
?>
