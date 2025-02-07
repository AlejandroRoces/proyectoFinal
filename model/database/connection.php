<?php

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
