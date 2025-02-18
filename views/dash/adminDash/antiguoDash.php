<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplicación Campus</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">

  <link rel="stylesheet" href="../../../assets/css/dash/adminDash.css">
  <?php require_once('../../../assets/css/styles.php'); ?> <!-- styles-->
</head>
<body>

  <!-- Cabecera -->
  <header>
    <div class="logo-container">
      <img src="../../../assets/img/logos/logoSF.png" alt="Logo">
      <span>Camptrack</span>
    </div>
    <div class="user-menu" aria-haspopup="true" aria-expanded="false">
      <span>BIENVENIDO ALEJANDRO</span>
      <img src="../../../assets/img/log/FOTO CARNET ALEJANDRO.jpg" alt="Foto de perfil">
      <i class="fas fa-chevron-down"></i>
      <div class="dropdown-menu" id="dropdownMenu" role="menu">
        <a href="#">Perfil</a>
        <a href="#">Configuración</a>
        <a href="../logout.php" onclick="return confirm('¿Estás seguro de que quieres cerrar sesión?');">
          <i class="fas fa-sign-out-alt"></i> Cerrar sesión
        </a>
      </div>
    </div>
  </header>

  <!-- Menú de navegación -->
  <nav>
    <ul>
      <li><a href="adminDashBoard.php"><i class="fas fa-home"></i> <span>Inicio</span></a></li>
      <li><a href="adminDash_Instalaciones.php"><i class="fas fa-building"></i> Instalaciones</a></li>
      <li><a href="adminDash_Trabajadores.php"><i class="fas fa-users"></i> Trabajadores</a></li>
      <li><a href="adminDashBoard_Inscripciones.php"><i class="fas fa-user-friends"></i> Inscripciones</a></li>
      <li><a href="adminDash_Actividades.php"><i class="fas fa-cogs"></i> Actividades</a></li>
    </ul>
  </nav>

  <!-- Contenido principal -->
  <main id="contenido">
    
  </main>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const userMenu = document.querySelector('.user-menu');
      const dropdownMenu = document.getElementById('dropdownMenu');

      userMenu.addEventListener('click', () => {
        const isMenuVisible = dropdownMenu.style.display === 'block';
        dropdownMenu.style.display = isMenuVisible ? 'none' : 'block';
        userMenu.setAttribute('aria-expanded', !isMenuVisible);
      });
    });
  </script>

</body>
</html>