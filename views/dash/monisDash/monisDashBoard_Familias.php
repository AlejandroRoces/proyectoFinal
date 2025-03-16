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
        main {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f4f8;
            color: #333;
            min-height: 100vh;
        }

        .nav-tabs {
            background-color: #007bff;
            border-radius: 10px;
            padding: 10px;
            display: flex;
            justify-content: center;
        }

        .nav-tabs .nav-item {
            margin: 0 10px;
        }

        .nav-tabs .nav-item .nav-link {
            color: white;
            font-weight: bold;
            border-radius: 5px;
            padding: 10px 20px;
            transition: background 0.3s ease;
        }

        .nav-tabs .nav-item .nav-link.active,
        .nav-tabs .nav-item .nav-link:hover {
            background-color: white;
            color: #007bff;
        }

        .content {
            display: none;
        }

        .active-content {
            display: block;
        }

        .message-box {
            background-color: #ffffff;
            border: 2px solid #007bff;
            border-radius: 10px;
            padding: 20px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        .attachment-area {
            border: 2px dashed #007bff;
            padding: 20px;
            text-align: center;
            margin-top: 10px;
            background-color: #f0f8ff;
        }

        .editor {
            height: 150px;
        }

        /* Estilo para los textos en azul */
        .text-blue {
            color: #007bff !important;
            /* Color azul */
        }

        /* Estilo personalizado para los campos y botones */
        .message-box {
            border: 2px solid #007bff;
            background-color: #f0f8ff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group label {
            color: #007bff;
            /* Etiquetas en azul */
        }

        .form-control {
            border: 1px solid #007bff;
        }

        .attachment-area {
            border: 2px dashed #007bff;
            padding: 20px;
            background-color: #e7f1fe;
            text-align: center;
            margin-top: 10px;
            border-radius: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-link {
            color: #007bff;
        }

        .btn-link:hover {
            color: #0056b3;
        }

        /* Botones y textos dentro de los formularios */
        .message-box h2,
        .message-box .text-primary,
        .message-box .text-blue,
        .message-box .btn-link {
            color: #007bff !important;
            /* Hacer que todos los textos sean azules */
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
                                    <li class="breadcrumb-item active" aria-current="page">Familias</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <main>
                <div class="container mt-5">
                    <ul class="nav nav-tabs" id="menu">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" onclick="showTab('escribir')">Escribir Mensaje</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="showTab('familias')">Ver Familias</a>
                        </li>
                    </ul>
                    <br><br><br>
                    <div id="escribir" class="content active-content">
                        <div class="message-box" style="border: 2px solid #007bff; background-color: #f0f8ff; border-radius: 10px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            <!-- Título -->
                            <h2 class="text-center text-primary">Nuevo Mensaje</h2>

                            <form>
                                <!-- Destinatarios -->
                                <div class="form-group">
                                    <label for="destinatarios" class="text-primary">Destinatarios</label>
                                    <input type="text" class="form-control" id="destinatarios" placeholder="Introduce destinatarios" style="border: 1px solid #007bff;">
                                    <button type="button" class="btn btn-primary mt-2">+</button>
                                </div>

                                <!-- Asunto -->
                                <div class="form-group">
                                    <label for="asunto" class="text-primary">Asunto</label>
                                    <input type="text" class="form-control" id="asunto" placeholder="Introduce el asunto" style="border: 1px solid #007bff;">
                                </div>

                                <!-- Mensaje -->
                                <div class="form-group">
                                    <label for="mensaje" class="text-primary">Mensaje</label>
                                    <textarea class="form-control editor" id="mensaje" placeholder="Escribe tu mensaje" style="border: 1px solid #007bff;"></textarea>
                                </div>

                                <!-- Área de archivos adjuntos -->
                                <div class="attachment-area" style="border: 2px dashed #007bff; padding: 20px; background-color: #e7f1fe; text-align: center; margin-top: 10px; border-radius: 10px;">
                                    <p class="text-primary">Arrastra los archivos hasta aquí o pulse para buscarlos</p>
                                    <input type="file" multiple style="display: none;" id="file-input">
                                    <button type="button" onclick="document.getElementById('file-input').click();" class="btn btn-link text-primary">Buscar archivos</button>
                                </div>

                                <!-- Botones de acción -->
                                <button type="submit" class="btn btn-primary mt-3">Enviar</button>
                                <button type="button" class="btn btn-secondary mt-3 ml-2" onclick="window.history.back();">Volver</button>
                            </form>
                        </div>
                    </div>


                    <div id="familias" class="content">
                        <!-- Título con texto azul -->
                        <h2 class="text-center text-blue mt-3">Ver Familias</h2>

                        <!-- Descripción con texto azul -->
                        <p class="text-center text-blue">Aquí puedes visualizar las familias registradas.</p>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script>
        function showTab(tabId) {
            document.querySelectorAll('.content').forEach(div => div.classList.remove('active-content'));
            document.getElementById(tabId).classList.add('active-content');
            document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
            event.target.classList.add('active');
        }
    </script>
</body>

</html>