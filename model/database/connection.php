<?php
/**
 * ========================================================================================================
 * Archivo: connection.php
 * Descripción: Archivo encargado de establecer la conexión con la base de datos de CampTrack.
 * Autor: Alejandro Roces Fernandez
 * Fecha de Creación: 01 de enero de 2025
 * Última Modificación: 16.02.2025
 * Versión: 1.0
 * 
 * Dependencias:
 * - PHP PDO (Para la conexión segura a la base de datos)
 * 
 * Funcionalidad:
 * - Define los parámetros de conexión a la base de datos.
 * - Utiliza PDO para establecer la conexión con MySQL.
 * - Configura el modo de errores en excepción para manejo adecuado.
 * - En caso de error, captura la excepción y detiene la ejecución con un mensaje.
 * 
 * Licencia:
 * Este código está licenciado bajo Creative Commons Atribución-NoComercial 4.0 Internacional (CC BY-NC 4.0).
 * No se permite su uso comercial sin autorización previa del autor.
 * Más información en: https://creativecommons.org/licenses/by-nc/4.0/
 * 
 * Copyright (c) 2025 Alejandro Roces Fernandez
 * ========================================================================================================
 */
function conectarDB() {

    $host = "bghrndhnyp5gxtol7egb-mysql.services.clever-cloud.com";
    $database = "bghrndhnyp5gxtol7egb";
    $user = "upbby8aqjyh1lhdy";
    $password = "amJYE4jVE3gvlzK6B5W8";
    try {
        $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";
        $conexion = new PDO($dsn, $user, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    } catch (PDOException $e) {
        die("ERROR_ Se ha producido un fallo en la conexion con la base de datos: " . $e->getMessage()); // el die sirve para romper la ejecucion y imprimir
    }
}

?>
