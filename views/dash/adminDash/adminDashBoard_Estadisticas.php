<!--
============================================================
 CAMPTRACK DASHBOARD - PANEL DE ESTADISTICAS
============================================================

Autor: Alejandro Roces Fernández  
Fecha: 11.03.2025  
Versión: 1.0  

Descripción:  
Este archivo representa la interfaz del panel de administración del sistema **Camptrack**.  
Incluye el diseño de la barra de navegación, la barra lateral y el contenido principal,  
mostrando estadísticas clave como:  
- Número de trabajadores, clientes e instalaciones  
- Actividades registradas  
- Gráfico interactivo de visitas a la página web  

Tecnologías utilizadas:  
- HTML5, CSS3 y JavaScript → Estructura, estilos y funcionalidades  
- Bootstrap 5 → Componentes visuales y responsividad  
- Font Awesome → Iconos personalizados  
- Lightweight Charts → Representación gráfica de datos  

📂 Dependencias:  

 **CSS** (Estilos)  
  - `assets/css/style.css` → Estilos generales del dashboard  
  - `assets/css/adminDash/estadistics.css` → Estilos personalizados para estadísticas  
  - `assets/libs/bootstrap/bootstrap.min.css` → Estilos de Bootstrap  
  - `assets/libs/fontawesome/css/all.min.css` → Iconos Font Awesome  

 **JavaScript** (Funcionalidades)  
  - `assets/js/dashboardAdmin/estadistics-counters.js` → Contadores estadísticos  
  - `assets/js/dashboardAdmin/estadistics-char.js` → Gráfico de visualizaciones  
  - `assets/js/main.js` → Funcionalidades interactivas y eventos  
  - `assets/js/charts.js` → Configuración y renderizado de gráficos  
  - `assets/libs/bootstrap/bootstrap.bundle.min.js` → Scripts de Bootstrap  
  - `assets/libs/lightweight-charts/lightweight-charts.min.js` → Librería de gráficos  

Características destacadas:  
✔ Animaciones y efectos visuales en las tarjetas de estadísticas  
✔ Gráfica dinámica de visitas con datos de varios meses  
✔ Diseño responsivo adaptable a diferentes dispositivos  
✔ Interacción con la barra de navegación y el menú lateral  

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
    <link href="../../../assets/css/adminDash/estadistics.css" rel="stylesheet">
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
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#"
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                BIENVENIDO ALEJANDRO
                                <img src="../../../assets/img/log/FOTO CARNET ALEJANDRO.jpg" alt="user" class="profile-pic me-2">
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="adminDashBoard.php" aria-expanded="false">
                                <i class="fas fa-home me-2"></i>
                                <span class="hide-menu">Inicio</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="adminDashBoard_instalaciones.php" aria-expanded="false">
                                <i class="fas fa-building me-2"></i>
                                <span class="hide-menu">Instalaciones</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="adminDashBoard_Trabajadores.php" aria-expanded="false">
                                <i class="fas fa-users me-2"></i>
                                <span class="hide-menu">Trabajadores</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="adminDashBoard_Inscripciones.php" aria-expanded="false">
                                <i class="fas fa-list me-2"></i>
                                <span class="hide-menu">Inscripciones</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="adminDashBoard_Estadisticas.php" aria-expanded="false">
                                <i class="fas fa-chart-line me-2"></i>
                                <span class="hide-menu">Estadísticas</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="adminDashBoard_Actividades.php" aria-expanded="false">
                                <i class="fas fa-calendar me-2"></i>
                                <span class="hide-menu">Actividades</span>
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
                                    <li class="breadcrumb-item"><a href="adminDashBoard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Estadisticas</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <main>
                <div class="container py-5">
                    <div class="row g-4 text-center justify-content-center">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="counter-box">
                                <i class="fas fa-user"></i>
                                <div class="num" data-val="40">000</div>
                                <div class="text">Trabajadores</div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="counter-box">
                                <i class="fas fa-users"></i>
                                <div class="num" data-val="2200">000</div>
                                <div class="text">Clientes</div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="counter-box">
                                <i class="fas fa-futbol"></i>
                                <div class="num" data-val="30">000</div>
                                <div class="text">Actividades </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="counter-box">
                                <i class="fas fa-building"></i>
                                <div class="num" data-val="6">000</div>
                                <div class="text">Instalaciones</div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="counter-box chart-box">
                                <div id="container"></div>
                                <div class="text">Visitas a la pagina web</div>
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
    <script src="../../../assets/js/dashboardAdmin/estadistics-counters.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightweight-charts@3.4.0/dist/lightweight-charts.standalone.production.js"></script>
    <script src="../../../assets/js/dashboardAdmin/estadistics-char.js"></script>

</body>

</html>