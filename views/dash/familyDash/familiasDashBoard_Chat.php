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
                                    <li class="breadcrumb-item active" aria-current="page">Chat</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <main class="main-fondo">

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