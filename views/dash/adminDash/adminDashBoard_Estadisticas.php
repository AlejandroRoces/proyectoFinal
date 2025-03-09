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
            font-family: "Poppins", sans-serif;
            color: white;
        }

        .counter-box {
            background-color: #21242b;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            border-bottom: 8px solid #18f98f;
            transition: transform 0.3s ease-in-out;
        }

        .counter-box:hover {
            transform: translateY(-5px);
        }

        .counter-box i {
            color: #18f98f;
            font-size: 2.5rem;
        }

        .num {
            font-size: 2.2rem;
            font-weight: bold;
        }

        .text {
            font-size: 1rem;
            color: #e0e0e0;
        }


            #container {
                position: relative;
                width: 800px;
                height: 400px;
                margin: 50px auto;
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
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
        <!-- Caja 1: Trabajadores en plantilla -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="counter-box">
                <i class="fas fa-user"></i> <!-- Icono para trabajadores -->
                <div class="num" data-val="40">000</div>
                <div class="text">Trabajadores</div>
            </div>
        </div>
        
        <!-- Caja 2: Clientes -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="counter-box">
                <i class="fas fa-users"></i> <!-- Mantuvimos el icono de clientes -->
                <div class="num" data-val="2200">000</div>
                <div class="text">Clientes</div>
            </div>
        </div>

        <!-- Caja 3: Actividades registradas -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="counter-box">
                <i class="fas fa-futbol"></i> <!-- Cambié el icono a un balón de fútbol -->
                <div class="num" data-val="30">000</div>
                <div class="text">Actividades </div>
            </div>
        </div>

        <!-- Caja 4: Instalaciones registradas -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="counter-box">
                <i class="fas fa-building"></i> <!-- Cambié el icono a uno más representativo de instalaciones -->
                <div class="num" data-val="6">000</div>
                <div class="text">Instalaciones</div>
            </div>
        </div>

        <!-- Caja con gráfico -->
        <div class="col-12">
            <div class="counter-box chart-box">
                <div id="container"></div>
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
    <script>
        let counters = document.querySelectorAll(".num");

        counters.forEach(counter => {
            let target = +counter.getAttribute("data-val");
            let count = 0;
            let increment = target / 100;

            let updateCount = () => {
                if (count < target) {
                    count += increment;
                    counter.innerText = Math.floor(count);
                    setTimeout(updateCount, 20);
                } else {
                    counter.innerText = target;
                }
            };

            updateCount();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/lightweight-charts@3.4.0/dist/lightweight-charts.standalone.production.js"></script>
    <script>
        // Crear el gráfico
        const chart = LightweightCharts.createChart(document.getElementById('container'), {
            layout: {
                textColor: '#18f98f',
                background: {
                    type: 'solid',
                    color: 'white'
                },
            },
            rightPriceScale: {
                scaleMargins: {
                    top: 0.3,
                    bottom: 0.25,
                },
            },
            crosshair: {
                mode: LightweightCharts.CrosshairMode.Normal,
            },
            grid: {
                vertLines: {
                    visible: false
                },
                horzLines: {
                    visible: false
                },
            },
        });

        // Añadir serie de datos
        const areaSeries = chart.addAreaSeries({
            topColor: '#18f98f',
            bottomColor: 'rgba(41, 98, 255, 0.28)',
            lineColor: '#18f98f',
            lineWidth: 2,
        });

        // Datos proporcionados
        const data = [
            // Enero
            {
                time: '2025-01-01',
                value: 300
            },
            {
                time: '2025-01-02',
                value: 320
            },
            {
                time: '2025-01-03',
                value: 280
            },
            {
                time: '2025-01-04',
                value: 350
            },
            {
                time: '2025-01-05',
                value: 370
            },
            {
                time: '2025-01-06',
                value: 400
            },
            {
                time: '2025-01-07',
                value: 390
            },
            {
                time: '2025-01-08',
                value: 410
            },
            {
                time: '2025-01-09',
                value: 450
            },
            {
                time: '2025-01-10',
                value: 430
            },
            {
                time: '2025-01-11',
                value: 500
            },
            {
                time: '2025-01-12',
                value: 470
            },
            {
                time: '2025-01-13',
                value: 510
            },
            {
                time: '2025-01-14',
                value: 530
            },
            {
                time: '2025-01-15',
                value: 580
            },
            {
                time: '2025-01-16',
                value: 600
            },
            {
                time: '2025-01-17',
                value: 550
            },
            {
                time: '2025-01-18',
                value: 620
            },
            {
                time: '2025-01-19',
                value: 640
            },
            {
                time: '2025-01-20',
                value: 680
            },
            {
                time: '2025-01-21',
                value: 700
            },
            {
                time: '2025-01-22',
                value: 720
            },
            {
                time: '2025-01-23',
                value: 750
            },
            {
                time: '2025-01-24',
                value: 770
            },
            {
                time: '2025-01-25',
                value: 730
            },
            {
                time: '2025-01-26',
                value: 790
            },
            {
                time: '2025-01-27',
                value: 810
            },
            {
                time: '2025-01-28',
                value: 780
            },
            {
                time: '2025-01-29',
                value: 860
            },
            {
                time: '2025-01-30',
                value: 900
            },
            {
                time: '2025-01-31',
                value: 880
            },

            // Febrero
            {
                time: '2025-02-01',
                value: 920
            },
            {
                time: '2025-02-02',
                value: 890
            },
            {
                time: '2025-02-03',
                value: 970
            },
            {
                time: '2025-02-04',
                value: 950
            },
            {
                time: '2025-02-05',
                value: 1020
            },
            {
                time: '2025-02-06',
                value: 990
            },
            {
                time: '2025-02-07',
                value: 1080
            },
            {
                time: '2025-02-08',
                value: 1050
            },
            {
                time: '2025-02-09',
                value: 1100
            },
            {
                time: '2025-02-10',
                value: 1070
            },
            {
                time: '2025-02-11',
                value: 1150
            },
            {
                time: '2025-02-12',
                value: 1130
            },
            {
                time: '2025-02-13',
                value: 1180
            },
            {
                time: '2025-02-14',
                value: 1220
            },
            {
                time: '2025-02-15',
                value: 1190
            },
            {
                time: '2025-02-16',
                value: 1250
            },
            {
                time: '2025-02-17',
                value: 1300
            },
            {
                time: '2025-02-18',
                value: 1280
            },
            {
                time: '2025-02-19',
                value: 1350
            },
            {
                time: '2025-02-20',
                value: 1320
            },
            {
                time: '2025-02-21',
                value: 1400
            },
            {
                time: '2025-02-22',
                value: 1450
            },
            {
                time: '2025-02-23',
                value: 1420
            },
            {
                time: '2025-02-24',
                value: 1500
            },
            {
                time: '2025-02-25',
                value: 1470
            },
            {
                time: '2025-02-26',
                value: 1550
            },
            {
                time: '2025-02-27',
                value: 1600
            },
            {
                time: '2025-02-28',
                value: 1580
            },

            // Marzo a Junio con picos más pronunciados
            ...Array.from({
                length: 122
            }, (_, i) => {
                const date = new Date(2025, 2, i + 1);
                return {
                    time: date.toISOString().split('T')[0],
                    value: 2000 + Math.floor(Math.sin(i / 3) * 1000) + Math.floor(Math.random() * 500)
                };
            })
        ];
        areaSeries.setData(data);
    </script>

</body>

</html>