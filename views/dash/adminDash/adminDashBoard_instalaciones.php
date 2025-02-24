<?php
require_once '../../../model/database/connection.php';

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
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Camptrack dashboard</title>
    <link rel="icon" type="image/png" sizes="16x16" href="../../../assets/img/logos/logoSF.png">

    <link href="../../../assets/css/dash/dashGen/style.min.css" rel="stylesheet">
    <link href="../../../assets/css/adminDash/slider_activities.css" rel="stylesheet">

    <style>
        .instalacion {
            width: 150px;
            height: 150px;
            background-color: #007bff;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
            position: relative;
        }

        .instalacion:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .instalacion .info {
            display: none;
            position: absolute;
            bottom: -40px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px;
            border-radius: 5px;
            width: 100%;
            font-size: 14px;
        }

        .instalacion:hover .info {
            display: block;
        }


        .info-container {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background: rgba(255, 255, 255, 0.1);
            color: black;
            font-size: 18px;
            border-radius: 10px;
        }

        .toggle-container {
            display: flex;
            justify-content: left;
            align-items: center;
            margin-bottom: 20px;
        }

        .toggle-wrapper {
            position: relative;
            width: 250px;
            height: 45px;
            border-radius: 25px;
            background-color: #ccc;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .toggle-wrapper input {
            display: none;
        }

        .toggle-label {
            width: 100%;
            height: 100%;
            border-radius: 25px;
            background: #444;
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 10px;
            color: white;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.4s;
        }

        .toggle-label::before {
            content: "";
            position: absolute;
            width: calc(50% - 5px);
            /* Reducido para evitar que sobresalga */
            height: 80%;
            background: white;
            border-radius: 25px;
            left: 5px;
            transition: 0.4s;
        }

        .toggle-wrapper input:checked+.toggle-label::before {
            left: calc(50% + 2px);
            /* Ajuste fino para evitar desbordes */
        }

        .toggle-wrapper input:checked+.toggle-label {
            background: #007bff;
            /* Cambia de color cuando está en "Reservas" */
        }

        .toggle-text {
            position: relative;
            z-index: 1;
        }

        <!-- calendario-->.calendario {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .calendar-container {
            width: 90%;
            max-width: 1000px;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .calendar-header button {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
        }

        .calendar-day {
            padding: 10px;
            background: #e3e3e3;
            text-align: center;
            min-height: 80px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            position: relative;
            font-size: 1rem;
        }

        .event-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 5px;
            max-width: 40px;
        }

        .event-dot {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            display: inline-block;
            cursor: pointer;
            position: relative;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .calendar-grid {
                grid-template-columns: repeat(7, minmax(30px, 1fr));
                /* Espacio dinámico */
                gap: 2px;
            }

            .calendar-day {
                min-height: 50px;
                font-size: 0.8rem;
            }

            .event-dot {
                width: 10px;
                height: 10px;
            }

            .calendar-header button {
                font-size: 1.2rem;
            }
        }

        .tooltip {
            visibility: hidden;
            width: 120px;
            background-color: black;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 12px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .event-dot:hover .tooltip {
            visibility: visible;
            opacity: 1;
        }



        .legend-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
            justify-content: center;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            padding: 5px 10px;
            border-radius: 5px;
            background: #f8f9fa;
            border: 1px solid #ddd;
        }

        .color-box {
            width: 20px;
            height: 20px;
            border-radius: 4px;
            display: inline-block;
        }

        /**/
        .switch-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px;
        }

        .switch-wrapper {
            position: relative;
            display: inline-block;
            width: 100px;
            height: 40px;
        }

        .switch-wrapper input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .switch-label {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            border-radius: 20px;
            transition: 0.4s;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 5px;
            font-size: 14px;
            font-weight: bold;
            color: white;
        }

        .switch-label::before {
            content: "";
            position: absolute;
            height: 32px;
            width: 45px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            border-radius: 18px;
            transition: 0.4s;
        }

        input:checked+.switch-label {
            background-color: #007bff;
        }

        input:checked+.switch-label::before {
            transform: translateX(50px);
        }

        .switch-text {
            z-index: 1;
            width: 50%;
            text-align: center;
        }

        .content-section {
            display: none;
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .visible-section {
            display: block;
        }
    </style>
</head>

<body>
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
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="adminDashBoard.php"
                                aria-expanded="false">
                                <i class="fas fa-home me-2"></i> <!-- Icono con margen a la derecha -->
                                <span class="hide-menu">Inicio</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="adminDashBoard_instalacionesphp" aria-expanded="false">
                                <i class="fas fa-building me-2"></i> <!-- Icono con margen a la derecha -->
                                <span class="hide-menu">Instalaciones</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="adminDashBoard_Trabajadores.php" aria-expanded="false">
                                <i class="fas fa-users me-2"></i> <!-- Icono con margen a la derecha -->
                                <span class="hide-menu">Trabajadores</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="adminDashBoard_Inscripciones.php" aria-expanded="false">
                                <i class="fas fa-list me-2"></i> <!-- Icono de lista -->
                                <span class="hide-menu">Inscripciones</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="adminDashBoard_Estadisticas.php" aria-expanded="false">
                                <i class="fas fa-chart-line me-2"></i> <!-- Icono con margen a la derecha -->
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



                        <!-- Aquí va el nuevo item para cerrar sesión -->
                        <li class="sidebar-item"
                            style="position: absolute; bottom: 0; width: 100%; margin-bottom: 10px;">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../logout.php"
                                aria-expanded="false"
                                onclick="return confirm('¿Estás seguro de que quieres cerrar sesión?');">
                                <i class="fas fa-sign-out-alt me-2"></i> <!-- Icono de cerrar sesión -->
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
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
                    <h2 class="mb-4 text-center">Reservas</h2>

                    <div class="calendario ">
                        <div class="reservas-container">
                            <div class="calendar-container">
                                <div class="calendar-header">
                                    <button id="prevMonth">&#9665;</button>
                                    <h2 id="monthYear"></h2>
                                    <button id="nextMonth">&#9655;</button>
                                </div>
                                <div class="calendar-grid" id="calendar"></div>
                            </div>
                        </div>
                    </div>
                    <h4 class="text-center mt-4">Leyenda de Instalaciones</h4>
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
                    <div class="switch-container">
                        <div class="switch-wrapper">
                            <input type="checkbox" id="option-selector" onchange="changeSection()">
                            <label for="option-selector" class="switch-label">
                                <span class="switch-text">Crear</span>
                                <span class="switch-text">Modificar</span>
                            </label>
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
                const initialImage = container.style.backgroundImage;  // Guarda la imagen inicial
                const hoverImage = `url(${container.getAttribute('data-image')})`;

                container.addEventListener('mouseenter', () => {
                    container.style.backgroundImage = hoverImage;
                });

                container.addEventListener('mouseleave', () => {
                    container.style.backgroundImage = initialImage;
                });
            });

            /////
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
            <!--calendario-->
            document.addEventListener("DOMContentLoaded", function () {
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
                    let daysInMonth = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
                    monthYear.innerText = date.toLocaleDateString("es-ES", { month: "long", year: "numeric" });

                    for (let i = 0; i < firstDay; i++) {
                        let emptyDiv = document.createElement("div");
                        emptyDiv.classList.add("calendar-day");
                        calendar.appendChild(emptyDiv);
                    }

                    for (let i = 1; i <= daysInMonth; i++) {
                        let dayDiv = document.createElement("div");
                        dayDiv.classList.add("calendar-day");
                        dayDiv.innerText = i;

                        let currentDate = new Date(date.getFullYear(), date.getMonth(), i);
                        let formattedDate = currentDate.toISOString().split("T")[0];

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



            /** */
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