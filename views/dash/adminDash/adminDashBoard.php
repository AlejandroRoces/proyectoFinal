Compartir


Tú dijiste:
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplicación Campus</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    /* Cabecera */
    header {
      background-color: #1a73e8;
      color: white;
      padding: 15px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: relative;
    }

    .logo-container {
      display: flex;
      align-items: center;
    }

    .logo-container img {
      height: 50px;
      margin-right: 10px;
    }

    .logo-container span {
      font-size: 32px;
      font-weight: bold;
    }

    .user-menu {
      position: relative;
      display: flex;
      align-items: center;
      cursor: pointer;
    }

    .user-menu img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      object-fit: cover;
      margin-left: 10px;
    }

    .user-menu i {
      margin-left: 10px;
      font-size: 18px;
    }

    .dropdown-menu {
      display: none;
      position: absolute;
      right: 0;
      top: 60px;
      background-color: white;
      color: black;
      border-radius: 5px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
      width: 200px;
    }

    .dropdown-menu a, .dropdown-menu button {
      display: block;
      padding: 10px;
      text-decoration: none;
      color: black;
      text-align: left;
      background: none;
      border: none;
      width: 100%;
      font-size: 16px;
      cursor: pointer;
    }

    .dropdown-menu a:hover, .dropdown-menu button:hover {
      background-color: #f0f0f0;
    }

    .dropdown-menu button {
      background-color: #1a73e8;
      color: white;
      font-weight: bold;
      border-radius: 0 0 5px 5px;
    }

    .show-menu {
      display: block;
    }

    /* Menú de navegación */
    nav {
      background-color: #2c3e50;
      color: white;
      width: 200px;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      padding: 20px;
      margin-top: 80px;
    }

    nav ul {
      list-style-type: none;
      padding: 0;
    }

    nav ul li {
      margin: 15px 0;
    }

    nav ul li a {
      color: white;
      text-decoration: none;
      font-size: 18px;
      display: block;
    }

    nav ul li a:hover {
      text-decoration: underline;
    }

    /* Contenido principal */
    main {
    margin-left: 200px;
    padding: 20px;
    height: 100vh; /* Para que cubra toda la pantalla */
    background: 
        linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), 
        url('../../../assets/img/logos/logoSF.png') no-repeat center center/cover;
}


  </style>
</head>
<body>

  <!-- Cabecera -->
  <header>
    <div class="logo-container">
      <img src="../../../assets/img/logos/logoSF.png" alt="Logo">
      <span>Camptrack</span>
    </div>
    <div class="user-menu" onclick="toggleMenu()">
      <span>BIENVENIDO ALEJANDRO</span>
      <img src="../../../assets/img/log/FOTO CARNET ALEJANDRO.jpg" alt="Foto de perfil">
      <i class="fas fa-chevron-down"></i>
      <div class="dropdown-menu" id="dropdownMenu">
        <a href="#">Perfil</a>
        <a href="#">Configuración</a>
        <a href="#">Ayuda</a>
        <a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
      </div>
    </div>
  </header>

  <!-- Menú de navegación -->
  <nav>
    <ul>
      <li><a href="#"><i class="fas fa-home"></i> Inicio</a></li>
      <li><a href="#"><i class="fas fa-building"></i> Instalaciones</a></li>
      <li><a href="#"><i class="fas fa-users"></i> Trabajadores</a></li>
      <li><a href="#"><i class="fas fa-user-friends"></i> Familias</a></li>
      <li><a href="#"><i class="fas fa-cogs"></i> Actividades</a></li>
    </ul>
  </nav>

  <!-- Contenido principal -->
  <main>
    <h1>Bienvenido a Camptrack</h1>
  </main>

  <script>
    function toggleMenu() {
      var menu = document.getElementById("dropdownMenu");
      menu.classList.toggle("show-menu");
    }

    window.onclick = function(event) {
      if (!event.target.closest('.user-menu')) {
        document.getElementById("dropdownMenu").classList.remove("show-menu");
      }
    }
  </script>
</body>
</html>