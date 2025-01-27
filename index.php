<!--
    =========================================================================================================
    Página: CampTrack
    Descripción: Esta pagina sirve para la gestion interna de la empresa asi como el contacto con el usuario.
    Autor: Alejandro Roces Fernandez
    Fecha de Creación: 01 de enero de 2025
    Última Modificación: 27 de enero de 2025
    Versión: 1.0
    ========================================================================================================
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampTrack</title>
    <link rel="icon" type="image/png" href="assets/img/logos/logoSF.png">
    <link rel="stylesheet" href="assets/css/layout_css/headerGen.css" />
    <link rel="stylesheet" href="assets/css/layout_css/nav.css" />
    <style>/* Contenedor Principal */
.featurette {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: 50px auto;
    max-width: 1200px;
    padding: 40px;
    background: linear-gradient(135deg, #e3f2fd, #bbdefb);
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    gap: 30px;
    overflow: hidden;
    position: relative;
}

/* Animación de Fondo */
.featurette:before {
    content: "";
    position: absolute;
    top: -20%;
    right: -20%;
    width: 300px;
    height: 300px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    filter: blur(100px);
    z-index: 0;
}

/* Contenido de Texto */
.featurette-content {
    flex: 1;
    z-index: 1;
}

.featurette-title {
    font-size: 2.5rem;
    font-weight: bold;
    color: #01579b;
    margin-bottom: 20px;
    text-transform: capitalize;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.featurette-description {
    font-size: 1.2rem;
    line-height: 1.8;
    color: #263238;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

/* Imagen */
.featurette-image {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1;
}

.styled-image {
    width: 100%;
    max-width: 500px;
    height: auto;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.styled-image:hover {
    transform: scale(1.05);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
}

/* Responsivo */
@media (max-width: 768px) {
    .featurette {
        flex-direction: column;
        text-align: center;
        gap: 20px;
    }

    .featurette-title {
        font-size: 2rem;
    }

    .styled-image {
        max-width: 100%;
    }
}

        /* RESPIRADERO*/

        .contenedor-fotos {
  display: flex;
  width: 100%;
}

.contenedor-fotos img {
  width: 25%;
  height: auto;
}
    </style>
    <base href="/CampTrack/proyectoFinal/">

</head>
<body>
    <?php require_once('templates/headerGen.php'); ?>     <!-- component : headerGen.php -->
    <?php require_once('./templates/nav.php'); ?>         <!-- component : nav.php -->
    <?php require_once('./templates/slider.php'); ?>      <!-- component : slider.php -->
   
<main style="background-color:gray">

<div class="featurette">
    <div class="featurette-content">
        <h2 class="featurette-title">¿Por qué nuestro campamento y no otro?</h2>
        <p class="featurette-description">En nuestro campamento vivirás aventuras únicas, rodeado de naturaleza y diversión. 
           Ofrecemos actividades para todos los gustos, fomentamos valores como el trabajo en equipo y contamos con un equipo 
           profesional comprometido con tu experiencia. 🎉 Diversión, aprendizaje y recuerdos inolvidables en un solo lugar. 
           ¡Ven y descúbrelo!</p>
    </div>
    <div class="featurette-image">
        <img src="assets/img/sec.1/sec.1.jpg" alt="Campamento" class="styled-image">
    </div>
</div>

<div class="contenedor-fotos">
  <img src="assets/img/resp.sec.1/sec.1.1-edit.jpg" alt="Imagen 1">
  <img src="assets/img/resp.sec.1/sec.1.2-edit.jpg" alt="Imagen 2">
  <img src="assets/img/resp.sec.1/sec.1.3-edit.jpg" alt="Imagen 3">
  <img src="assets/img/resp.sec.1/sec.1.4-edit.jpg" alt="Imagen 4">
</div>
<div class="featurette">
<div class="featurette-content">
        <h2 class="featurette-title">CAMPAMENTO 2025</h2>
        <p class="featurette-description">¡Los campamentos de 2025 serán una experiencia única! Con actividades emocionantes, aventuras al aire libre y un enfoque en el aprendizaje y los valores, garantizamos momentos inolvidables. Únete a nosotros y vive la mejor experiencia del año. ¡Te esperamos con los brazos abiertos!</p>
    </div>
    <div class="featurette-image">
        <img src="your-image-path.jpg" alt="Campamento 2025" class="styled-image">
    </div>
</div>


<div class="contenedor-fotos">
  <img src="assets/img/resp.sec.2/sec.2.1.jpeg" alt="Imagen 1">
  <img src="assets/img/resp.sec.2/sec.2.2.jpeg" alt="Imagen 2">
  <img src="assets/img/resp.sec.2/sec.2.3.jpg" alt="Imagen 3">
  <img src="assets/img/resp.sec.2/sec.2.4.jpeg" alt="Imagen 4">
</div>
<div class="featurette">
    <div class="featurette-content">
        <h2 class="featurette-title">NUESTRO EQUIPO</h2>
        <p class="featurette-description"> En CampTrack, contamos con un equipo experimentado y apasionado en la organización de campamentos y actividades al aire libre. Nos comprometemos a brindarte seguridad, diversión y aprendizaje, diseñando experiencias únicas que fomentan valores y cuidan cada detalle para que vivas momentos inolvidables. ¡Estás en buenas manos!
    </div>
    <div class="featurette-image">
        <img src="assets\img\monis\img.monisGen.jpg" alt="Campamento" class="styled-image">
    </div>
</div>
</main>
<?php require_once('templates/footerGen.php'); ?>       <!-- component : nav.php -->


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>