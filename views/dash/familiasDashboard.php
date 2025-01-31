<?php
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['user'])) {
    header("Location: ../../login.php"); // Redirige al login si no ha iniciado sesión
    exit();
}

$userName = $_SESSION['user']; // Obtiene el nombre del usuario desde la sesión
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foro de Padres - Campamento</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    header {
      background-color: #007bff;
      color: white;
      padding: 10px 0;
    }
    .header-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 20px;
    }
    .message-card {
      margin-bottom: 20px;
    }
    .message-card img {
      max-height: 200px;
      object-fit: cover;
      border-radius: 10px;
    }
    .audio-player {
      margin-top: 10px;
    }
  </style>
</head>
<body>

<header>
    <div class="header-container">
        <h1>
            <img src="../../assets/img/logos/logoSF.png" alt="Logo" style="height: 50px; vertical-align: middle; margin-right: 10px;">
            Foro familias - Campamento
        </h1>
        <div class="user-info">
            <span id="loggedInUser" class="text-light" style="font-size: 20px; font-weight: bold;">
                👋 ¡Hola, <?php echo htmlspecialchars($userName); ?>!
            </span>
            <a href="logout.php"><strong class="btn btn-light btn-sm ms-3">Cerrar sesión</strong></a>
        </div>
    </div>
</header>

  <div class="container mt-4">
    <!-- Filtro par ordenar los mensajes -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="h4">Publicaciones</h2>
      <select class="form-select w-auto" id="sortOptions">
        <option value="recent">Más recientes</option>
        <option value="oldest">Más antiguas</option>
      </select>
    </div>


    <div id="messagesContainer">

      <div class="card message-card">
        <div class="card-body">
          <h5 class="card-title">Mensaje del (fecha)</h5>
          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero eius earum iure natus eligendi nesciunt.</p>
          <img src="\CampTrack\proyectoFinal\assets\img\dash\iimage.png" alt="Foto de la caminata" class="img-fluid my-3">
          <br><audio controls class="audio-player">
            <source src="audio-ejemplo.mp3" type="audio/mpeg">
            Tu navegador no soporta la reproducción de audio.
          </audio>
          <p class="text-muted small">Publicado por: Trabajador 1</p>
        </div>
      </div>

    </div>
  </div>

  <footer class="bg-dark text-white text-center py-3 mt-4">
    <p>&copy; 2025 Campamento Aventuras. Todos los derechos reservados.</p>
  </footer>
</body>
</html>
