<?php
require_once(__DIR__ . '/../../model/database/connection.php');

$conn = conectarDB(); // Se obtiene la conexión con PDO

// Verifica si se pasó un ID válido en la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para obtener los datos de la actividad específica con PDO
    $sql = "SELECT * FROM actividades_camptrack WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $actividad = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si la actividad no existe, mostrar error
    if (!$actividad) {
        echo "<p>Actividad no encontrada.</p>";
        exit;
    }
} else {
    echo "<p>ID de actividad no válido.</p>";
    exit;
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actividad de Ocio y Tiempo Libre</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: #f4f4f9;
    }

    header {
      background: #6200ea;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    .container {
      padding: 20px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .activity-header {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .activity-header img {
      width: 100%;
      max-width: 400px;
      border-radius: 10px;
    }

    .activity-info {
      flex: 1;
    }

    .activity-info h1 {
      margin: 0;
      color: #333;
    }

    .activity-info p {
      color: #555;
      line-height: 1.6;
    }

    .btn {
      display: inline-block;
      background: #6200ea;
      color: #fff;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
      margin: 10px 5px 0 0;
      cursor: pointer;
      text-align: center;
    }

    .btn:hover {
      background: #3700b3;
    }

    .section {
      margin-top: 40px;
    }

    .section h2 {
      margin-bottom: 20px;
      color: #333;
    }

    .gallery {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }

    .gallery img {
      width: calc(33.333% - 10px);
      border-radius: 10px;
    }

    footer {
      background: #333;
      color: #fff;
      text-align: center;
      padding: 10px;
      margin-top: 40px;
    }
  </style>
</head>
<body>
<?php require_once('../../templates/headerLigth.php'); ?> <!-- component : headerGen.php -->

  <header>
    <h1>Actividad de Ocio y Tiempo Libre</h1>
  </header>

  <div class="container">
    <!-- Información de la actividad -->
    <div class="activity-header">
    <img src="<?php echo htmlspecialchars($actividad['imagen']); ?>" alt="<?php echo htmlspecialchars($actividad['nombre']); ?>" class="img-fluid">
    <div class="activity-info">
      <h1><?php echo htmlspecialchars($actividad['nombre']); ?></h1>
        <p><strong>Descripción:</strong> <?php echo htmlspecialchars($actividad['descripcion']); ?></p>
        <p><strong>Instalación:</strong> <?php echo htmlspecialchars($actividad['instalacion']); ?></p>
        <p><strong>Fecha de inicio:</strong> <?php echo htmlspecialchars($actividad['fecha_inicio']); ?></p>
        <p><strong>Fecha de fin:</strong> <?php echo htmlspecialchars($actividad['fecha_fin']); ?></p>
        <p><strong>Inicio inscripciones:</strong> <?php echo htmlspecialchars($actividad['inicio_inscripciones']); ?></p>
        <p><strong>Fin inscripciones:</strong> <?php echo htmlspecialchars($actividad['fin_inscripciones']); ?></p>
        <p><strong>Tarifa:</strong> <?php echo htmlspecialchars($actividad['tarifa']); ?>€</p>
        
        <a href="inscripciones.php?id_actividad=<?php echo $actividad['id']; ?>" class="btn btn-primary">Apuntarse</a>
        <a href="informacion_campamento.pdf" download class="btn">Descargar Información</a>
        <a href="formulario_inscripcion.pdf" download class="btn">Descargar Inscripción</a>
      </div>
    </div>

    <!-- Descripción detallada -->
    <div class="section">
      <h2>Descripción</h2>
      <p>En esta actividad, los participantes disfrutarán de una experiencia única que combina aprendizaje, diversión y tiempo libre. Contamos con instructores profesionales y un entorno seguro para garantizar una experiencia inolvidable.</p>
    </div>

    <!-- Fotos de las instalaciones -->
    <div class="section">
      <h2>Instalaciones</h2>
      <p>Estas son nuestras instalaciones, diseñadas para ofrecer comodidad y seguridad durante la actividad:</p>
      <div class="gallery">
        <img src="../../assets/img/installation/Villamanin_CampusTuristico/img1.campusTuristicoVillamanin.jpg" alt="Foto 1 de las instalaciones">
        <img src="../../assets/img/installation/Villamanin_CampusTuristico/img2.campusTuristicoVillamanin.jpg" alt="Foto 2 de las instalaciones">
        <img src="../../assets/img/installation/Villamanin_CampusTuristico/img3.campusTuristicoVillamanin.jpg" alt="Foto 3 de las instalaciones">
        <img src="../../assets/img/installation/Villamanin_CampusTuristico/img4.campusTuristicoVillamanin.jpg" alt="Foto 4 de las instalaciones">
        <img src="../../assets/img/installation/Villamanin_CampusTuristico/img5.campusTuristicoVillamanin.jpg" alt="Foto 5 de las instalaciones">
        <img src="../../assets/img/installation/Villamanin_CampusTuristico/img6.campusTuristicoVillamanin.jpg" alt="Foto 6 de las instalaciones">
        <img src="../../assets/img/installation/Villamanin_CampusTuristico/img7.campusTuristicoVillamanin.jpg" alt="Foto 7 de las instalaciones">
        <img src="../../assets/img/installation/Villamanin_CampusTuristico/img8.campusTuristicoVillamanin.jpg" alt="Foto 8 de las instalaciones">
        <img src="../../assets/img/installation/Villamanin_CampusTuristico/img9.campusTuristicoVillamanin.jpg" alt="Foto 9 de las instalaciones">
      </div>
    </div>
  </div>

  <footer>
  <p>&copy; 2025 CampTrack. Todos los derechos reservados.</p>
  </footer>

  <script>
    document.querySelector('.signup-btn').addEventListener('click', function(e) {
      e.preventDefault();
      alert('Gracias por tu interés. Serás redirigido al formulario de inscripción.');
    });
  </script>
</body>
</html>
