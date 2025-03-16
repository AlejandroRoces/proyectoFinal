<?php
function generarTablaReservas($instalaciones, $nombre_instalacion) {
    if (!isset($instalaciones[$nombre_instalacion])) {
        echo "<tr><td colspan='5' class='text-center text-danger'>No hay reservas para esta instalación</td></tr>";
        return;
    }

    $ultimo_mes = "";
    $contador = 1;

    foreach ($instalaciones[$nombre_instalacion] as $reserva) {
        $mes_actual = date("F Y", strtotime($reserva['fecha_inicio']));

        if ($mes_actual !== $ultimo_mes) {
            echo "<tr class='table-info'><td colspan='5' class='fw-bold text-center'>$mes_actual</td></tr>";
            $ultimo_mes = $mes_actual;
            $contador = 1; // Reiniciar el contador al cambiar de mes
        }

        echo "<tr>";
        echo "<td>" . $contador . "</td>";
        echo "<td>" . date("d/m/Y", strtotime($reserva['fecha_inicio'])) . "</td>";
        echo "<td>" . date("d/m/Y", strtotime($reserva['fecha_fin'])) . "</td>";
        echo "<td>" . htmlspecialchars($reserva['motivo']) . "</td>";
        echo "<td>" . htmlspecialchars($reserva['responsable']) . "</td>";
        echo "</tr>";

        $contador++;
    }
}
?>
