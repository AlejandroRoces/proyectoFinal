<?php
require_once 'connection.php';

try {
    $conexion = conectarDB();

    // Consulta para obtener las reservas ordenadas
    $sql = "SELECT id, instalacion, fecha_inicio, fecha_fin, motivo 
            FROM reservasInstalaciones_camptrack 
            ORDER BY instalacion, fecha_inicio";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Agrupar reservas por instalación
    $instalaciones = [];
    foreach ($reservas as $reserva) {
        $instalaciones[$reserva['instalacion']][] = $reserva;
    }
} catch (PDOException $e) {
    error_log("Error al obtener los datos: " . $e->getMessage());
    $error = "No se pudieron obtener las reservas. Inténtelo más tarde.";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botonera Desplegable</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .btn-group .btn {
            min-width: 180px;
            background-color: white;
            color: black;
            border: 1px solid #ccc;
            transition: 0.3s;
        }

        .btn-group .btn.active {
            background-color: #007bff !important;
            color: white !important;
        }

        .btn-group .btn:hover {
            background-color: #0056b3;
            color: white;
        }

        .contenido {
            display: none;
            margin-top: 20px;
            padding: 20px;
            border-radius: 10px;
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .accordion-button {
            background: #007bff !important;
            color: white !important;
            font-weight: bold;
        }

        .accordion-button:not(.collapsed) {
            background: #0056b3 !important;
        }

        .accordion-button:focus {
            box-shadow: none;
        }
    </style>
</head>

<div onload="seleccionarOpcion(document.getElementById('btn-todos'), 'todos')">

    <div class="container mt-4">
        <form id="formulario">
            <input type="hidden" name="opcion" id="opcionSeleccionada" value="todos">

            <div class="text-center mb-3">
                <button type="button" class="btn btn-primary active" id="btn-todos" onclick="seleccionarOpcion(this, 'todos')">
                    Mostrar Todo
                </button>
            </div>


            <div class="accordion" id="accordionInstalaciones">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCampamentos">
                            Campamentos
                        </button>
                    </h2>
                    <div id="collapseCampamentos" class="accordion-collapse collapse" data-bs-parent="#accordionInstalaciones">
                        <div class="accordion-body d-flex flex-column gap-2">
                            <button type="button" class="btn w-100" onclick="seleccionarOpcion(this, 'contenido2')">Campamento Pola Gordón</button>
                            <button type="button" class="btn w-100" onclick="seleccionarOpcion(this, 'contenido4')">Campus Turístico</button>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseColonias">
                            Colonias
                        </button>
                    </h2>
                    <div id="collapseColonias" class="accordion-collapse collapse" data-bs-parent="#accordionInstalaciones">
                        <div class="accordion-body">
                            <button type="button" class="btn w-100" onclick="seleccionarOpcion(this, 'contenido1')">Colonia San José</button>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAlbergues">
                            Albergues
                        </button>
                    </h2>
                    <div id="collapseAlbergues" class="accordion-collapse collapse" data-bs-parent="#accordionInstalaciones">
                        <div class="accordion-body d-flex flex-column gap-2">
                            <button type="button" class="btn w-100" onclick="seleccionarOpcion(this, 'contenido3')">Albergue Juvenil</button>
                            <button type="button" class="btn w-100" onclick="seleccionarOpcion(this, 'contenido5')">Albergue Maristas</button>
                            <button type="button" class="btn w-100" onclick="seleccionarOpcion(this, 'contenido6')">Albergue Santibáñez</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div id="contenido1" class="contenido">
            <h3>Colonia San José</h3>
            <div class="mt-4">
                <?php if (isset($instalaciones['Colonia San Jose'])) : ?>
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Motivo</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ultimo_mes = "";
                            $contador = 1;
                            foreach ($instalaciones['Colonia San Jose'] as $reserva) :
                                $mes_actual = date("F Y", strtotime($reserva['fecha_inicio']));

                                if ($mes_actual !== $ultimo_mes) {
                                    echo "<tr class='table-info'><td colspan='5' class='fw-bold text-center'>$mes_actual</td></tr>";
                                    $ultimo_mes = $mes_actual;
                                    $contador = 1; // Reiniciar contador al cambiar de mes
                                }
                            ?>
                                <tr>
                                    <td><?= $contador++ ?></td>
                                    <td><?= date("d-m-Y", strtotime($reserva['fecha_inicio'])) ?></td>
                                    <td><?= date("d-m-Y", strtotime($reserva['fecha_fin'])) ?></td>
                                    <td><?= htmlspecialchars($reserva['motivo']) ?></td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" onclick="eliminarReserva(<?= $reserva['id'] ?>)">
                                            🗑 Eliminar
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p class="text-muted">No hay reservas para esta instalación.</p>
                <?php endif; ?>
            </div>
        </div>

        <div id="contenido2" class="contenido">
            <h3>Campamento Pola Gordón</h3>
            <div class="mt-4">
                <?php if (isset($instalaciones['Campamento Juvenil'])) : ?>
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Motivo</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ultimo_mes = "";
                            $contador = 1;
                            foreach ($instalaciones['Campamento Juvenil'] as $reserva) :
                                $mes_actual = date("F Y", strtotime($reserva['fecha_inicio']));

                                if ($mes_actual !== $ultimo_mes) {
                                    echo "<tr class='table-info'><td colspan='5' class='fw-bold text-center'>$mes_actual</td></tr>";
                                    $ultimo_mes = $mes_actual;
                                    $contador = 1; // Reiniciar contador al cambiar de mes
                                }
                            ?>
                                <tr>
                                    <td><?= $contador++ ?></td>
                                    <td><?= date("d-m-Y", strtotime($reserva['fecha_inicio'])) ?></td>
                                    <td><?= date("d-m-Y", strtotime($reserva['fecha_fin'])) ?></td>
                                    <td><?= htmlspecialchars($reserva['motivo']) ?></td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" onclick="eliminarReserva(<?= $reserva['id'] ?>)">
                                            🗑 Eliminar
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p class="text-muted">No hay reservas para esta instalación.</p>
                <?php endif; ?>
            </div>
        </div>

        <div id="contenido3" class="contenido">
            <h3>Albergue Juvenil</h3>
            <div class="mt-4">
                <?php if (isset($instalaciones['Albergue Juvenil'])) : ?>
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Motivo</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ultimo_mes = "";
                            $contador = 1;
                            foreach ($instalaciones['Albergue Juvenil'] as $reserva) :
                                $mes_actual = date("F Y", strtotime($reserva['fecha_inicio']));

                                if ($mes_actual !== $ultimo_mes) {
                                    echo "<tr class='table-info'><td colspan='5' class='fw-bold text-center'>$mes_actual</td></tr>";
                                    $ultimo_mes = $mes_actual;
                                    $contador = 1; // Reiniciar contador al cambiar de mes
                                }
                            ?>
                                <tr>
                                    <td><?= $contador++ ?></td>
                                    <td><?= date("d-m-Y", strtotime($reserva['fecha_inicio'])) ?></td>
                                    <td><?= date("d-m-Y", strtotime($reserva['fecha_fin'])) ?></td>
                                    <td><?= htmlspecialchars($reserva['motivo']) ?></td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" onclick="eliminarReserva(<?= $reserva['id'] ?>)">
                                            🗑 Eliminar
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p class="text-muted">No hay reservas para esta instalación.</p>
                <?php endif; ?>
            </div>
        </div>


        <div id="contenido4" class="contenido">
            <h3>Campus Turístico</h3>
            <div class="mt-4">
                <?php if (isset($instalaciones['Campus Turistico'])) : ?>
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Motivo</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ultimo_mes = "";
                            $contador = 1;
                            foreach ($instalaciones['Campus Turistico'] as $reserva) :
                                $mes_actual = date("F Y", strtotime($reserva['fecha_inicio']));

                                if ($mes_actual !== $ultimo_mes) {
                                    echo "<tr class='table-info'><td colspan='5' class='fw-bold text-center'>$mes_actual</td></tr>";
                                    $ultimo_mes = $mes_actual;
                                    $contador = 1; // Reiniciar contador al cambiar de mes
                                }
                            ?>
                                <tr>
                                    <td><?= $contador++ ?></td>
                                    <td><?= date("d-m-Y", strtotime($reserva['fecha_inicio'])) ?></td>
                                    <td><?= date("d-m-Y", strtotime($reserva['fecha_fin'])) ?></td>
                                    <td><?= htmlspecialchars($reserva['motivo']) ?></td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" onclick="eliminarReserva(<?= $reserva['id'] ?>)">
                                            🗑 Eliminar
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p class="text-muted">No hay reservas para esta instalación.</p>
                <?php endif; ?>
            </div>
        </div>


        <div id="contenido5" class="contenido">
            <h3>Albergue Maristas</h3>
            <div class="mt-4">
                <?php if (isset($instalaciones['Albergue Maristas'])) : ?>
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Motivo</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ultimo_mes = "";
                            $contador = 1;
                            foreach ($instalaciones['Albergue Maristas'] as $reserva) :
                                $mes_actual = date("F Y", strtotime($reserva['fecha_inicio']));

                                if ($mes_actual !== $ultimo_mes) {
                                    echo "<tr class='table-info'><td colspan='5' class='fw-bold text-center'>$mes_actual</td></tr>";
                                    $ultimo_mes = $mes_actual;
                                    $contador = 1; // Reiniciar contador al cambiar de mes
                                }
                            ?>
                                <tr>
                                    <td><?= $contador++ ?></td>
                                    <td><?= date("d-m-Y", strtotime($reserva['fecha_inicio'])) ?></td>
                                    <td><?= date("d-m-Y", strtotime($reserva['fecha_fin'])) ?></td>
                                    <td><?= htmlspecialchars($reserva['motivo']) ?></td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" onclick="eliminarReserva(<?= $reserva['id'] ?>)">
                                            🗑 Eliminar
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p class="text-muted">No hay reservas para esta instalación.</p>
                <?php endif; ?>
            </div>
        </div>


        <div id="contenido6" class="contenido">
            <h3>Albergue Santibáñez</h3>
            <div class="mt-4">
                <?php if (isset($instalaciones['Santibañez de Vidriales'])) : ?>
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Motivo</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ultimo_mes = "";
                            $contador = 1;
                            foreach ($instalaciones['Santibañez de Vidriales'] as $reserva) :
                                $mes_actual = date("F Y", strtotime($reserva['fecha_inicio']));

                                if ($mes_actual !== $ultimo_mes) {
                                    echo "<tr class='table-info'><td colspan='5' class='fw-bold text-center'>$mes_actual</td></tr>";
                                    $ultimo_mes = $mes_actual;
                                    $contador = 1; // Reiniciar contador al cambiar de mes
                                }
                            ?>
                                <tr>
                                    <td><?= $contador++ ?></td>
                                    <td><?= date("d-m-Y", strtotime($reserva['fecha_inicio'])) ?></td>
                                    <td><?= date("d-m-Y", strtotime($reserva['fecha_fin'])) ?></td>
                                    <td><?= htmlspecialchars($reserva['motivo']) ?></td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" onclick="eliminarReserva(<?= $reserva['id'] ?>)">
                                            🗑 Eliminar
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p class="text-muted">No hay reservas para esta instalación.</p>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>
</div>
<script>
    function seleccionarOpcion(boton, idContenido) {
        console.log("Botón seleccionado:", boton);
        console.log("ID de contenido seleccionado:", idContenido);

        document.querySelectorAll("button").forEach(btn => btn.classList.remove("active"));
        boton.classList.add("active");

        document.getElementById("opcionSeleccionada").value = idContenido;
        document.querySelectorAll(".contenido").forEach(div => div.style.display = "none");

        if (idContenido === "todos") {
            document.querySelectorAll(".contenido").forEach(div => div.style.display = "block");
        } else {
            let contenido = document.getElementById(idContenido);
            if (contenido) {
                contenido.style.display = "block";
                console.log("Cargando reservas para:", idContenido);
                cargarReservas(idContenido);
            } else {
                console.error("No se encontró el contenedor con ID:", idContenido);
            }
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>