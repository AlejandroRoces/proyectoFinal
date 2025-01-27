<!--
=========================================================================================================
Componente: instalacion.php
Descripción: Este archivo presenta una página individual para cada instalación, mostrando su título, descripción, 
             capacidad, facilidades, imágenes de la galería y ubicación en el mapa.
Autor: Alejandro Roces Fernandez
Fecha de Creación: 01 de enero de 2025
Última Modificación: 28 de enero de 2025
Versión: 1.0
Dependencias:
    - instalaciones.css     (estilos generales y específicos de la página)
    - Google Maps API       (para la visualización del mapa, si se utiliza)

Propósito:
    - Presenta información detallada sobre una instalación específica, incluyendo descripción, imágenes y mapa.
    - Permite mostrar datos dinámicos de las instalaciones con PHP, lo que facilita la gestión del contenido.
    - La galería de imágenes permite visualizar diversas perspectivas de la instalación.
    - La integración con Google Maps proporciona la ubicación precisa de la instalación para facilitar el acceso.
    - Mantiene una estructura organizada con un diseño limpio y profesional para mejorar la experiencia del usuario.
=========================================================================================================
-->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $instalacion['titulo']; ?></title>
  <link rel="stylesheet" href="../assets/css/instalacionTemplate/instalaciones.css" />
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
