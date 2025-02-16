<?php
/**
 * ========================================================================================================
 * Archivo: guardarInscripcion.php
 * Descripción: Este script procesa los datos del formulario de inscripción y los almacena en la base de datos.
 * Autor: Alejandro Roces Fernandez
 * Fecha de Creación: 01 de enero de 2025
 * Última Modificación: 16.02.2025
 * Versión: 1.0
 * 
 * Dependencias:
 * - connection.php (Para la conexión con la base de datos)
 * 
 * Funcionalidad:
 * - Recibe los datos enviados desde el formulario de inscripción.
 * - Inserta los datos del participante en la base de datos.
 * - Guarda la dirección del participante y el correo de contacto de los padres.
 * - Maneja la carga de documentos (DNI y Tarjeta Sanitaria).
 * - Utiliza transacciones para asegurar la integridad de los datos.
 * - Redirige al usuario a la página de pago correspondiente según su elección.
 * 
 * Seguridad y Validaciones:
 * - Se usa `$_SERVER['REQUEST_METHOD'] == 'POST'` para evitar accesos directos no autorizados.
 * - Se emplea `prepare()` y `execute()` de PDO para prevenir inyecciones SQL.
 * - Se gestiona la subida de archivos de manera controlada.
 * - Se usa `beginTransaction()` y `commit()` para evitar inconsistencias en la base de datos.
 * 
 * Licencia:
 * Este código está licenciado bajo Creative Commons Atribución-NoComercial 4.0 Internacional (CC BY-NC 4.0).
 * No se permite su uso comercial sin autorización previa del autor.
 * Más información en: https://creativecommons.org/licenses/by-nc/4.0/
 * 
 * Copyright (c) 2025 Alejandro Roces Fernandez
 * ========================================================================================================
 */
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $edad = $_POST['edad'];
    $genero = $_POST['genero'];
    $alergias = $_POST['alergias'] ?? null;
    $enfermedades = $_POST['enfermedades'] ?? null;
    $medicinas = $_POST['medicinas'] ?? null;

    // Datos de la dirección
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $portal = $_POST['portal'] ?? null;
    $piso = $_POST['piso'] ?? null;
    $letra = $_POST['letra'] ?? null;
    $informacion_adicional = $_POST['informacion_adicional'] ?? null;

    // Datos de los padres
    $nombre_padre = $_POST['nombre_padre'];
    $apellidos_padre = $_POST['apellidos_padre'];
    $telefono_padre = $_POST['telefono_padre'];
    $dni_padre = $_POST['dni_padre'];
    
    $nombre_madre = $_POST['nombre_madre'];
    $apellidos_madre = $_POST['apellidos_madre'];
    $telefono_madre = $_POST['telefono_madre'];
    $dni_madre = $_POST['dni_madre'];
    
    $correo_electronico = $_POST['email'];
    $id_actividad = $_POST['id_actividad'] ?? null;

    // Conectar a la base de datos
    $conexion = conectarDB();

    try {
        $conexion->beginTransaction();

        // Insertar participante
        $sql = "INSERT INTO Participantes_inscripciones_camptrack 
                (nombre, apellidos, dni, fecha_nacimiento, edad, genero, alergias, enfermedades, medicinas, id_actividad) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$nombre, $apellidos, $dni, $fecha_nacimiento, $edad, $genero, $alergias, $enfermedades, $medicinas, $id_actividad]);
        $id_participante = $conexion->lastInsertId();

        // Insertar dirección
        $sql = "INSERT INTO Direcciones_inscripciones_camptrack 
                (id_participante, calle, numero, portal, piso, letra, informacion_adicional) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id_participante, $calle, $numero, $portal, $piso, $letra, $informacion_adicional]);

        // Insertar datos de los padres
        $sql = "INSERT INTO Padres_inscripciones_camptrack 
                (id_participante, nombre_padre, apellidos_padre, telefono_padre, dni_padre, nombre_madre, apellidos_madre, telefono_madre, dni_madre, correo_electronico) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id_participante, $nombre_padre, $apellidos_padre, $telefono_padre, $dni_padre, $nombre_madre, $apellidos_madre, $telefono_madre, $dni_madre, $correo_electronico]);

        // Manejo de archivos
        $uploadDir = "../../uploads/";
        $foto_dni = $_FILES['dni_foto']['name'] ? $uploadDir . basename($_FILES['dni_foto']['name']) : null;
        $tarjeta_sanitaria = $_FILES['tarjeta_sanitaria']['name'] ? $uploadDir . basename($_FILES['tarjeta_sanitaria']['name']) : null;
        
        if ($foto_dni) move_uploaded_file($_FILES['dni_foto']['tmp_name'], $foto_dni);
        if ($tarjeta_sanitaria) move_uploaded_file($_FILES['tarjeta_sanitaria']['tmp_name'], $tarjeta_sanitaria);

        // Insertar documentos
        $sql = "INSERT INTO Documentos_inscripciones_camptrack 
                (id_participante, foto_dni, tarjeta_sanitaria) 
                VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id_participante, $foto_dni, $tarjeta_sanitaria]);

        $conexion->commit();

        // Redirigir según el método de pago
        if ($_POST['submit_type'] == 'pago_directo') {
            header("Location: portal_pago.html");
        } else {
            header("Location: instrucciones_transferencia.html");
        }
        exit();

    } catch (Exception $e) {
        $conexion->rollBack();
        die("Error: " . $e->getMessage());
    }
}
?>
