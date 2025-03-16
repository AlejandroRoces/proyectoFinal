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
$hash = md5($userName);
$color = substr($hash, 0, 6);
$randomColor = '#' . $color;
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
        .menu {
            display: flex;
            flex-direction: column;
            /* Coloca los botones en una columna */
            align-items: center;
            /* Centra los botones */
            gap: 20px;
            /* Aumenta la separación entre botones */
            margin-bottom: 20px;
            width: 100%;
        }

        button {
            padding: 20px;
            /* Aumenta el tamaño del botón */
            width: 80%;
            /* Ajusta el ancho para ocupar más espacio */
            font-size: 1.5rem;
            /* Aumenta el tamaño del texto */
            cursor: pointer;
            border: none;
            background-color: #007BFF;
            color: white;
            border-radius: 10px;
        }


        .info {
            display: none;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            max-width: auto;
            margin: 0 auto;
            background-color: #f8f9fa;
        }

        main {
            font-family: Arial, sans-serif;
            background-color: #e3f2fd;
            margin: 0;
            padding: 20px;
            color: #0d47a1;
            min-height: 100vh;
            height: auto;
            box-sizing: border-box;
        }

        h2 {
            color: #0d47a1;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table thead {
            background-color: #1565c0;
            color: white;
        }

        .table tbody tr:nth-child(even) {
            background-color: #bbdefb;
        }

        .table tbody tr:nth-child(odd) {
            background-color: #e3f2fd;
        }

        .table-bordered th,
        .table-bordered td {
            border: 2px solid #0d47a1;
        }

        @media (max-width: 768px) {
            h2 {
                font-size: 1.5rem;
            }

            th,
            td {
                font-size: 0.8rem;
            }
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
                    <a class="navbar-brand ms-4" href="monisDashBoard.php">

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
                            <a class="nav-toggler nav-link waves-effect waves-light text-white " href="javascript:void(0)">
                                <i class="ti-menu ti-close"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav me-auto mt-md-0 ">
                        <li class="nav-item" style="width: 200px;"></li> <!-- Espacio en blanco conservado -->
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="monisDashBoard.php" aria-expanded="false">
                                <i class="fas fa-home me-2"></i>
                                <span class="hide-menu">Inicio</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="monisDashBoard_Chat.php" aria-expanded="false">
                                <i class="fas fa-comments me-2"></i>
                                <span class="hide-menu">Chat</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="monisDashBoard_Instalaciones.php" aria-expanded="false">
                                <i class="fas fa-building me-2"></i>
                                <span class="hide-menu">Instalaciones</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="monisDashBoard_Familias.php" aria-expanded="false">
                                <i class="fas fa-users me-2"></i>
                                <span class="hide-menu">Familias</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="monisDashBoard_Acampados.php" aria-expanded="false">
                                <i class="fas fa-list me-2"></i>
                                <span class="hide-menu">Acampados</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false" onclick="toggleDropdown('actividadesDropdown')">
                                <i class="fas fa-futbol me-2"></i>
                                <span class="hide-menu">Actividades</span>
                                <i class="fas fa-chevron-down float-end"></i>
                            </a>
                            <ul id="actividadesDropdown" class="dropdown-content" style="display: none;">
                                <li><a href="monisDashBoard_Juegos.php"><i class="fas fa-gamepad me-2"></i>Juegos</a></li>
                                <li><a href="monisDashBoard_Veladas.php"><i class="fas fa-moon me-2"></i>Veladas</a></li>
                                <li><a href="monisDashBoard_equipos.php"><i class="fas fa-users-cog me-2"></i>Equipos</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="monisDashBoard_Almacen.php" aria-expanded="false">
                                <i class="fas fa-warehouse me-2"></i>
                                <span class="hide-menu">Almacén</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="monisDashBoard_Horarios.php" aria-expanded="false">
                                <i class="fas fa-clock me-2"></i>
                                <span class="hide-menu">Horarios</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="monisDashBoard_Materiales.php" aria-expanded="false">
                                <i class="fas fa-box-open me-2"></i>
                                <span class="hide-menu">Materiales</span>
                            </a>
                        </li>

                        <!-- Cerrar sesión -->
                        <li class="sidebar-item" style="position: absolute; bottom: 0; width: 100%; margin-bottom: 10px;">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../logout.php" aria-expanded="false" onclick="return confirm('¿Estás seguro de que quieres cerrar sesión?');">
                                <i class="fas fa-sign-out-alt me-2"></i>
                                <span class="hide-menu">Cerrar sesión</span>
                            </a>
                        </li>
                    </ul>

                    <script>
                        function toggleDropdown(id) {
                            var dropdown = document.getElementById(id);
                            dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
                        }
                    </script>
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
                                    <li class="breadcrumb-item active" aria-current="page">Horarios</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <main>
                <div class="menu">
                    <button onclick="mostrarInfo('junio')">Campamento Junio</button>
                    <button onclick="mostrarInfo('julio')">Campamento Julio</button>
                    <button onclick="mostrarInfo('agosto')">Campamento Agosto</button>
                    <button onclick="mostrarInfo('septiembre')">Campamento Septiembre</button>
                </div>

                <div id="junio" class="info">
                    <div class="container mt-4">
                        <h2 class="text-center fw-bold">CAMPAMENTO JUNIO</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>Hora</th>
                                        <th>Viernes 2 (Grecia)</th>
                                        <th>Sábado 3 (África)</th>
                                        <th>Domingo 4 (Asia)</th>
                                        <th>Lunes 5 (Oceanía)</th>
                                        <th>Martes 6 (Viajando)</th>
                                        <th>Miércoles 7 (Viajando)</th>
                                        <th>Jueves 8 (América)</th>
                                        <th>Viernes 9 (Europa)</th>
                                        <th>Sábado 10 (Grecia)</th>
                                        <th>Domingo 11 (Regreso)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>08:45</td>
                                        <td>Levantarse</td>
                                        <td>Levantarse</td>
                                        <td>Levantarse</td>
                                        <td>Levantarse</td>
                                        <td>Oración monitores</td>
                                        <td>Oración monitores</td>
                                        <td>Levantarse</td>
                                        <td>Levantarse</td>
                                        <td>Levantarse</td>
                                        <td>Regreso a casa</td>
                                    </tr>
                                    <tr>
                                        <td>09:00</td>
                                        <td colspan="9">Presentación del día</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>09:30</td>
                                        <td colspan="9">Desayuno</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>10:00</td>
                                        <td colspan="9">Limpieza</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>10:30</td>
                                        <td>Formación</td>
                                        <td>Cantos</td>
                                        <td>Misa</td>
                                        <td>Formación</td>
                                        <td>Actividad</td>
                                        <td>Actividad</td>
                                        <td>Formación</td>
                                        <td>Formación</td>
                                        <td>Libre / Preparación Misa</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>12:00</td>
                                        <td>Taller</td>
                                        <td>Taller</td>
                                        <td>Taller</td>
                                        <td>Taller</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>Taller</td>
                                        <td>Taller</td>
                                        <td>Libre</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>14:00</td>
                                        <td colspan="9">Comida</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>16:00</td>
                                        <td>Piscina/Playa</td>
                                        <td>Piscina/Playa</td>
                                        <td>Piscina/Playa</td>
                                        <td>Piscina/Playa</td>
                                        <td>Orden de gustos de energía</td>
                                        <td>Día de feria</td>
                                        <td>Got Talent / Olimpiadas</td>
                                        <td>Gynkana guerra</td>
                                        <td>Misa / Corazones</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>18:00</td>
                                        <td>Normas</td>
                                        <td>Trivial</td>
                                        <td>Atropa la bandera / Guerra de pintura</td>
                                        <td>Gymkana agua</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>20:00</td>
                                        <td colspan="9">Cena</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>21:00</td>
                                        <td>Ceremonia apertura</td>
                                        <td>Noche de terror</td>
                                        <td>Grand Prix</td>
                                        <td>Pollos y cocos</td>
                                        <td>Bromas y vídeos / Volado fugitivos</td>
                                        <td>Furor</td>
                                        <td>MacGyver</td>
                                        <td>Manta mágica</td>
                                        <td>Noche de Gala</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>23:30</td>
                                        <td colspan="9">Silencio</td>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="julio" class="info">
                    <div class="container mt-4">
                        <h2 class="text-center fw-bold">CAMPAMENTO JULIO</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>Hora</th>
                                        <th>Viernes 2 (Bosque Encantado)</th>
                                        <th>Sábado 3 (Safari Salvaje)</th>
                                        <th>Domingo 4 (Ruta Oriental)</th>
                                        <th>Lunes 5 (Islas Perdidas)</th>
                                        <th>Martes 6 (Expedición)</th>
                                        <th>Miércoles 7 (Expedición)</th>
                                        <th>Jueves 8 (Selva Misteriosa)</th>
                                        <th>Viernes 9 (Reino Mágico)</th>
                                        <th>Sábado 10 (Bosque Encantado)</th>
                                        <th>Domingo 11 (Regreso)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>08:45</td>
                                        <td>Despertar en la Naturaleza</td>
                                        <td>Comienza la Aventura</td>
                                        <td>Buenos Días Exploradores</td>
                                        <td>Alarma en la Isla</td>
                                        <td>Consejo de Sabios</td>
                                        <td>Consejo de Sabios</td>
                                        <td>Campistas en Acción</td>
                                        <td>Comienzo de la Jornada</td>
                                        <td>Últimos Preparativos</td>
                                        <td>Regreso a Casa</td>
                                    </tr>
                                    <tr>
                                        <td>09:00</td>
                                        <td colspan="9">Plan del Día</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>09:30</td>
                                        <td colspan="9">Banquete Matutino</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>10:00</td>
                                        <td colspan="9">Misión: Zona Limpia</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>10:30</td>
                                        <td>Desafío del Sabio</td>
                                        <td>Canciones del Campamento</td>
                                        <td>Ritual del Alma</td>
                                        <td>Exploradores en Acción</td>
                                        <td>Prueba del Viajero</td>
                                        <td>Prueba del Viajero</td>
                                        <td>Lección del Guía</td>
                                        <td>Secreto del Reino</td>
                                        <td>Tiempo Libre / Últimos Preparativos</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>12:00</td>
                                        <td>Creadores del Futuro</td>
                                        <td>Artes Tribales</td>
                                        <td>Forjadores de Leyendas</td>
                                        <td>Laboratorio Creativo</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>Manos a la Obra</td>
                                        <td>Obras Maestras</td>
                                        <td>Relajación y Reflexión</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>14:00</td>
                                        <td colspan="9">Festín del Medio Día</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>16:00</td>
                                        <td>Aguas Salvajes</td>
                                        <td>Exploración Marina</td>
                                        <td>Diversión Acuática</td>
                                        <td>Isla de los Náufragos</td>
                                        <td>Competencia de Energía</td>
                                        <td>Feria de las Culturas</td>
                                        <td>Habilidad y Talento</td>
                                        <td>Batalla de Estrategas</td>
                                        <td>Ceremonia de Espíritus</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>18:00</td>
                                        <td>Código del Campamento</td>
                                        <td>Desafío del Conocimiento</td>
                                        <td>Caza del Tesoro</td>
                                        <td>Retos en la Jungla</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>20:00</td>
                                        <td colspan="9">Cena de los Aventureros</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>21:00</td>
                                        <td>Encendido de la Antorcha</td>
                                        <td>Historia de Pesadillas</td>
                                        <td>Juegos de la Tribu</td>
                                        <td>Prueba del Náufrago</td>
                                        <td>Noches de Bromas y Misterios</td>
                                        <td>Batalla de Equipos</td>
                                        <td>Reto del Inventor</td>
                                        <td>La Manta Mágica</td>
                                        <td>Fiesta de los Guerreros</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>23:30</td>
                                        <td colspan="9">Silencio en el Campamento</td>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="agosto" class="info">
                    <div class="container mt-4">
                        <h2 class="text-center fw-bold">CAMPAMENTO AGOSTO</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>Hora</th>
                                        <th>Viernes 2 (Tierra de Leyendas)</th>
                                        <th>Sábado 3 (Expedición Salvaje)</th>
                                        <th>Domingo 4 (Rumbo a Oriente)</th>
                                        <th>Lunes 5 (Aventura en las Islas)</th>
                                        <th>Martes 6 (Jornada Mística)</th>
                                        <th>Miércoles 7 (Travesía Inexplorada)</th>
                                        <th>Jueves 8 (El Nuevo Mundo)</th>
                                        <th>Viernes 9 (Tierras Antiguas)</th>
                                        <th>Sábado 10 (El Último Desafío)</th>
                                        <th>Domingo 11 (Regreso a Casa)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>08:45</td>
                                        <td>Amanecer del Guerrero</td>
                                        <td>Primer Desafío</td>
                                        <td>El Sol del Oriente</td>
                                        <td>Campamento en Marcha</td>
                                        <td>Consejo de Maestros</td>
                                        <td>Consejo de Maestros</td>
                                        <td>Comienzo del Día</td>
                                        <td>El Despertar de los Héroes</td>
                                        <td>Última Etapa</td>
                                        <td>Vuelta al Hogar</td>
                                    </tr>
                                    <tr>
                                        <td>09:00</td>
                                        <td colspan="9">Estrategia del Día</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>09:30</td>
                                        <td colspan="9">Banquete Matinal</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>10:00</td>
                                        <td colspan="9">Limpieza del Territorio</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>10:30</td>
                                        <td>La Senda del Sabio</td>
                                        <td>Cantos de la Tribu</td>
                                        <td>Ceremonia Espiritual</td>
                                        <td>Exploración del Conocimiento</td>
                                        <td>Prueba del Destino</td>
                                        <td>Prueba del Destino</td>
                                        <td>Sabiduría del Chamán</td>
                                        <td>Lecciones del Pasado</td>
                                        <td>Preparación del Último Ritual</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>12:00</td>
                                        <td>Creación del Futuro</td>
                                        <td>Artes Ancestrales</td>
                                        <td>La Forja del Guerrero</td>
                                        <td>Manos a la Obra</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>Proyectos del Campamento</td>
                                        <td>Obras del Explorador</td>
                                        <td>Momento de Reflexión</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>14:00</td>
                                        <td colspan="9">Gran Festín</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>16:00</td>
                                        <td>Desafío Acuático</td>
                                        <td>Misión en el Mar</td>
                                        <td>Juegos en el Agua</td>
                                        <td>Isla del Tesoro</td>
                                        <td>Competencia de Energía</td>
                                        <td>Día del Trueque</td>
                                        <td>Competencia del Talento</td>
                                        <td>Batalla de Estrategias</td>
                                        <td>El Ritual Final</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>18:00</td>
                                        <td>Código de los Guerreros</td>
                                        <td>Desafío de Sabios</td>
                                        <td>Captura el Tótem</td>
                                        <td>Pruebas de Resistencia</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>20:00</td>
                                        <td colspan="9">Cena de los Viajeros</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>21:00</td>
                                        <td>Encendido de la Llama Sagrada</td>
                                        <td>Noches de Misterio</td>
                                        <td>Reto de los Clanes</td>
                                        <td>Supervivencia en la Isla</td>
                                        <td>Historias y Leyendas</td>
                                        <td>Competencia Épica</td>
                                        <td>Reto del Inventor</td>
                                        <td>La Magia de la Tribu</td>
                                        <td>Fiesta del Cierre</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>23:30</td>
                                        <td colspan="9">Descanso del Guerrero</td>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="septiembre" class="info">
                    <div class="container mt-4">
                        <h2 class="text-center fw-bold">CAMPAMENTO SEPTIEMBRE</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>Hora</th>
                                        <th>Viernes 2 (Bosque Mágico)</th>
                                        <th>Sábado 3 (Safari Nocturno)</th>
                                        <th>Domingo 4 (Ruta del Dragón)</th>
                                        <th>Lunes 5 (Isla Perdida)</th>
                                        <th>Martes 6 (Misión Especial)</th>
                                        <th>Miércoles 7 (Travesía Épica)</th>
                                        <th>Jueves 8 (Mundo Desconocido)</th>
                                        <th>Viernes 9 (La Gran Ciudad)</th>
                                        <th>Sábado 10 (Última Frontera)</th>
                                        <th>Domingo 11 (Regreso al Hogar)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>08:45</td>
                                        <td>Despertar en la Naturaleza</td>
                                        <td>Inicia la Expedición</td>
                                        <td>Primer Rayo del Sol</td>
                                        <td>Exploradores en Marcha</td>
                                        <td>Plan de la Misión</td>
                                        <td>Preparativos de Viaje</td>
                                        <td>Amanecer del Aventurero</td>
                                        <td>Inicio del Reto</td>
                                        <td>Últimos Momentos</td>
                                        <td>De vuelta a Casa</td>
                                    </tr>
                                    <tr>
                                        <td>09:00</td>
                                        <td colspan="9">Briefing del Día</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>09:30</td>
                                        <td colspan="9">Desayuno Energético</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>10:00</td>
                                        <td colspan="9">Orden y Preparación</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>10:30</td>
                                        <td>Entrenamiento de Supervivencia</td>
                                        <td>Cantos Tribales</td>
                                        <td>Ceremonia del Espíritu</td>
                                        <td>Exploración en la Jungla</td>
                                        <td>Desafío del Viajero</td>
                                        <td>Prueba del Explorador</td>
                                        <td>Habilidades del Guerrero</td>
                                        <td>Ritual de los Ancestros</td>
                                        <td>Tiempo Libre / Preparativos Finales</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>12:00</td>
                                        <td>Creación y Construcción</td>
                                        <td>Arte Salvaje</td>
                                        <td>Fabricación de Artefactos</td>
                                        <td>Manos a la Obra</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>Elaboración de Tótems</td>
                                        <td>Proyecto Final</td>
                                        <td>Momento de Reflexión</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>14:00</td>
                                        <td colspan="9">Gran Festín del Explorador</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>16:00</td>
                                        <td>Aventura en el Agua</td>
                                        <td>Exploración en el Lago</td>
                                        <td>Desafío Acuático</td>
                                        <td>Juegos en la Playa</td>
                                        <td>Batalla de Energía</td>
                                        <td>Feria de Retos</td>
                                        <td>Competencia de Supervivencia</td>
                                        <td>Prueba del Conquistador</td>
                                        <td>Ceremonia de Cierre</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>18:00</td>
                                        <td>Reglas de Convivencia</td>
                                        <td>Desafío del Conocimiento</td>
                                        <td>Caza del Amuleto</td>
                                        <td>Pruebas de Agilidad</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>20:00</td>
                                        <td colspan="9">Cena del Explorador</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>21:00</td>
                                        <td>Encendido de la Llama</td>
                                        <td>Noche de Misterios</td>
                                        <td>Prueba del Clan</td>
                                        <td>Supervivencia en la Isla</td>
                                        <td>Bromas y Relatos</td>
                                        <td>Batalla Final</td>
                                        <td>El Reto del Inventor</td>
                                        <td>Magia del Viaje</td>
                                        <td>Fiesta de Despedida</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>23:30</td>
                                        <td colspan="9">Silencio en el Campamento</td>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                            </table>
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
    <script>
        function mostrarInfo(mes) {
            document.querySelectorAll('.info').forEach(div => div.style.display = 'none');
            document.getElementById(mes).style.display = 'block';
        }
    </script>
</body>

</html>