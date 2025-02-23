<?php
require '../model/database/connection.php'; // Asegúrate de que este archivo contiene la función conectarDB()

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $motivo       = trim($_POST["motivo"]);
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_fin    = $_POST["fecha_fin"];
    $instalacion  = $_POST["instalacion"];

    // Validación básica de fechas
    if ($fecha_inicio > $fecha_fin) {
        // Mostrar alert y redirigir (no rompe con die)
        echo "<script>
                alert('La fecha de inicio no puede ser posterior a la fecha de fin.');
                window.history.back(); 
              </script>";
        exit;
    }

    try {
        $conexion = conectarDB();

        // Comprobar si la instalación ya está reservada en el rango de fechas
        $query = "SELECT COUNT(*) 
                  FROM reservasInstalaciones_camptrack 
                  WHERE instalacion = :instalacion 
                    AND (
                         (fecha_inicio BETWEEN :fecha_inicio AND :fecha_fin)
                         OR (fecha_fin BETWEEN :fecha_inicio AND :fecha_fin)
                         OR (:fecha_inicio BETWEEN fecha_inicio AND fecha_fin)
                        )";

        $stmt = $conexion->prepare($query);
        $stmt->bindParam(":instalacion", $instalacion);
        $stmt->bindParam(":fecha_inicio", $fecha_inicio);
        $stmt->bindParam(":fecha_fin",   $fecha_fin);
        $stmt->execute();

        $existeReserva = $stmt->fetchColumn();

        if ($existeReserva > 0) {
            // Mostrar alert y volver al formulario
            echo "<script>
                    alert('Error: La instalación ya está reservada en las fechas seleccionadas.');
                    window.history.back();
                  </script>";
            exit;
        }

        // Insertar la nueva reserva si no hay conflicto
        $insertQuery = "INSERT INTO reservasInstalaciones_camptrack 
                        (instalacion, fecha_inicio, fecha_fin, motivo, created_at) 
                        VALUES (:instalacion, :fecha_inicio, :fecha_fin, :motivo, NOW())";

        $stmt = $conexion->prepare($insertQuery);
        $stmt->bindParam(":instalacion",  $instalacion);
        $stmt->bindParam(":fecha_inicio", $fecha_inicio);
        $stmt->bindParam(":fecha_fin",    $fecha_fin);
        $stmt->bindParam(":motivo",       $motivo);

        if ($stmt->execute()) {
            // Reserva añadida correctamente
            echo "<script>
                    alert('Reserva añadida con éxito.');
                    window.location.href = 'formulario.html'; /* Cambia a la ruta que prefieras */
                  </script>";
        } else {
            // Error al insertar
            echo "<script>
                    alert('Error al añadir la reserva.');
                    window.history.back();
                  </script>";
        }

    } catch (PDOException $e) {
        // Error en la base de datos
        echo "<script>
                alert('Error en la base de datos: " . $e->getMessage() . "');
                window.history.back();
              </script>";
    }
} else {
    // Si se accede a este archivo sin usar POST
    echo "<script>
            alert('Acceso no autorizado.');
            window.history.back();
          </script>";
}
?>
