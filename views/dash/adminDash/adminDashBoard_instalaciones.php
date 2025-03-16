<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Camptrack dashboard</title>
    <link rel="icon" type="image/png" sizes="16x16" href="../../../assets/img/logos/logoSF.png">

    <link href="../../../assets/css/dash/dashGen/style.min.css" rel="stylesheet">
    <link href="../../../assets/css/adminDash/slider_activities.css" rel="stylesheet">
    <link href="../../../assets/css/adminDash/instalations.css" rel="stylesheet">
</head>

<body>
    <?php require_once('../../../model/obtenerReservas-info.php'); ?> 
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- Logo -->
                    <a class="navbar-brand ms-4" href="adminDashBoard.php">

                        <b class="logo-icon">
                            <img src="../../../assets/img/logos/logoSF.png" alt="icono" class="dark-logo"
                                style="max-width: 50px; height: auto;" />
                        </b>
                        <span class="logo-text">
                            <img src="../../../assets/img/logos/text-logo.png" alt="texto Icono" class="dark-logo"
                                style="max-width: 150px; height: auto;" />
                        </span>
                    </a>
                    <!-- icono de nav responsive -->
                    <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>

                <!---->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-lg-none d-md-block ">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white "
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav me-auto mt-md-0 ">
                        <li class="nav-item search-box">
                            <a class="nav-link text-muted" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search" style="display: none;">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                    </ul>

                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#"
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                BIENVENIDO ALEJANDRO
                                <img src="../../../assets/img/log/FOTO CARNET ALEJANDRO.jpg" alt="user"
                                    class="profile-pic me-2">
                                <i class="fas fa-chevron-down"></i>
                                <div class="dropdown-menu" id="dropdownMenu" role="menu">
                                    <a href="#">Perfil</a>
                                    <a href="#">Configuración</a>
                                    <a href="../logout.php"
                                        onclick="return confirm('¿Estás seguro de que quieres cerrar sesión?');">
                                        <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                                    </a>
                                </div>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="adminDashBoard.php"
                                aria-expanded="false">
                                <i class="fas fa-home me-2"></i>
                                <span class="hide-menu">Inicio</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="adminDashBoard_instalaciones.php" aria-expanded="false">
                                <i class="fas fa-building me-2"></i>
                                <span class="hide-menu">Instalaciones</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="adminDashBoard_Trabajadores.php" aria-expanded="false">
                                <i class="fas fa-users me-2"></i>
                                <span class="hide-menu">Trabajadores</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="adminDashBoard_Inscripciones.php" aria-expanded="false">
                                <i class="fas fa-list me-2"></i>
                                <span class="hide-menu">Inscripciones</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="adminDashBoard_Estadisticas.php" aria-expanded="false">
                                <i class="fas fa-chart-line me-2"></i>
                                <span class="hide-menu">Estadísticas</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="adminDashBoard_Actividades.php" aria-expanded="false">
                                <i class="fas fa-calendar me-2"></i> <!-- Nuevo ícono -->
                                <span class="hide-menu">Actividades</span>
                            </a>
                        </li>

                        <li class="sidebar-item"
                            style="position: absolute; bottom: 0; width: 100%; margin-bottom: 10px;">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../logout.php"
                                aria-expanded="false"
                                onclick="return confirm('¿Estás seguro de que quieres cerrar sesión?');">
                                <i class="fas fa-sign-out-alt me-2"></i>
                                <span class="hide-menu">Cerrar sesión</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>


        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Dashboard</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="adminDashBoard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Instalaciones</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <main>
                <br>
                <div class="toggle-container">
                    <div class="toggle-wrapper">
                        <input type="checkbox" id="toggle-section" onclick="toggleSection()">
                        <label for="toggle-section" class="toggle-label">
                            <span class="toggle-text instalaciones">Instalaciones</span>
                            <span class="toggle-text reservas">Reservas</span>
                        </label>
                    </div>
                </div>

                <div id="instalaciones-section">
                    <h2 class="mb-4 text-center">Instalaciones registradas</h2>
                    <div class="wrapper">
                        <div class="inner-containers">
                            <div class="inner-container" tabindex="0"
                                style="background-image: url('../../../assets/img/installation/Llanes_ColoniaSanJose/img0.ColoniaSanJose.jpg')"
                                data-image="../../../assets/img/installation/Llanes_ColoniaSanJose/img1.ColoniaSanJose.jpg"
                                onclick="showInfo('Colonia San José, Llanes', 57, 'barro llanes', 'ficha_tecnica.pdf', 'contrato.pdf')">
                            </div>
                            <div class="inner-container" tabindex="0"
                                style="background-image: url('../../../assets/img/installation/PolaGordon_CampamentoJuvenilPolaGordon/img0.CampamentoJuvenilPolaGordon.jpg')"
                                data-image="../../../assets/img/installation/PolaGordon_CampamentoJuvenilPolaGordon/img1.CampamentoJuvenilPolaGordon.jpg"
                                onclick="showInfo('Campamento Juvenil ', 200, 'Pola de Gordon', 'ficha_tecnica.pdf', 'contrato.pdf')">
                            </div>
                            <div class="inner-container" tabindex="0"
                                style="background-image: url('../../../assets/img/installation/Villamanin_AlbergueJuvenil/img0.AlbergueJuvenil.jpg')"
                                data-image="../../../assets/img/installation/Villamanin_AlbergueJuvenil/img1.AlbergueJuvenil.jpg"
                                onclick="showInfo('Albergue juvenil', 60, 'Villamanin', 'ficha_tecnica.pdf', 'contrato.pdf')">
                            </div>
                            <div class="inner-container" tabindex="0"
                                style="background-image: url('../../../assets/img/installation/Villamanin_CampusTuristico/img0.campusTuristicoVillamanin.jpg')"
                                data-image="../../../assets/img/installation/Villamanin_CampusTuristico/img1.campusTuristicoVillamanin.jpg"
                                onclick="showInfo('Campus Turistico', 200, 'Villamanin', 'ficha_tecnica.pdf', 'contrato.pdf')">
                            </div>
                            <div class="inner-container" tabindex="0"
                                style="background-image: url('../../../assets/img/installation/Villamanin_Maristas/img0.MaristasVillamanin.jpg')"
                                data-image="../../../assets/img/installation/Villamanin_Maristas/img1.MaristasVillamanin.jpg"
                                onclick="showInfo('Albergue Maristas', 200, 'Villamanin', 'ficha_tecnica.pdf', 'contrato.pdf')">
                            </div>
                            <div class="inner-container" tabindex="0"
                                style="background-image: url('../../../assets/img/installation/Zamora_AlbergueSantibáñezDeVidriales/img0.SantibañezZamora.jpg')"
                                data-image="../../../assets/img/installation/Zamora_AlbergueSantibáñezDeVidriales/img1.SantibañezZamora.jpg"
                                onclick="showInfo('Albergue Santibañez', 200, 'Santibañez Zamora', 'ficha_tecnica.pdf', 'contrato.pdf')">
                            </div>
                        </div>
                    </div>


                    <div id="info-container" class="d-flex justify-content-center align-items-center mb-4">Haga click en
                        la
                        instalacion para ver la info.</div>
                    <div class="mb-4 text-center"><iframe
                            src="https://www.google.com/maps/d/u/0/embed?mid=1sIft0GEmBazpK8O53oCy3p9a4MFrjVw&ehbc=2E312F"
                            width="640" height="480"></iframe></div>



                </div>

                <div id="reservas-section" style="display: none;">

                    <div class="container text-center"> <!-- Añadir text-center aquí para centrar el texto -->
                        <h2 class="mb-4">Reservas</h2>
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-10 col-lg-11 col-xl-10"> <!-- Eliminar márgenes adicionales -->
                                <div class="reservas-container">
                                    <div class="calendar-container">
                                        <div class="calendar-header d-flex justify-content-center align-items-center"> <!-- Usar d-flex para centrar los botones y el mes -->
                                            <button id="prevMonth" class="btn btn-light">&#9665;</button>
                                            <h2 id="monthYear" class="mx-2"></h2> <!-- Añadir margen horizontal -->
                                            <button id="nextMonth" class="btn btn-light">&#9655;</button>
                                        </div>
                                        <div class="calendar-grid" id="calendar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <h4 class="text-center mt-4">Leyenda de Instalaciones</h4>
                    <div class="row justify-content-center">
                        <div class="legend-container">
                            <div class="legend-item">
                                <span class="color-box" style="background-color: #ff5733;"></span> Colonia San José, Llanes
                            </div>
                            <div class="legend-item">
                                <span class="color-box" style="background-color: #33ff57;"></span> Campamento Juvenil Pola
                                de Gordón
                            </div>
                            <div class="legend-item">
                                <span class="color-box" style="background-color: #5733ff;"></span> Albergue Juvenil
                                Villamanín
                            </div>
                            <div class="legend-item">
                                <span class="color-box" style="background-color: #ff33a8;"></span> Campus Turístico
                                Villamanín
                            </div>
                            <div class="legend-item">
                                <span class="color-box" style="background-color: #ffcc33;"></span> Albergue Maristas
                                Villamanín
                            </div>
                            <div class="legend-item">
                                <span class="color-box" style="background-color: #33d4ff;"></span> Albergue Santibáñez,
                                Zamora
                            </div>

                        </div>
                    </div>

                    <div class="row justify-content-center mt-3">
                        <div class="col-12 col-md-8 col-lg-6 text-center">
                            <div class="switch-container">
                                <div class="switch-wrapper">
                                    <input type="checkbox" id="option-selector" onchange="changeSection()">
                                    <label for="option-selector" class="switch-label">
                                        <span class="switch-text">Crear</span>
                                        <span class="switch-text">Modificar</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





                <div id="section-create" class="content-section visible-section">
                    <div class="container">
                        <br><br>
                        <h2 class="text-center">Añadir Evento al Calendario</h2>

                        <form id="event-form" action="../../../controller/guardar_eventos.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Motivo:</label>
                                <input type="text" class="form-control" name="motivo" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fecha de Inicio:</label>
                                <input type="date" class="form-control" name="fecha_inicio" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fecha de Fin:</label>
                                <input type="date" class="form-control" name="fecha_fin" required>
                            </div>
                            <div class="mb-3">
                                <label for="instalacion" class="form-label">Instalación</label>
                                <select class="form-select" name="instalacion" required>
                                    <option value="">Seleccione una instalación</option>
                                    <option value="Campus Turistico">Campus Turistico</option>
                                    <option value="Albergue Juvenil">Albergue Juvenil</option>
                                    <option value="Albergue Maristas">Albergue Maristas</option>
                                    <option value="Campamento Juvenil">Campamento Juvenil Pola Gordon</option>
                                    <option value="Colonia San Jose">Colonia San Jose</option>
                                    <option value="Santibañez de Vidriales">Santibañez de Vidriales</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Añadir Evento</button>
                        </form>


                    </div>
                </div>

                <div id="section-edit" class="content-section">
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
        </div>


    </div>
    </div>

    </main>

    <script src="../../../assets/plugins/jquery.min.js"></script>
    <script src="../../../assets/plugins/bootstrap.bundle.min.js"></script>
    <script src="../../../assets/js/app-style-switcher.js"></script>
    <script src="../../../assets/js/waves.js"></script>
    <script src="../../../assets/js/sidebarmenu.js"></script>
    <script src="../../../assets/js/custom.js"></script>
    <script>
        function showInfo(nombre, aforo, lugar, ficha, contrato) {
            document.getElementById("info-container").innerHTML = `
        <div class="card p-3 shadow-lg" style="max-width: 400px;">
            <h5 class="card-title">${nombre}</h5>
            <p><strong>Aforo:</strong> <span>${aforo} personas</span></p>
            <p><strong>Lugar:</strong> <span>${lugar}</span></p>
            <div class="d-flex justify-content-between mt-3">
                <a href="${ficha}" class="btn btn-primary" target="_blank">Ficha Técnica</a>
                <a href="${contrato}" class="btn btn-success" target="_blank">Descargar Contrato</a>
            </div>
        </div>
    `;
        }

        document.querySelectorAll('.inner-container').forEach(container => {
            const initialImage = container.style.backgroundImage; // Guarda la imagen inicial
            const hoverImage = `url(${container.getAttribute('data-image')})`;

            container.addEventListener('mouseenter', () => {
                container.style.backgroundImage = hoverImage;
            });

            container.addEventListener('mouseleave', () => {
                container.style.backgroundImage = initialImage;
            });
        });

        /** toggle entre reservas y intalaciones */
        function toggleSection() {
            const toggle = document.getElementById('toggle-section');
            if (toggle.checked) {
                document.getElementById('instalaciones-section').style.display = 'none';
                document.getElementById('reservas-section').style.display = 'block';
            } else {
                document.getElementById('instalaciones-section').style.display = 'block';
                document.getElementById('reservas-section').style.display = 'none';
            }
        }
        /** Gestion del calendario */
        document.addEventListener("DOMContentLoaded", function() {
            const calendar = document.getElementById("calendar");
            const monthYear = document.getElementById("monthYear");
            const prevMonth = document.getElementById("prevMonth");
            const nextMonth = document.getElementById("nextMonth");

            let date = new Date();
            let events = [];

            function fetchEvents() {
                fetch("obtener_eventos.php")
                    .then(response => response.json())
                    .then(data => {
                        events = data;
                        renderCalendar();
                    })
                    .catch(error => console.error("Error al obtener eventos:", error));
            }

            function renderCalendar() {
                calendar.innerHTML = "";

                let firstDay = new Date(date.getFullYear(), date.getMonth(), 1).getDay();
                firstDay = (firstDay === 0) ? 6 : firstDay - 1; // ✅ Ajuste para que lunes sea el primer día

                let daysInMonth = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();

                monthYear.innerText = date.toLocaleDateString("es-ES", {
                    month: "long",
                    year: "numeric"
                });

                // Agregar espacios vacíos antes del primer día del mes
                for (let i = 0; i < firstDay; i++) {
                    let emptyDiv = document.createElement("div");
                    emptyDiv.classList.add("calendar-day");
                    calendar.appendChild(emptyDiv);
                }

                // Generar los días del mes
                for (let i = 1; i <= daysInMonth; i++) {
                    let dayDiv = document.createElement("div");
                    dayDiv.classList.add("calendar-day");
                    dayDiv.innerText = i;

                    let currentDate = new Date(date.getFullYear(), date.getMonth(), i);

                    // ✅ Formatear fecha correctamente sin desfase
                    let formattedDate =
                        currentDate.getFullYear() + "-" +
                        String(currentDate.getMonth() + 1).padStart(2, "0") + "-" +
                        String(currentDate.getDate()).padStart(2, "0");

                    let eventContainer = document.createElement("div");
                    eventContainer.classList.add("event-container");

                    events.forEach(event => {
                        if (formattedDate >= event.fecha_inicio && formattedDate <= event.fecha_fin) {
                            let eventDot = document.createElement("div");
                            eventDot.classList.add("event-dot");
                            eventDot.style.backgroundColor = event.color;

                            let tooltip = document.createElement("div");
                            tooltip.classList.add("tooltip");
                            tooltip.innerText = event.motivo || "Reservado";

                            eventDot.appendChild(tooltip);
                            eventContainer.appendChild(eventDot);
                        }
                    });

                    dayDiv.appendChild(eventContainer);
                    calendar.appendChild(dayDiv);
                }
            }

            prevMonth.addEventListener("click", () => {
                date.setMonth(date.getMonth() - 1);
                renderCalendar();
            });

            nextMonth.addEventListener("click", () => {
                date.setMonth(date.getMonth() + 1);
                renderCalendar();
            });

            fetchEvents();
        });

        function changeSection() {
            const createSection = document.getElementById("section-create");
            const editSection = document.getElementById("section-edit");
            const selector = document.getElementById("option-selector");

            if (selector.checked) {
                createSection.classList.remove("visible-section");
                editSection.classList.add("visible-section");
            } else {
                createSection.classList.add("visible-section");
                editSection.classList.remove("visible-section");
            }
        }

        /** Display de seleccion entre creacion y modificacion*/
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
</body>

</html>