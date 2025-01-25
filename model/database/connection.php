<?php

function conectarDB() {
    $host = "localhost";
    $database = "login.camptrack";
    $user = "root";
    $password = "A1l2e3s4_";

    try {
        $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";
        $conexion = new PDO($dsn, $user, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*
        es crucial para hacer que los errores en la base de datos sean lanzados como 
        excepciones, lo que permite un manejo de errores más seguro, estructurado y 
        profesional. Es altamente recomendable incluirla en cualquier conexión PDO.
         */ 
        return $conexion;
    } catch (PDOException $e) {
        die("ERROR_ Se ha producido un fallo en la conexion con la base de datos: " . $e->getMessage()); // el die sirve para romper la ejecucion y imprimir
    }
}

?>
