<?php
require '../model/database/connection.php'; // Archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos
    $conexion = conectarDB();

    // Recoger datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $instalacion = $_POST['instalacion'];
    $inicio_inscripciones = $_POST['fecha_inicio_inscripcion'];
    $fin_inscripciones = $_POST['fecha_fin_inscripcion'];
    $tarifa = $_POST['tarifa'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];

    // Manejo de la imagen
    $directorio_subida = 'uploads/';
    if (!is_dir($directorio_subida)) {
        mkdir($directorio_subida, 0777, true);
    }

    $nombre_imagen = basename($_FILES['imagen']['name']);
    $ruta_imagen = $directorio_subida . $nombre_imagen;
    $tipo_imagen = strtolower(pathinfo($ruta_imagen, PATHINFO_EXTENSION));
    $permitidos = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($tipo_imagen, $permitidos)) {
        die("Error: Solo se permiten imágenes JPG, JPEG, PNG y GIF.");
    }

    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen)) {
        try {
            // Iniciar una transacción para asegurar consistencia
            $conexion->beginTransaction();

            // Insertar en actividades_camptrack
            $sql_actividad = "INSERT INTO actividades_camptrack 
                (nombre, descripcion, imagen, instalacion, inicio_inscripciones, fin_inscripciones, tarifa, fecha_inicio, fecha_fin) 
                VALUES (:nombre, :descripcion, :imagen, :instalacion, :inicio_inscripciones, :fin_inscripciones, :tarifa, :fecha_inicio, :fecha_fin)";

            $stmt_actividad = $conexion->prepare($sql_actividad);

            // Bind de parámetros
            $stmt_actividad->bindParam(':nombre', $nombre);
            $stmt_actividad->bindParam(':descripcion', $descripcion);
            $stmt_actividad->bindParam(':imagen', $ruta_imagen);
            $stmt_actividad->bindParam(':instalacion', $instalacion);
            $stmt_actividad->bindParam(':inicio_inscripciones', $inicio_inscripciones);
            $stmt_actividad->bindParam(':fin_inscripciones', $fin_inscripciones);
            $stmt_actividad->bindParam(':tarifa', $tarifa);
            $stmt_actividad->bindParam(':fecha_inicio', $fecha_inicio);
            $stmt_actividad->bindParam(':fecha_fin', $fecha_fin);
            $edad_minima = isset($_POST['edad_minima']) ? intval($_POST['edad_minima']) : null;
            $edad_maxima = isset($_POST['edad_maxima']) ? intval($_POST['edad_maxima']) : null;


            $stmt_actividad->execute();
            $actividad_id = $conexion->lastInsertId(); // Obtener el ID de la actividad recién insertada

            // Insertar en reservasInstalaciones_camptrack
            $sql_actividad = "INSERT INTO actividades_camptrack 
            (nombre, descripcion, imagen, instalacion, inicio_inscripciones, fin_inscripciones, tarifa, fecha_inicio, fecha_fin, edad_minima, edad_maxima) 
            VALUES (:nombre, :descripcion, :imagen, :instalacion, :inicio_inscripciones, :fin_inscripciones, :tarifa, :fecha_inicio, :fecha_fin, :edad_minima, :edad_maxima)";

            $stmt_actividad = $conexion->prepare($sql_actividad);
            $stmt_actividad->bindParam(':edad_minima', $edad_minima);
            $stmt_actividad->bindParam(':edad_maxima', $edad_maxima);

            $stmt_reserva = $conexion->prepare($sql_reserva);
            $motivo = "Actividad: " . $nombre; // Motivo de la reserva

            $stmt_reserva->bindParam(':instalacion', $instalacion);
            $stmt_reserva->bindParam(':fecha_inicio', $fecha_inicio);
            $stmt_reserva->bindParam(':fecha_fin', $fecha_fin);
            $stmt_reserva->bindParam(':motivo', $motivo);

            $stmt_reserva->execute();

            // Confirmar la transacción
            $conexion->commit();

            echo "Actividad y reserva registradas con éxito.";
            // Puedes redirigir a otra página si lo deseas
            // header("Location: actividades.php");
        } catch (PDOException $e) {
            $conexion->rollBack(); // Deshacer cambios en caso de error
            echo "Error al registrar la actividad y la reserva: " . $e->getMessage();
        }
    } else {
        echo "Error al subir la imagen.";
    }
}
