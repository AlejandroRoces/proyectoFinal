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
            font-family: Arial, sans-serif;
            background-color: #e3f2fd;
            margin: 0;
            padding: 20px;
            color: #0d47a1;
            height: 100vh;
            box-sizing: border-box;

        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        .menu {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .menu button,
        button {
            padding: 10px;
            background-color: #1565c0;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 5px;
        }

        .menu button.active,
        button:hover {
            background-color: #0d47a1;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #bbdefb;
        }

        .print-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
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
                                    <li class="breadcrumb-item active" aria-current="page">Almacen</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <main>
                <br><br>
                <h1>Gestión de Inventarios</h1>
                <br>
                <div class="container">
                    <div class="menu">
                        <button id="toggle-section-btn" class="active">Ver Productos</button>
                    </div>

                    <div id="add-product-section">
                        <form id="inventory-form">
                            <input type="text" id="product-name" placeholder="Nombre del producto" required>
                            <input type="number" id="product-quantity" placeholder="Cantidad" required>
                            <button type="submit">Agregar Producto</button>
                        </form>
                    </div>

                    <div id="list-products-section" style="display: none;">
                        <table id="inventory-table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div class="print-container">
                            <button id="print-pdf-btn">Imprimir PDF</button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.11/jspdf.plugin.autotable.min.js"></script>
    <script src="../../../assets/plugins/jquery.min.js"></script>
    <script src="../../../assets/plugins/bootstrap.bundle.min.js"></script>
    <script src="../../../assets/js/app-style-switcher.js"></script>
    <script src="../../../assets/js/waves.js"></script>
    <script src="../../../assets/js/sidebarmenu.js"></script>
    <script src="../../../assets/js/custom.js"></script>
    <script>
        document.getElementById('inventory-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const productName = document.getElementById('product-name').value;
            const productQuantity = document.getElementById('product-quantity').value;
            addProductToTable(productName, productQuantity);
            this.reset();
        });

        function addProductToTable(name, quantity) {
            const tableBody = document.querySelector('#inventory-table tbody');
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${name}</td>
                <td><input type="number" value="${quantity}" onchange="updateQuantity(this)" /></td>
                <td><button onclick="removeProduct(this)">Eliminar</button></td>
            `;
            tableBody.appendChild(row);
        }

        function removeProduct(button) {
            const row = button.parentElement.parentElement;
            row.remove();
        }

        function updateQuantity(input) {
            console.log(`Cantidad actualizada a: ${input.value}`);
        }

        document.getElementById('toggle-section-btn').addEventListener('click', function() {
            const isAdding = this.classList.contains('active');
            if (isAdding) {
                this.textContent = 'Añadir Productos';
                this.classList.remove('active');
                document.getElementById('add-product-section').style.display = 'none';
                document.getElementById('list-products-section').style.display = 'block';
            } else {
                this.textContent = 'Ver Productos';
                this.classList.add('active');
                document.getElementById('add-product-section').style.display = 'block';
                document.getElementById('list-products-section').style.display = 'none';
            }
        });

        document.getElementById('print-pdf-btn').addEventListener('click', function() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();
            const today = new Date().toLocaleDateString('es-ES');
            doc.text(`Inventario - ${today}`, 20, 20);
            const table = document.querySelector('#inventory-table tbody');
            const products = [];

            if (table.children.length === 0) {
                alert("No hay productos para imprimir.");
                return;
            }

            table.querySelectorAll('tr').forEach(row => {
                const name = row.cells[0].innerText;
                const quantity = row.cells[1].querySelector('input').value;
                products.push([name, quantity]);
            });

            doc.autoTable({
                head: [
                    ['Producto', 'Cantidad']
                ],
                body: products,
                startY: 30
            });
            doc.save(`Inventario_${today}.pdf`);
        });
    </script>
</body>

</html>