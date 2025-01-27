<!--
=========================================================================================================
Componente: carousel.php
Descripción: Este archivo contiene un carrusel de imágenes reutilizable para mostrar contenido de manera interactiva,
             con controles manuales y temporizados. 
Autor: Alejandro Roces Fernandez
Fecha de Creación: 01 de enero de 2025
Última Modificación: 28 de enero de 2025
Versión: 1.0
Dependencias:
    - Bootstrap 5 (para los estilos y funcionalidades del carrusel)

Propósito:
    - Ofrecer una manera interactiva de mostrar contenido visual (imágenes o información) de forma dinámica.
    - Utilizar Bootstrap para gestionar la navegación automática y manual entre las imágenes.
    - Facilitar la reutilización del carrusel en diversas páginas con solo cambiar las imágenes o el contenido.
    - Mejorar la experiencia del usuario proporcionando un formato visual atractivo y fácil de usar.
=========================================================================================================
-->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000" style="max-width: 2240px; margin: auto; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">
  <!-- Indicadores -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>

  <!-- Contenido del slider -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/img/slider/IMG1.png" class="d-block w-100" alt="Imagen 1" style="height: auto; max-height: 1260px;">
    </div>
    <div class="carousel-item">
      <img src="assets/img/slider/IMG2.png" class="d-block w-100" alt="Imagen 2" style="height: auto; max-height: 1260px;">
    </div>
    <div class="carousel-item">
      <img src="assets/img/slider/IMG3.png" class="d-block w-100" alt="Imagen 3" style="height: auto; max-height: 1260px;">
    </div>
    <div class="carousel-item">
      <img src="assets/img/slider/IMG4.png" class="d-block w-100" alt="Imagen 4" style="height: auto; max-height: 1260px;">
    </div>
  </div>

  <!-- Controles manuales -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Siguiente</span>
  </button>
</div>
