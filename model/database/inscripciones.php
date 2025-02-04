<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $edad = $_POST['edad'];
    $alergias = $_POST['alergias'];
    $enfermedades = $_POST['enfermedades'];
    $medicinas = $_POST['medicinas'];
    
    // Datos de la dirección
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $portal = $_POST['portal'];
    $piso = $_POST['piso'];
    $letra = $_POST['letra'];
    $informacion_adicional = $_POST['informacion_adicional'];
    
    // Datos de los padres
    $nombre_padre = $_POST['nombre_padre'];
    $apellidos_padre = $_POST['apellidos_padre'];
    $telefono_padre = $_POST['telefono_padre'];
    $dni_padre = $_POST['dni_padre'];
    $nombre_madre = $_POST['nombre_madre'];
    $apellidos_madre = $_POST['apellidos_madre'];
    $telefono_madre = $_POST['telefono_madre'];
    $dni_madre = $_POST['dni_madre'];
    $correo_electronico = $_POST['correo_electronico'];
    
    // Documentos (manejo de archivos)
    $foto_dni = $_FILES['foto_dni']['name']; // Puedes mover el archivo a un directorio
    $tarjeta_sanitaria = $_FILES['tarjeta_sanitaria']['name'];
    $archivos_adicionales = $_FILES['archivos_adicionales']['name'];

    // Conectar a la base de datos
    $conexion = conectarDB();
    
    // Insertar participante
    $sql = "INSERT INTO Participantes_inscripciones_camptrack (nombre, apellidos, dni, fecha_nacimiento, edad, alergias, enfermedades, medicinas) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$nombre, $apellidos, $dni, $fecha_nacimiento, $edad, $alergias, $enfermedades, $medicinas]);
    
    // Obtener el id del participante insertado
    $id_participante = $conexion->lastInsertId();

    // Insertar dirección
    $sql = "INSERT INTO Direcciones_inscripciones_camptrack (id_participante, calle, numero, portal, piso, letra, informacion_adicional) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$id_participante, $calle, $numero, $portal, $piso, $letra, $informacion_adicional]);

    // Insertar padres
    $sql = "INSERT INTO Padres_inscripciones_camptrack (id_participante, nombre_padre, apellidos_padre, telefono_padre, dni_padre, nombre_madre, apellidos_madre, telefono_madre, dni_madre, correo_electronico) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$id_participante, $nombre_padre, $apellidos_padre, $telefono_padre, $dni_padre, $nombre_madre, $apellidos_madre, $telefono_madre, $dni_madre, $correo_electronico]);

    // Insertar documentos
    $sql = "INSERT INTO Documentos_inscripciones_camptrack (id_participante, foto_dni, tarjeta_sanitaria, archivos_adicionales) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$id_participante, $foto_dni, $tarjeta_sanitaria, $archivos_adicionales]);
    
    // Redirigir al portal de pago (si es necesario)
    header("Location: portal_pago.html");
}
?>
