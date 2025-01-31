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
    }

    header .logo-container {
      display: flex;
      align-items: center;
    }

    header .logo-container img {
      height: 50px;
      margin-right: 10px;
    }

    header .logo-container span {
      font-size: 32px; 
      font-weight: bold;
    }

    header .user-info {
      display: flex;
      align-items: center;
      justify-content: flex-end; 
    }

    header .user-info span {
      font-size: 20px; 
      margin-left: 10px;
    }

    header .user-info img {
      width: 50px; 
      height: 50px;
      border-radius: 50%; 
      object-fit: cover; 
    }

    header .icons {
      display: flex;
      gap: 15px;
    }

    header .icons img {
      width: 25px;
      height: 25px;
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
      font-size: 28px;
      display: block;
    }

    nav ul li a:hover {
      text-decoration: underline;
    }
    nav ul li:not(.inicio) a {
      font-size: 15px;
    }

    nav .inicio a {
      font-size: 28px;
    }

    nav .dropdown {
      position: relative;
    }

    nav .dropdown-content {
      display: none;
      position: absolute;
      left: 0;
      background-color: #34495e;
      width: 100%;
      z-index: 1;
    }

    nav .dropdown:hover .dropdown-content {
      display: block;
    }

    nav .dropdown-content li {
      padding: 10px;
      border-top: 1px solid #2c3e50;
    }

    nav .dropdown-content li a {
      color: white;
      font-size: 22px;
    }

    nav .dropdown-content li a:hover {
      background-color: #2980b9;
    }

    /* Estilo para la imagen de fondo en el main */
    main {
      margin-left: 200px;
      padding: 0;
      height: 100vh;
      background-image: url('../../../assets/img/logos/logo.png');
      background-size: cover;
      background-position: center; 
      background-repeat: no-repeat; 
      opacity: 0.2;
    }
  </style>
</head>
<body>

  <!-- Cabecera -->
  <header>
    <!-- Logo y "Camptrack" -->
    <div class="logo-container">
      <img src="../../../assets/img/logos/logoSF.png" alt="Logo">
      <span>Camptrack</span>
    </div>

    <!-- Información de usuario -->
    <div class="user-info">
      <img src="../../../assets/img/log/FOTO CARNET ALEJANDRO.jpg" alt="Foto de perfil">
      <span>BIENVENIDO ALEJANDRO</span>
    </div>
  </header>

  <!-- Menú de navegación -->
  <nav>
    <ul>
      <li class="inicio"><a href="#"><i class="fas fa-home"></i> Inicio</a></li>
      <li><br></li>
      <li><a href="#"><i class="fas fa-building"></i> INSTALACIONES</a></li>
      <li><a href="#"><i class="fas fa-users"></i> TRABAJADORES</a></li>
      <li><a href="#"><i class="fas fa-user-friends"></i> FAMILIAS</a></li>
      <li><a href="#"><i class="fas fa-cogs"></i> ACTIVIDADES</a></li>
      <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a></li>
    </ul>
  </nav>

  <!-- Contenido principal -->

</body>
</html>
