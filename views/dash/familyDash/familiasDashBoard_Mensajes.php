<?php
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['user'])) {
    header("Location: ../../login.php");
    exit();
}

$userName = $_SESSION['user'];

// Obtener la primera letra del nombre del usuario
$firstLetter = strtoupper(substr($userName, 0, 1));

// Generar un color a partir del hash del nombre del usuario
$hash = md5($userName); // Hash MD5 de todo el nombre
$color = substr($hash, 0, 6); // Tomamos los primeros 6 caracteres del hash
$randomColor = '#' . $color; // Formato hexadecimal
?>

<!--
============================================================
 CAMPTRACK DASHBOARD - PANEL DE ADMINISTRACIÓN
============================================================

Autor: Alejandro Roces Fernandez  
Fecha: 11.03.2025  
Versión: 1.0  

Descripción:  
Este archivo representa la interfaz principal del panel de administración de Camptrack.  
Incluye la barra de navegación, el menú lateral y el área de contenido.  

Características principales:  
✔ Diseño responsivo con Bootstrap 5  
✔ Barra lateral con accesos directos a secciones clave  
✔ Barra de navegación superior con menú desplegable  
✔ Breadcrumbs para mejorar la navegación  
✔ Integración con Font Awesome para iconos  

Tecnologías utilizadas:  
- HTML5, CSS3 y JavaScript  
- Bootstrap 5 para la estructura y componentes visuales  
- Font Awesome para iconos  
- jQuery para interactividad  

📦 Dependencias:  

 **CSS** (Estilos)  
  - `assets/css/dash/dashGen/style.min.css` → Estilos generales del dashboard  

 **JavaScript** (Funcionalidades)  
  - `assets/plugins/jquery.min.js` → Librería jQuery  
  - `assets/plugins/bootstrap.bundle.min.js` → Scripts de Bootstrap  
  - `assets/js/app-style-switcher.js` → Personalización de estilos  
  - `assets/js/waves.js` → Efectos visuales  
  - `assets/js/sidebarmenu.js` → Interacciones con la barra lateral  
  - `assets/js/custom.js` → Funcionalidades adicionales  

🔐 Licencia:  
Este código está bajo la licencia **Creative Commons Atribución-NoComercial 4.0 Internacional (CC BY-NC 4.0)**.  
No se permite su uso comercial sin autorización previa del autor.  
Más información en: https://creativecommons.org/licenses/by-nc/4.0/  

Copyright (c) 2025 Alejandro Roces Fernandez  
============================================================
-->

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Camptrack dashboard</title>
    <link rel="icon" type="image/png" sizes="16x16" href="../../../assets/img/logos/logoSF.png">

    <link href="../../../assets/css/dash/dashGen/style.min.css" rel="stylesheet">
    <style>
        th{
            color: white !important;
        }

        .content {
            padding: 2rem;
        }

        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #1565c0;
            color: #ffffff;
        }

        .message-table th,
        .message-table td {
            vertical-align: middle;
            text-align: center;
            font-size: 1.1rem;
        }

        .message-table thead {
            background-color: #1976d2;
            color: #ffffff;
        }

        .message-table td {
            padding: 1rem;
        }

        .message-table td:first-child {
            width: 40px;
        }

        .pagination,
        .records-per-page {
            margin-top: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .attachment-icon {
            color: #1976d2;
            font-size: 1rem;
            margin-left: 0.5rem;
        }

        .unread {
            font-weight: bold;
            color: #0d47a1;
        }

        .form-select {
            background-color: #bbdefb;
            color: #0d47a1;
        }

        .btn-primary {
            background-color: #1976d2;
            border-color: #1976d2;
        }

        .btn-primary:hover {
            background-color: #1565c0;
            border-color: #1565c0;
        }

        .btn-light {
            background-color: #81d4fa;
            color: #0d47a1;
        }

        .btn-light:hover {
            background-color: #4fa3f7;
            color: #ffffff;
        }

        .input-group input {
            background-color: #bbdefb;
            color: #0d47a1;
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
                            <img src="../../../assets/img/logos/logoSF.png" alt="icono" class="dark-logo" style="max-width: 50px; height: auto;" />
                        </b>
                        <span class="logo-text">
                            <img src="../../../assets/img/logos/text-logo.png" alt="texto Icono" class="dark-logo" style="max-width: 150px; height: auto;" />
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
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark d-flex justify-content-end align-items-center" href="#"
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="me-2">👋 ¡Hola, <?php echo htmlspecialchars($userName); ?>!</span>

                                <!-- Círculo con color aleatorio y primera letra -->
                                <span class="profile-circle me-2" style="background-color: <?php echo $randomColor; ?>; color: white; width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                    <?php echo $firstLetter; ?>
                                </span>

                                <i class="fas fa-chevron-down"></i>
                                <div class="dropdown-menu" id="dropdownMenu" role="menu">
                                    <a href="#">Perfil</a>
                                    <a href="#">Configuración</a>
                                    <a href="../logout.php" onclick="return confirm('¿Estás seguro de que quieres cerrar sesión?');">
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="familiasDashBoard.php" aria-expanded="false">
                                <i class="fas fa-home fa-2x me-2"></i> <!-- Casa en inicio -->
                                <span class="hide-menu">INICIO</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="familiasDashBoard_Actividades.php" aria-expanded="false">
                                <i class="fas fa-calendar-alt fa-2x"></i> <!-- Calendario en actividades -->
                                <span class="hide-menu">TUS ACTIVIDADES</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="familiasDashBoard_Chat.php" aria-expanded="false">
                                <i class="fas fa-users fa-2x me-2"></i> <!-- Icono de chat -->
                                <span class="hide-menu">TU CHAT</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="familiasDashBoard_Mensajes.php" aria-expanded="false">
                                <i class="fas fa-envelope fa-2x me-2"></i> <!-- Icono de sobre para mensajes -->
                                <span class="hide-menu">MENSAJES</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="familiasDashBoard_Emergencias.php" aria-expanded="false">
                                <i class="fas fa-exclamation-triangle fa-2x me-2"></i> <!-- Señal de alerta en emergencia -->
                                <span class="hide-menu">EMERGENCIAS</span>
                            </a>
                        </li>



                        <li class="sidebar-item" style="position: absolute; bottom: 0; width: 100%; margin-bottom: 10px;">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../logout.php" aria-expanded="false" onclick="return confirm('¿Estás seguro de que quieres cerrar sesión?');">
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
                                    <li class="breadcrumb-item"><a href="familiasDashBoard.php">Inicio</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Mensajes</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <main>

                <div class="container content">
                    <div class="card">
                        <div class="card-header">Mensajes Recibidos</div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <label for="recordsPerPage">Registros</label>
                                    <select id="recordsPerPage" class="form-select d-inline w-auto">
                                        <option>10</option>
                                        <option>25</option>
                                        <option>50</option>
                                        <option>100</option>
                                    </select>
                                    por página
                                </div>
                                <div class="input-group w-25">
                                    <input type="text" class="form-control" placeholder="Buscar en recibidos">
                                    <button class="btn btn-primary" type="button">Buscar</button>
                                </div>
                            </div>
                            <table class="table table-hover message-table">
                                <thead>
                                    <tr>
                                        <th>Leído</th>
                                        <th>Remitente</th>
                                        <th>Asunto</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>Martínez Cano, Laura</td>
                                        <td class="unread">Confirmación de Inscripción - Campamento de Verano <i class="attachment-icon bi bi-paperclip"></i></td>
                                        <td>14/03/2025</td>
                                        <td>18:49</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" checked></td>
                                        <td>Pérez Gómez, Andrés</td>
                                        <td>Lista de Materiales para Senderismo</td>
                                        <td>14/03/2025</td>
                                        <td>14:58</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>Ruiz Sánchez, Clara</td>
                                        <td class="unread">Horario de Actividades - Campamento Lago Azul <i class="attachment-icon bi bi-paperclip"></i></td>
                                        <td>14/03/2025</td>
                                        <td>10:10</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" checked></td>
                                        <td>Hernández Torres, Pablo</td>
                                        <td>Normas de Seguridad en Excursiones</td>
                                        <td>12/03/2025</td>
                                        <td>11:55</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>Gómez López, Silvia</td>
                                        <td class="unread">Información sobre Talleres de Manualidades <i class="attachment-icon bi bi-paperclip"></i></td>
                                        <td>10/03/2025</td>
                                        <td>08:57</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>Gómez López, Silvia</td>
                                        <td class="unread">Información sobre Talleres de Manualidades <i class="attachment-icon bi bi-paperclip"></i></td>
                                        <td>10/03/2025</td>
                                        <td>08:57</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" checked></td>
                                        <td>Vega Ramírez, Luis</td>
                                        <td>Planificación de Excursiones Nocturnas</td>
                                        <td>09/03/2025</td>
                                        <td>16:30</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>Fernández Moreno, Alicia</td>
                                        <td class="unread">Reglamento para Actividades Acuáticas</td>
                                        <td>08/03/2025</td>
                                        <td>09:15</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" checked></td>
                                        <td>Sánchez Vidal, Mario</td>
                                        <td>Menú Semanal para el Campamento</td>
                                        <td>07/03/2025</td>
                                        <td>11:45</td>
                                    </tr>
                                    <!-- 8 nuevas filas añadidas -->
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>Martínez García, Juan</td>
                                        <td>Preparación de Materiales para Actividades al Aire Libre</td>
                                        <td>06/03/2025</td>
                                        <td>10:30</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" checked></td>
                                        <td>Pérez Rodríguez, Ana</td>
                                        <td>Planificación de Actividades para el Fin de Semana</td>
                                        <td>05/03/2025</td>
                                        <td>14:45</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>Jiménez López, Raúl</td>
                                        <td>Revisión de Seguridad en el Campamento</td>
                                        <td>04/03/2025</td>
                                        <td>13:00</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>Ramírez Díaz, Teresa</td>
                                        <td>Contratación de Monitores para el Campamento</td>
                                        <td>03/03/2025</td>
                                        <td>09:30</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>Lopez Fernández, Marta</td>
                                        <td>Plan de Alimentación para el Campamento</td>
                                        <td>02/03/2025</td>
                                        <td>17:20</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>Cruz Pérez, José</td>
                                        <td>Organización de Juegos en el Campamento</td>
                                        <td>01/03/2025</td>
                                        <td>11:05</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>González Hernández, Laura</td>
                                        <td>Preparación de Material Didáctico para Talleres</td>
                                        <td>28/02/2025</td>
                                        <td>15:40</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" checked></td>
                                        <td>Morales Ruiz, Víctor</td>
                                        <td>Evaluación de Actividades y Feedback de los Participantes</td>
                                        <td>27/02/2025</td>
                                        <td>18:25</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>Suárez Gómez, Patricia</td>
                                        <td>Revisión de Equipos y Materiales para Campamento</td>
                                        <td>26/02/2025</td>
                                        <td>10:10</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>Torres Fernández, Sergio</td>
                                        <td>Organización de Actividades Nocturnas para los Participantes</td>
                                        <td>25/02/2025</td>
                                        <td>09:50</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" checked></td>
                                        <td>Vázquez Martín, Sonia</td>
                                        <td>Planificación de Actividades en el Lago del Campamento</td>
                                        <td>24/02/2025</td>
                                        <td>16:15</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>Fernández Ruiz, Javier</td>
                                        <td>Creación de Programas para los Niños</td>
                                        <td>23/02/2025</td>
                                        <td>14:00</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>González López, Isabel</td>
                                        <td>Revisión de Protocolos de Seguridad para Excursiones</td>
                                        <td>22/02/2025</td>
                                        <td>13:45</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="pagination justify-content-center">
                                <button class="btn btn-light">&lt;</button>
                                <button class="btn btn-primary">1</button>
                                <button class="btn btn-light">2</button>
                                <button class="btn btn-light">3</button>
                                <button class="btn btn-light">...</button>
                                <button class="btn btn-light">12</button>
                                <button class="btn btn-light">&gt;</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="../../../assets/plugins/jquery.min.js"></script>
    <script src="../../../assets/plugins/bootstrap.bundle.min.js"></script>
    <script src="../../../assets/js/app-style-switcher.js"></script>
    <script src="../../../assets/js/waves.js"></script>
    <script src="../../../assets/js/sidebarmenu.js"></script>
    <script src="../../../assets/js/custom.js"></script>
</body>

</html>