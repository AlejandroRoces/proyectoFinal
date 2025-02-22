
<?php
require_once '../../../model/database/connection.php';

try {
    $conexion = conectarDB();

    // Consulta SQL para unir todas las tablas relacionadas por id_participante
    $sql = "SELECT 
                p.id, p.nombre, p.apellidos, p.dni, p.fecha_nacimiento, p.edad, p.genero, 
                p.alergias, p.enfermedades, p.medicinas,
                pa.nombre_padre, pa.apellidos_padre, pa.telefono_padre, pa.dni_padre, 
                pa.nombre_madre, pa.apellidos_madre, pa.telefono_madre, pa.dni_madre, pa.correo_electronico,
                d.calle, d.numero, d.portal, d.piso, d.letra, d.informacion_adicional,
                doc.foto_dni, doc.tarjeta_sanitaria, doc.archivos_adicionales
            FROM Participantes_inscripciones_camptrack p
            LEFT JOIN Padres_inscripciones_camptrack pa ON p.id = pa.id_participante
            LEFT JOIN Direcciones_inscripciones_camptrack d ON p.id = d.id_participante
            LEFT JOIN Documentos_inscripciones_camptrack doc ON p.id = doc.id_participante";

    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al obtener los datos: " . $e->getMessage());
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

    <style>
    .table td, .table th {
        padding: 5px;  /* Reduce el espacio dentro de las celdas */
        font-size: 14px; /* Reduce el tamaño de la fuente */
        white-space: nowrap; /* Evita los saltos de línea */
        overflow: hidden; /* Oculta el contenido si es muy largo */
        text-overflow: ellipsis; /* Agrega puntos suspensivos (...) si el texto es muy largo */
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="adminDashBoard_instalacionesphp" aria-expanded="false">
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
                                    <li class="breadcrumb-item active" aria-current="page">Inscripciones</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <main >
            <div class="contairer">
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6"></div>
                </div>
            </div>
            <div class="container mt-5">
                    <h2 class="mb-4 text-center">Listado de Participantes Inscritos</h2>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>DNI</th>
                                    <th>Fecha Nac.</th>
                                    <th>Edad</th>
                                    <th>Género</th>
                                    <th>Alergias</th>
                                    <th>Enfermedades</th>
                                    <th>Medicinas</th>
                                    <th>Padre</th>
                                    <th>Teléfono Padre</th>
                                    <th>Madre</th>
                                    <th>Teléfono Madre</th>
                                    <th>Correo Electrónico</th>
                                    <th>Dirección</th>
                                    <th>Foto DNI</th>
                                    <th>Tarjeta Sanitaria</th>
                                    <th>Archivos Adicionales</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($resultados) > 0): ?>
                                    <?php foreach ($resultados as $fila): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($fila['id']); ?></td>
                                            <td><?php echo htmlspecialchars($fila['nombre']); ?></td>
                                            <td><?php echo htmlspecialchars($fila['apellidos']); ?></td>
                                            <td><?php echo htmlspecialchars($fila['dni']); ?></td>
                                            <td><?php echo htmlspecialchars($fila['fecha_nacimiento']); ?></td>
                                            <td><?php echo htmlspecialchars($fila['edad']); ?></td>
                                            <td><?php echo htmlspecialchars($fila['genero']); ?></td>
                                            <td><?php echo htmlspecialchars($fila['alergias']); ?></td>
                                            <td><?php echo htmlspecialchars($fila['enfermedades']); ?></td>
                                            <td><?php echo htmlspecialchars($fila['medicinas']); ?></td>
                                            <td><?php echo htmlspecialchars($fila['nombre_padre']) . ' ' . htmlspecialchars($fila['apellidos_padre']); ?></td>
                                            <td><?php echo htmlspecialchars($fila['telefono_padre']); ?></td>
                                            <td><?php echo htmlspecialchars($fila['nombre_madre']) . ' ' . htmlspecialchars($fila['apellidos_madre']); ?></td>
                                            <td><?php echo htmlspecialchars($fila['telefono_madre']); ?></td>
                                            <td><?php echo htmlspecialchars($fila['correo_electronico']); ?></td>
                                            <td>
                                                <?php echo htmlspecialchars($fila['calle']) . ', ' . htmlspecialchars($fila['numero']) . ', ' .
                                                    htmlspecialchars($fila['portal']) . ', Piso ' . htmlspecialchars($fila['piso']) . ', Letra ' . htmlspecialchars($fila['letra']); ?>
                                                <br><small><?php echo htmlspecialchars($fila['informacion_adicional']); ?></small>
                                            </td>
                                            <td>
                                                <?php if (!empty($fila['foto_dni'])): ?>
                                                    <img src="<?php echo htmlspecialchars($fila['foto_dni']); ?>" alt="DNI" class="img-preview">
                                                <?php else: ?>
                                                    No disponible
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if (!empty($fila['tarjeta_sanitaria'])): ?>
                                                    <img src="<?php echo htmlspecialchars($fila['tarjeta_sanitaria']); ?>" alt="Tarjeta Sanitaria" class="img-preview">
                                                <?php else: ?>
                                                    No disponible
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if (!empty($fila['archivos_adicionales'])): ?>
                                                    <a href="<?php echo htmlspecialchars($fila['archivos_adicionales']); ?>" target="_blank">Ver documento</a>
                                                <?php else: ?>
                                                    No disponible
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="19" class="text-center">No hay datos disponibles</td>
                                    </tr>
                                <?php endif; ?>
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
    
</body>

</html>