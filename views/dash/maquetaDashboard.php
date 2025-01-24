<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplicación Campus</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <style>
    /* Reset básico */
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
    header .user-info {
      display: flex;
      align-items: center;
    }
    header .user-info span {
      margin-left: 10px;
    }
    header .icons {
      display: flex;
      gap: 15px;
    }
    header .icons img {
      width: 25px;
      height: 25px;
    }
    header img.logo {
      height: 40px;
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

/* Tiempos de letra más pequeña para todos excepto "Inicio" */
nav ul li:not(.inicio) a {
  font-size: 15px;
}

nav .inicio a {
  font-size: 28px; /* Letra más grande solo para "Inicio" */
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



    /* Contenido principal */
    main {
      margin-left: 220px;
      padding: 20px;
    }
    main .content {
      display: flex;
    }
    main .content aside {
      width: 250px;
      background-color: #ecf0f1;
      padding: 15px;
      margin-right: 20px;
    }
    main .content .main-area {
      flex-grow: 1;
      background-color: white;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    aside {
  background-color: #f9f9f9;
  padding: 20px;
  margin-right: 20px;
  border-radius: 8px;
}

aside h3 {
  font-size: 1.5em;
  color: #333;
  margin-bottom: 10px;
}

aside p {
  font-size: 1em;
  color: #555;
  margin: 5px 0;
}

.actividad {
  background-color: #fff;
  padding: 15px;
  margin-bottom: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.actividad h4 {
  font-size: 1.3em;
  color: #1a73e8;
  margin-bottom: 10px;
}

.actividad p {
  font-size: 1em;
  color: #555;
  margin: 8px 0;
}

.fecha p {
  margin: 3px 0;
  font-size: 0.95em;
  color: #777;
}

.actividad p strong {
  font-weight: bold;
}

.actividad:hover {
  transform: translateY(-5px);
  transition: transform 0.2s ease;
}

.actividad:last-child {
  margin-bottom: 0;
}
.less{
  font-size: small;
}


  </style>
</head>
<body>

  <!-- Cabecera -->
  <header>
    <div class="user-info">
      <span>Usuario: Juan Pérez</span>
    </div>
    <div class="icons">
      <img src="img/log/FOTO CARNET ALEJANDRO.jpg" alt="Notificaciones">
      <img src= alt="Notificaciones">
      <img src= alt="Mensajes">
      <img src="img/logos/logo.png" class="logo" alt="Logo de la App">
    </div>
  </header>

  <!-- Menú de navegación -->
  <nav>
    <ul>
      <li class="inicio"><a href="#"><i class="fas fa-home"></i> Inicio</a></li> <!-- Icono de casa -->
      <li><br></li>
      <li><a href="#"><i class="fas fa-building"></i> Instalación</a></li> <!-- Icono de casa diferente -->
      <li><a href="#"><i class="fas fa-users"></i> Acampados</a></li> <!-- Icono de campistas -->
      <li class="dropdown">
        <a href="#" class="dropbtn"><i class="fas fa-futbol"></i> Actividades</a> <!-- Icono de balón -->
        <ul class="dropdown-content">
          <li><a href="#">Juegos</a></li>
          <li><a href="#">Veladas</a></li>
          <li><a href="#">Equipos</a></li>
        </ul>
      </li>
      <li><a href="#"><i class="fas fa-user-friends"></i> Familias</a></li> <!-- Icono de padres -->
      <li><a href="#"><i class="fas fa-cogs"></i> Configuración</a></li> <!-- Icono de configuración -->
    </ul>
  </nav>
  
  

  <!-- Contenido principal -->
  <main>
    <div class="content">
      <!-- Aside lateral -->
      <aside>
        <h3>ACTIVIDADES DADO EN NOMINA</h3>
        <p>(Actividades en las que estás contratado)</p>
      
        <!-- Entrada de actividad 1 -->
        <div class="actividad">
          <h4>CAMP 1ª SEMANA JULIO</h4>
          <p><strong>Número de Personas:</strong> 150</p>
          <p><strong>Albergue:</strong> Villamanin (Campus turístico)</p>
          <div class="fechas">
            <p><strong>Fecha de Inicio:</strong> 1 de julio de 2025</p>
            <p><strong>Fecha de Fin:</strong> 14 de julio de 2025</p>
          </div>
        </div>
      
        <!-- Entrada de actividad 2 -->
        <div class="actividad">
          <h4>CAMP 2ª SEMANA JULIO</h4>
          <p><strong>Número de Personas:</strong> 30</p>
          <p><strong>Albergue:</strong> Villamanin (Albergue juvenil)</p>
          <div class="fechas">
            <p><strong>Fecha de Inicio:</strong> 15 de julio de 2025</p>
            <p><strong>Fecha de Fin:</strong> 30 de julio de 2025</p>
          </div>
        </div>
      
        <!-- Entrada de actividad 3 -->
        <div class="actividad">
          <h4>CAMP 1ª SEMANA AGOSTO</h4>
          <p><strong>Número de Personas:</strong> 50</p>
          <p><strong>Albergue:</strong> Villamanin (Maristas)</p>
          <div class="fechas">
            <p><strong>Fecha de Inicio:</strong> 1 de agosto de 2025</p>
            <p><strong>Fecha de Fin:</strong> 15 de agosto de 2025</p>
          </div>
        </div>
      
      </aside>
      

      <!-- Área principal -->
      <div class="main-area">
        <h1>Contenido Principal</h1>
        <p>Aquí iría el contenido principal de la aplicación, como los cursos, tareas, etc.</p>
      </div>
    </div>
    <iframe 
        src="https://drive.google.com/drive/folders/1hvywwnd73AZZ0lXH-Uk9kGY3ZNwBToee?usp=sharing" 
        width="100%" 
        height="600" 
        style="border: none;">
    </iframe>
  </main>

</body>
</html>