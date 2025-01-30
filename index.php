<!DOCTYPE html>
<!--
    =========================================================================================================
    Página: CampTrack
    Descripción: Esta pagina sirve para la gestion interna de la empresa asi como el contacto con el usuario.
    Autor: Alejandro Roces Fernandez
    Fecha de Creación: 01 de enero de 2025
    Última Modificación: 27 de enero de 2025
    Versión: 1.0
    Dependencias:
        - index.css (estilos específicos para esta página)
        - boostrap  (librerias para estructuracion y funcionalidad)
        
        - headerGen.php (header especifico del index con su css propio)
        - nav.php       (nav para la navegabilidad de CampTrack)
        - slider.php    (slider para la publicidad de campTrack )
        - footerGen.php (footer completo de campTrack)
    ========================================================================================================
-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampTrack</title>
    <link rel="icon" type="image/png" href="assets/img/logos/logoSF.png">
    <link rel="stylesheet" href="assets/css/index_css/index.css" />
    <base href="/CampTrack/proyectoFinal/">
</head>

<body>
    <?php require_once('templates/headerGen.php'); ?>   <!-- component : headerGen.php -->
    <?php require_once('templates/nav.php'); ?>         <!-- component : nav.php -->
    <?php require_once('templates/slider.php'); ?>      <!-- component : slider.php -->


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
            <div class="featurette-image">
                <img src="assets/img/resp.sec.1/GettyImages-505936027.jpg" alt="Campamento 2025" class="styled-image">
            </div>
            <div class="featurette-content">
                <h2 class="featurette-title">CAMPAMENTO 2025</h2>
                <p class="featurette-description">¡Los campamentos de 2025 serán una experiencia única! Con actividades emocionantes, aventuras al aire libre y un enfoque en el aprendizaje y los valores, garantizamos momentos inolvidables. Únete a nosotros y vive la mejor experiencia del año. ¡Te esperamos con los brazos abiertos!</p>
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
                <p class="featurette-description"> En CampTrack, contamos con un equipo experimentado y apasionado en la organización de campamentos y actividades al aire libre. Nos comprometemos a brindarte seguridad, diversión y aprendizaje, diseñando experiencias únicas que fomentan valores y cuidan cada detalle para que vivas momentos inolvidables. ¡Estás en buenas manos!</p>
            </div>
            <div class="featurette-image">
                <img src="assets\img\monis\img.monisGen.jpg" alt="Campamento" class="styled-image">
            </div>
        </div>

    </main>

    <?php require_once('templates/footerGen.php'); ?>       <!-- component : footerGen.php -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>