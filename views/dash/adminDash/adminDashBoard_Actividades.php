<?php
include '../../../model/database/connection.php'; // Asegúrate de que la ruta es correcta

$conn = conectarDB(); // Llamamos a la función para obtener la conexión

$sql = "SELECT nombre, aforo, num_habitaciones FROM instalaciones_camptrack";
$stmt = $conn->query($sql); // Ejecutamos la consulta

$instalaciones = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtenemos los datos

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
    <style>
        body {
            background-color: #f4f4f4;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
            color: #555;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            border: 1px solid #ccc;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            padding: 10px;
            font-size: 16px;
            transition: background 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }






        .switch-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px;
        }

        .switch-wrapper {
            position: relative;
            display: inline-block;
            width: 200px;
            height: 47px;
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
            width: 90px;
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
            transform: translateX(100px);
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


        .worker-card {
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 6px;
            /* Reducido el padding */
            background-color: #f9f9f9;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            margin-bottom: 10px;
            /* Reducido el margen inferior */
        }

        .worker-card:hover {
            transform: translateY(-5px);
        }

        .worker-img {
            width: 60px;
            /* Reducido el tamaño de la imagen */
            height: 60px;
            /* Reducido el tamaño de la imagen */
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #007bff;
            margin-bottom: 6px;
            /* Reducido el espacio entre la imagen y el nombre */
        }

        .worker-name {
            font-size: 0.85rem;
            /* Reducido el tamaño de la fuente */
            font-weight: bold;
            margin-top: 6px;
        }

        .worker-role {
            font-size: 0.75rem;
            /* Reducido el tamaño de la fuente */
            color: #555;
        }

        .favorite-icon {
            cursor: pointer;
            color: #ccc;
            /* Estilo inicial de la estrella sin marcar */
            font-size: 1.2rem;
            transition: color 0.3s ease;
            margin-top: 8px;
            /* Reducido el margen superior */
        }

        .favorite-icon.favorito {
            color: #ffcc00;
            /* Color dorado cuando la estrella está marcada */
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="adminDashBoard.php" aria-expanded="false">
                                <i class="fas fa-home me-2"></i> <!-- Icono con margen a la derecha -->
                                <span class="hide-menu">Inicio</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="adminDashBoard_instalaciones.php" aria-expanded="false">
                                <i class="fas fa-building me-2"></i> <!-- Icono con margen a la derecha -->
                                <span class="hide-menu">Instalaciones</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="adminDashBoard_Trabajadores.php" aria-expanded="false">
                                <i class="fas fa-users me-2"></i> <!-- Icono con margen a la derecha -->
                                <span class="hide-menu">Trabajadores</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="adminDashBoard_Inscripciones.php" aria-expanded="false">
                                <i class="fas fa-list me-2"></i> <!-- Icono de lista -->
                                <span class="hide-menu">Inscripciones</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="adminDashBoard_Estadisticas.php" aria-expanded="false">
                                <i class="fas fa-chart-line me-2"></i> <!-- Icono con margen a la derecha -->
                                <span class="hide-menu">Estadísticas</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="adminDashBoard_Actividades.php" aria-expanded="false">
                                <i class="fas fa-calendar me-2"></i> <!-- Nuevo ícono -->
                                <span class="hide-menu">Actividades</span>
                            </a>
                        </li>



                        <!-- Aquí va el nuevo item para cerrar sesión -->
                        <li class="sidebar-item" style="position: absolute; bottom: 0; width: 100%; margin-bottom: 10px;">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../logout.php" aria-expanded="false" onclick="return confirm('¿Estás seguro de que quieres cerrar sesión?');">
                                <i class="fas fa-sign-out-alt me-2"></i> <!-- Icono de cerrar sesión -->
                                <span class="hide-menu">Cerrar sesión</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>



        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Dashboard</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Actividades</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <main>

                <div class="switch-container">
                    <div class="switch-wrapper">
                        <input type="checkbox" id="option-selector" onchange="changeSection()">
                        <label for="option-selector" class="switch-label">
                            <span class="switch-text">Crear</span>
                            <span class="switch-text">Asignar</span>
                        </label>
                    </div>
                </div>

                <div id="section-create" class="content-section visible-section">
                    <div class="container mt-5">
                        <h2 class="text-center">Crear Nueva Actividad</h2>

                        <form action="../../../controller/procesar_actividad.php" method="POST" enctype="multipart/form-data">
                            <!-- Nombre de la Actividad -->
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre de la Actividad</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>

                            <!-- Descripción -->
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                            </div>

                            <!-- Selección de Instalación -->
                            <div class="mb-3">
                                <label for="instalacion" class="form-label">Selecciona una instalación:</label>
                                <select id="instalacion" name="instalacion" class="form-select">
                                    <?php foreach ($instalaciones as $instalacion) : ?>
                                        <option value="<?= htmlspecialchars($instalacion['nombre']) ?>">
                                            <?= htmlspecialchars($instalacion['nombre']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Aforo y Habitaciones -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="aforo" class="form-label">Aforo:</label>
                                    <input type="number" id="aforo" name="aforo" class="form-control" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="habitaciones" class="form-label">Número de Habitaciones:</label>
                                    <input type="number" id="habitaciones" name="habitaciones" class="form-control" readonly>
                                </div>
                            </div>

                            <!-- Cálculo de Personal -->
                            <!-- Cálculo de Personal -->
                            <div id="calculoPersonal" class="mb-3" style="display: none; background-color: #f8f9fa; padding: 15px; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
                                <h5>Cálculo de Personal</h5>

                                <!-- Aviso de Coordinador si el aforo es mayor a 40 -->
                                <div id="aviso-coordinador" style="display: none; color: #d9534f; font-weight: bold;">
                                    <p><i class="fas fa-exclamation-circle"></i> Es necesario un coordinador ya que el aforo supera los 40 personas.</p>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="ratio_monitores" class="form-label">Selecciona el Ratio de Monitores</label>
                                        <select id="ratio_monitores" name="ratio_monitores" class="form-select" required>
                                            <option value="10">1 monitor por 10 personas</option>
                                            <option value="11">1 monitor por 11 personas</option>
                                            <option value="13">1 monitor por 13 personas</option>
                                            <option value="25">1 monitor por 25 personas</option>
                                            <option value="5">1 monitor por 5 personas (Necesidades Especiales)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="num_monitores" class="form-label">Número de Monitores Necesarios</label>
                                        <input type="number" id="num_monitores" name="num_monitores" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>

                            <!-- Fechas de Inscripción -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="fecha_inicio_inscripcion" class="form-label">Inicio de Inscripción</label>
                                    <input type="date" class="form-control" id="fecha_inicio_inscripcion" name="fecha_inicio_inscripcion" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="fecha_fin_inscripcion" class="form-label">Fin de Inscripción</label>
                                    <input type="date" class="form-control" id="fecha_fin_inscripcion" name="fecha_fin_inscripcion" required>
                                </div>
                            </div>

                            <!-- Edades Mínima y Máxima -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="edad_minima" class="form-label">Edad Mínima</label>
                                    <input type="number" class="form-control" id="edad_minima" name="edad_minima">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edad_maxima" class="form-label">Edad Máxima</label>
                                    <input type="number" class="form-control" id="edad_maxima" name="edad_maxima">
                                </div>
                            </div>

                            <!-- Tarifa -->
                            <div class="mb-3">
                                <label for="tarifa" class="form-label">Tarifa (€)</label>
                                <input type="number" step="0.01" class="form-control" id="tarifa" name="tarifa" required>
                            </div>

                            <!-- Fechas de la Actividad -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="fecha_inicio" class="form-label">Fecha de Inicio de la Actividad</label>
                                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="fecha_fin" class="form-label">Fecha de Fin de la Actividad</label>
                                    <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
                                </div>
                            </div>

                            <!-- Imagen -->
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Imagen</label>
                                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
                            </div>

                            <!-- Botón de Envío -->
                            <button type="submit" class="btn btn-primary w-100">Guardar Actividad</button>
                        </form>
                    </div>
                </div>

                <div id="section-edit" class="content-section">
                    <h3>Sección de MAsignacion de monitores</h3>
                    <?php
                    include_once '../../../model/database/connection.php'; // Incluir el archivo de conexión PDO

                    // Establecer la conexión a la base de datos usando la función conectarDB() de connection.php
                    $conexion = conectarDB();

                    // Obtener el valor de búsqueda desde el parámetro GET
                    $buscar = isset($_GET['buscar']) ? $_GET['buscar'] : '';

                    // Definir la consulta SQL con un filtro de búsqueda
                    $query = "SELECT t.idTrabajador, t.nombre, t.apellido1, t.foto, c.cargo 
          FROM trabajadores_camptrack t
          JOIN cargo_camptrack c ON t.idCargo = c.idCargo";

                    // Si hay un término de búsqueda, agregar el filtro `LIKE`
                    if ($buscar) {
                        $query .= " WHERE t.nombre LIKE :buscar OR t.apellido1 LIKE :buscar OR c.cargo LIKE :buscar";
                    }

                    try {
                        // Ejecutar la consulta usando PDO
                        $stmt = $conexion->prepare($query);

                        // Si hay un término de búsqueda, se vincula el parámetro `:buscar`
                        if ($buscar) {
                            $stmt->bindValue(':buscar', '%' . $buscar . '%');
                        }

                        // Ejecutar la consulta
                        $stmt->execute();

                        // Verificar si se obtuvieron resultados
                        if ($stmt->rowCount() > 0) {
                    ?>
                            <div class="container mt-4">
                                <!-- Barra de búsqueda -->
                                <form method="GET" action="">
                                    <div class="input-group mb-4">
                                        <input type="text" class="form-control" placeholder="Buscar trabajador" name="buscar" value="<?php echo isset($_GET['buscar']) ? $_GET['buscar'] : ''; ?>">
                                        <button class="btn btn-primary" type="submit">Buscar</button>
                                    </div>
                                </form>

                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6 justify-content-start"> <!-- Aumentar el número de columnas en pantallas grandes -->
                                    <?php
                                    // Recorrer los resultados
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <div class="col mb-3"> <!-- Reducido el margen inferior -->
                                            <div class="worker-card">
                                                <!-- Si la foto está vacía, usar imagen predeterminada -->
                                                <img src="<?php echo $row['foto'] ?: 'ruta/a/imagen_predeterminada.jpg'; ?>" class="worker-img" alt="Foto de <?php echo $row['nombre']; ?>">
                                                <div class="worker-name"><?php echo $row['nombre'] . ' ' . $row['apellido1']; ?></div>
                                                <div class="worker-role"><?php echo $row['cargo']; ?></div>
                                                <!-- Estrella de favorito -->
                                                <i class="fas fa-star favorite-icon" data-worker-id="<?php echo $row['idTrabajador']; ?>"></i> <!-- Añadí un atributo data-worker-id para identificar el trabajador -->
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                    <?php
                        } else {
                            echo "<p>No se encontraron trabajadores.</p>";
                        }
                    } catch (PDOException $e) {
                        // Manejo de errores si la consulta falla
                        echo "Error en la consulta: " . $e->getMessage();
                    }
                    ?>
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
        // Obtener los datos en JavaScript
        let instalaciones = <?= json_encode($instalaciones) ?>;
        document.getElementById('instalacion').addEventListener('change', function() {
            let seleccion = this.value;
            let datos = instalaciones.find(inst => inst.nombre === seleccion);
            document.getElementById('aforo').value = datos ? datos.aforo : '';
            document.getElementById('habitaciones').value = datos ? datos.num_habitaciones : '';
        });

        ////////////
        document.getElementById('instalacion').addEventListener('change', function() {
            let seleccion = this.value;
            let datos = instalaciones.find(inst => inst.nombre === seleccion);
            document.getElementById('aforo').value = datos ? datos.aforo : '';
            document.getElementById('habitaciones').value = datos ? datos.num_habitaciones : '';

            // Mostrar la caja de cálculo de personal solo cuando el aforo es mayor que 0
            if (datos && datos.aforo > 0) {
                document.getElementById('calculoPersonal').style.display = 'block';

                // Mostrar aviso de coordinador si el aforo es mayor a 40
                if (datos.aforo > 40) {
                    document.getElementById('aviso-coordinador').style.display = 'block';
                } else {
                    document.getElementById('aviso-coordinador').style.display = 'none';
                }
            } else {
                document.getElementById('calculoPersonal').style.display = 'none';
            }
        });

        // Calcular el número de monitores cuando el ratio cambie
        document.getElementById('ratio_monitores').addEventListener('change', function() {
            let ratio = parseInt(this.value);
            let aforo = parseInt(document.getElementById('aforo').value);

            if (!aforo) return; // Asegura que el aforo esté disponible

            let numMonitores = Math.ceil(aforo / ratio); // Redondea hacia arriba

            document.getElementById('num_monitores').value = numMonitores;
        });
    </script>
    <script>
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
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const estrellas = document.querySelectorAll('.favorite-icon'); // Seleccionar todas las estrellas

            estrellas.forEach(function(estrella) {
                estrella.addEventListener('click', function() {
                    // Alternar la clase 'favorito' al hacer clic
                    this.classList.toggle('favorito');

                    // Aquí puedes manejar el almacenamiento del estado en una base de datos o localStorage
                    const workerId = this.getAttribute('data-worker-id'); // Obtener el id del trabajador
                    if (this.classList.contains('favorito')) {
                        console.log('Añadir a favoritos trabajador ID:', workerId);
                        // Aquí se puede enviar una solicitud al servidor para guardar en favoritos
                    } else {
                        console.log('Eliminar de favoritos trabajador ID:', workerId);
                        // Aquí se puede enviar una solicitud al servidor para eliminar de favoritos
                    }
                });
            });
        });
    </script>

</body>

</html>