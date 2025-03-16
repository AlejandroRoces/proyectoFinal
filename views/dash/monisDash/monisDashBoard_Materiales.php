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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        main {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f4f8;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 36px;
            text-align: center;
        }

        .search-bar {
            margin-bottom: 30px;
            text-align: center;
        }

        .search-bar input {
            padding: 10px;
            font-size: 16px;
            width: 80%;
            max-width: 600px;
            border-radius: 8px;
            border: 2px solid #2980b9;
            outline: none;
        }

        .search-bar input:focus {
            border-color: #3498db;
        }

        .file-box {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            gap: 20px;
            margin-bottom: 40px;
        }

        .file {
            width: 150px;
            padding: 15px;
            background-color: #fff;
            border: 1px solid #2980b9;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .file .pdf-icon {
            font-size: 70px;
            color: #2980b9;
        }

        .file-name {
            margin-top: 10px;
            font-size: 14px;
            color: #333;
        }

        .highlighted-files {
            background-color: #ecf6fc;
            border: 2px solid #2980b9;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .highlighted-files h3 {
            color: #2980b9;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .upload-area {
            width: 80%;
            max-width: 500px;
            margin: 0 auto;
            padding: 40px;
            background-color: #fff;
            border: 2px dashed #2980b9;
            border-radius: 10px;
            text-align: center;
            margin-top: 40px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .upload-area i {
            font-size: 100px;
            color: #2980b9;
        }

        .upload-area h3 {
            margin-top: 20px;
            color: #333;
            font-size: 24px;
        }

        .upload-area p {
            color: #777;
            font-size: 16px;
        }

        .file-box,
        .upload-area {
            transition: all 0.3s ease;
        }

        .file-box:hover,
        .upload-area:hover {
            transform: scale(1.02);
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
                                    <li class="breadcrumb-item active" aria-current="page">Materiales</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <main>
                <div class="container">
                    <h1>Simulador de Drive</h1>

                    <!-- Barra de búsqueda -->
                    <div class="search-bar">
                        <input type="text" id="searchInput" placeholder="Buscar archivos..." oninput="filterFiles()">
                    </div>

                    <!-- Archivos destacados -->
                    <div class="highlighted-files">
                        <h3>Archivos Destacados</h3>
                        <div class="file-box">
                            <div class="file">
                                <a href="#" class="pdf-icon">
                                    <i class="bi bi-file-earmark-pdf"></i>
                                </a>
                                <div class="file-name">Manual de Seguridad.pdf</div>
                            </div>
                            <div class="file">
                                <a href="#" class="pdf-icon">
                                    <i class="bi bi-file-earmark-pdf"></i>
                                </a>
                                <div class="file-name">Reglamento del Campamento.pdf</div>
                            </div>
                            <div class="file">
                                <a href="#" class="pdf-icon">
                                    <i class="bi bi-file-earmark-pdf"></i>
                                </a>
                                <div class="file-name">Plan de Actividades.pdf</div>
                            </div>
                        </div>
                    </div>

                    <!-- Archivos PDF -->
                    <div class="file-box" id="fileBox">
                        <div class="file">
                            <a href="#" class="pdf-icon">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </a>
                            <div class="file-name">Guía de Rutas de Senderismo.pdf</div>
                        </div>
                        <div class="file">
                            <a href="#" class="pdf-icon">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </a>
                            <div class="file-name">Formulario de Inscripción.pdf</div>
                        </div>
                        <div class="file">
                            <a href="#" class="pdf-icon">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </a>
                            <div class="file-name">Lista de Equipamiento.pdf</div>
                        </div>
                        <div class="file">
                            <a href="#" class="pdf-icon">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </a>
                            <div class="file-name">Normas de Comportamiento.pdf</div>
                        </div>
                        <div class="file">
                            <a href="#" class="pdf-icon">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </a>
                            <div class="file-name">Carta a los Padres.pdf</div>
                        </div>
                        <div class="file">
                            <a href="#" class="pdf-icon">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </a>
                            <div class="file-name">Menú de Comidas.pdf</div>
                        </div>
                        <div class="file">
                            <a href="#" class="pdf-icon">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </a>
                            <div class="file-name">Calendario de Actividades.pdf</div>
                        </div>
                        <div class="file">
                            <a href="#" class="pdf-icon">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </a>
                            <div class="file-name">Mapa del Campamento.pdf</div>
                        </div>
                        <div class="file">
                            <a href="#" class="pdf-icon">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </a>
                            <div class="file-name">Guía de Primeros Auxilios.pdf</div>
                        </div>
                        <div class="file">
                            <a href="#" class="pdf-icon">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </a>
                            <div class="file-name">Cronograma de Excursiones.pdf</div>
                        </div>
                        <div class="file">
                            <a href="#" class="pdf-icon">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </a>
                            <div class="file-name">Informe de Actividades Anteriores.pdf</div>
                        </div>
                        <div class="file">
                            <a href="#" class="pdf-icon">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </a>
                            <div class="file-name">Contrato de Responsabilidad.pdf</div>
                        </div>
                    </div>

                    <!-- Zona de carga de archivos -->
                    <div class="upload-area" id="uploadArea">
                        <i class="bi bi-cloud-upload"></i>
                        <h3>Arrastra tus archivos aquí</h3>
                        <p>O haz clic para seleccionar archivos.</p>
                        <input type="file" id="fileInput" style="display: none;" multiple onchange="handleFileUpload(event)">
                    </div>

                    <!-- Archivos cargados -->
                    <div class="file-box" id="fileBox"></div>
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
        // Función para abrir el selector de archivos al hacer clic en el área de carga
        document.getElementById('uploadArea').addEventListener('click', function() {
            document.getElementById('fileInput').click();
        });

        // Maneja la carga de archivos
        function handleFileUpload(event) {
            const files = event.target.files;
            const fileBox = document.getElementById('fileBox');

            // Itera sobre los archivos seleccionados y los agrega al área de archivos cargados
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const fileBoxItem = document.createElement('div');
                fileBoxItem.classList.add('file');

                // Crea el ícono de PDF
                const pdfIcon = document.createElement('a');
                pdfIcon.classList.add('pdf-icon');
                pdfIcon.innerHTML = '<i class="bi bi-file-earmark-pdf"></i>';
                fileBoxItem.appendChild(pdfIcon);

                // Crea el nombre del archivo
                const fileName = document.createElement('div');
                fileName.classList.add('file-name');
                fileName.textContent = file.name;
                fileBoxItem.appendChild(fileName);

                // Agrega el archivo al contenedor
                fileBox.appendChild(fileBoxItem);
            }
        }

        // Filtrar archivos por nombre en la barra de búsqueda
        function filterFiles() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const files = document.querySelectorAll('.file');

            files.forEach(file => {
                const fileName = file.querySelector('.file-name').textContent.toLowerCase();
                if (fileName.includes(searchInput)) {
                    file.style.display = 'block';
                } else {
                    file.style.display = 'none';
                }
            });
        }
    </script>
</body>

</html>