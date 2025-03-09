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
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Trabajadores</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <main>
                <?php
                require_once '../../../model/database/connection.php';

                // Insertar trabajador si se envía el formulario
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nombre = trim($_POST['nombre'] ?? '');
                    $apellido1 = trim($_POST['apellido1'] ?? '');
                    $apellido2 = trim($_POST['apellido2'] ?? '');
                    $numSegSocial = trim($_POST['numSegSocial'] ?? '');
                    $userLogin = trim($_POST['userLogin'] ?? '');
                    $passwordLogin = $_POST['passwordLogin'] ?? '';
                    $idCargo = $_POST['idCargo'] ?? '';
                    $fotoPath = null;

                    if (!preg_match('/^[0-9]{8,12}$/', $numSegSocial)) {
                        die("<script>alert('Número de Seguridad Social inválido'); window.history.back();</script>");
                    }

                    if (!empty($_FILES['foto']['name'])) {
                        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                        if (in_array($_FILES['foto']['type'], $allowedTypes) && $_FILES['foto']['size'] <= 2 * 1024 * 1024) {
                            $fotoNombre = time() . "_" . basename($_FILES['foto']['name']);
                            $fotoPath = "uploads/" . $fotoNombre;
                            move_uploaded_file($_FILES['foto']['tmp_name'], $fotoPath);
                        } else {
                            die("<script>alert('Formato de imagen no permitido o archivo demasiado grande'); window.history.back();</script>");
                        }
                    }

                    if (!empty($nombre) && !empty($apellido1) && !empty($numSegSocial) && !empty($userLogin) && !empty($passwordLogin) && !empty($idCargo)) {
                        try {
                            $conexion = conectarDB();
                            $conexion->beginTransaction();

                            $sqlTrabajador = "INSERT INTO trabajadores_camptrack (idCargo, nombre, apellido1, apellido2, numSegSocial, userLogin, passwordLogin, foto) 
                                              VALUES (:idCargo, :nombre, :apellido1, :apellido2, :numSegSocial, :userLogin, :passwordLogin, :foto)";
                            $stmt = $conexion->prepare($sqlTrabajador);
                            $stmt->execute([
                                ':idCargo' => $idCargo,
                                ':nombre' => $nombre,
                                ':apellido1' => $apellido1,
                                ':apellido2' => $apellido2,
                                ':numSegSocial' => $numSegSocial,
                                ':userLogin' => $userLogin,
                                ':passwordLogin' => password_hash($passwordLogin, PASSWORD_BCRYPT),
                                ':foto' => $fotoPath
                            ]);

                            $sqlLogin = "INSERT INTO login_camptrack (user, password, email, role) VALUES (:user, :password, :email, :role)";
                            $stmt = $conexion->prepare($sqlLogin);
                            $stmt->execute([
                                ':user' => $userLogin,
                                ':password' => password_hash($passwordLogin, PASSWORD_BCRYPT),
                                ':email' => '',
                                ':role' => 'monitor'
                            ]);

                            $conexion->commit();
                            echo "<script>alert('Trabajador agregado con éxito'); window.location.href='trabajadoreTest.php';</script>";
                        } catch (PDOException $e) {
                            $conexion->rollBack();
                            echo "❌ Error al insertar el trabajador y usuario: " . $e->getMessage();
                        }
                    } else {
                        echo "⚠️ Todos los campos son obligatorios.";
                    }
                }

                $conexion = conectarDB();
                $trabajadores = $conexion->query("SELECT t.idTrabajador, t.nombre, t.apellido1, t.apellido2, t.numSegSocial, t.userLogin, t.foto, c.cargo FROM trabajadores_camptrack t JOIN cargo_camptrack c ON t.idCargo = c.idCargo")->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <div class="container mt-4">
                    <!-- Formulario y lista de trabajadores -->
                <div class="row mb-4">
                    <div class="col">
                        <h2 class="text-center">Agregar Nuevo Trabajador</h2>
                    </div>
                </div>

                <!-- Formulario de ingreso -->
                <form method="POST" class="mb-5" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="apellido1" class="form-label">Primer Apellido</label>
                            <input type="text" name="apellido1" id="apellido1" class="form-control" placeholder="Primer Apellido" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="apellido2" class="form-label">Segundo Apellido</label>
                            <input type="text" name="apellido2" id="apellido2" class="form-control" placeholder="Segundo Apellido" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="numSegSocial" class="form-label">Número Seguridad Social</label>
                            <input type="text" name="numSegSocial" id="numSegSocial" class="form-control" placeholder="Número Seguridad Social" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="userLogin" class="form-label">Usuario</label>
                            <input type="text" name="userLogin" id="userLogin" class="form-control" placeholder="Usuario" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="passwordLogin" class="form-label">Contraseña</label>
                            <input type="password" name="passwordLogin" id="passwordLogin" class="form-control" placeholder="Contraseña" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="idCargo" class="form-label">Cargo</label>
                            <select name="idCargo" id="idCargo" class="form-select" required>
                                <option value="" disabled selected>Seleccione un Cargo</option>
                                <?php
                                $cargos = $conexion->query("SELECT idCargo, cargo FROM cargo_camptrack")->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($cargos as $cargo) {
                                    echo "<option value='{$cargo['idCargo']}'>{$cargo['cargo']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Agregar Trabajador</button>
                    </div>
                </form>

                <div class="row mb-4">
                    <div class="col">
                        <h2 class="text-center">Lista de Trabajadores</h2>
                    </div>
                </div>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Apellido 1</th>
                            <th>Apellido 2</th>
                            <th>Cargo</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($trabajadores as $trabajador): ?>
                            <tr>
                                <td><img src="<?= $trabajador['foto'] ?: 'uploads/default.png' ?>" alt="Foto" width="50"></td>
                                <td><?= $trabajador['nombre'] ?></td>
                                <td><?= $trabajador['apellido1'] ?></td>
                                <td><?= $trabajador['apellido2'] ?></td>
                                <td><?= $trabajador['cargo'] ?></td>
                                <td>
                                    <button class="btn btn-info ver-mas" data-id="<?= $trabajador['idTrabajador'] ?>">Ver más</button>
                                </td>
                            </tr>
                            <tr id="detalle-<?= $trabajador['idTrabajador'] ?>" style="display: none;">
                                <td colspan="6">
                                    <strong>Usuario:</strong> <?= $trabajador['userLogin'] ?><br>
                                    <strong>Número Seguridad Social:</strong> <?= $trabajador['numSegSocial'] ?><br>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
                
            </main>
        </div>
    </div>

    <script src="../../../assets/plugins/jquery.min.js"></script>
    <script src="../../../assets/plugins/bootstrap.bundle.min.js"></script>
    <script src="../../../assets/js/custom.js"></script>
    <script>
        $(document).on("click", ".ver-mas", function() {
            let id = $(this).data("id");
            $("#detalle-" + id).toggle();
            $(this).text($(this).text() === "Ver más" ? "Ver menos" : "Ver más");
        });
    </script>
</body>

</html>