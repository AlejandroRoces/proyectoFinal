<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $instalacion['titulo']; ?></title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: #f4f4f4;
      color: #333;
    }

    header {
      background: #4CAF50;
      color: white;
      text-align: center;
      padding: 20px 0;
    }

    .container {
      max-width: 1200px;
      margin: 20px auto;
      padding: 20px;
      background: white;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }

    .installation-header {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .installation-header img {
      width: 100%;
      max-width: 400px;
      border-radius: 10px;
    }

    .installation-info {
      flex: 1;
    }

    .installation-info h1 {
      color: #4CAF50;
      margin-bottom: 10px;
    }

    .installation-info p {
      line-height: 1.6;
      color: #555;
    }

    .gallery {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-top: 20px;
    }

    .gallery img {
      width: calc(33.333% - 10px);
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    footer {
      background: #4CAF50;
      color: white;
      text-align: center;
      padding: 10px 0;
      margin-top: 40px;
    }

    iframe {
      width: 100%;
      height: 400px;
      border: 0;
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <header>
    <h1><?php echo $instalacion['titulo']; ?></h1>
  </header>

  <div class="container">
    <div class="installation-header">
        <!-- Imagen principal -->
        <img src="<?php echo $instalacion['imagenes']['principal']; ?>" alt="<?php echo $instalacion['titulo']; ?>">
        <div class="installation-info">
            <h1><?php echo $instalacion['titulo']; ?></h1>
            <p><?php echo $instalacion['descripcion']; ?></p>
            <p><strong>Capacidad:</strong> <?php echo $instalacion['capacidad']; ?></p>
            <p><strong>Facilidades:</strong> <?php echo $instalacion['facilidades']; ?></p>
        </div>
    </div>

    <section>
        <h2>Galería</h2>
        <div class="gallery">
            <?php foreach ($instalacion['imagenes']['galeria'] as $imagen) : ?>
                <img src="<?php echo $imagen; ?>" alt="Foto de <?php echo $instalacion['titulo']; ?>">
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Mapa Incrustado usando iframe sin API Key -->
    <section>
    <h2>Ubicación en el Mapa</h2>
    <?php if (isset($instalacion['coordenadas'])): ?>
        <iframe 
            src="https://www.google.com/maps?q=<?php echo $instalacion['coordenadas']['lat']; ?>,<?php echo $instalacion['coordenadas']['lng']; ?>&hl=es&z=14&output=embed" 
            allowfullscreen>
        </iframe>
    <?php else: ?>
        <p>La ubicación de esta instalación no está disponible.</p>
    <?php endif; ?>
    </section>
  </div>

  <footer>
    <p>&copy; 2025 Empresa de Actividades. Todos los derechos reservados.</p>
  </footer>
</body>
</html>
