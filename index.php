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
    <style>
        .fila-imagenes {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
            margin-bottom: 40px;
        }

        .imagen {
    width: 500px; /* Tamaño fijo de las imágenes */
    height: 420px; /* Mantiene la proporción de la imagen */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Transición suave */
}

/* Efecto al pasar el cursor */
.imagen:hover {
    transform: scale(1.05); /* Aumento mínimo del tamaño de la imagen */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra sutil */
}
</style>
</head>

<body>
    <?php require_once('templates/headerGen.php'); ?> <!-- component : headerGen.php -->
    <?php require_once('templates/nav.php'); ?> <!-- component : nav.php -->
    <?php require_once('templates/slider.php'); ?> <!-- component : slider.php -->
    <!-- Sección 1 -->
    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-12">
                <h2>¿PORQUE NUESTRO CAMPAMENTO Y NO OTRO?</h2>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-6">
                <p>En nuestro campamento vivirás aventuras únicas, rodeado de naturaleza y diversión.
                    Ofrecemos actividades para todos los gustos, fomentamos valores como el trabajo en equipo y contamos con un equipo
                    profesional comprometido con tu experiencia. 🎉 Diversión, aprendizaje y recuerdos inolvidables en un solo lugar.
                    ¡Ven y descúbrelo!</p>
            </div>
            <div class="col-md-6">
                <img src="assets/img/sec.1/sec.1.jpg" alt="Imagen seccion1" class="img-fluid">
            </div>
        </div>
    </div>
    <!-- Respiradero 1 -->

    <div class="contenedor-fotos">
        <img src="assets/img/resp.sec.1/sec.1.1-edit.jpg" alt="Imagen 1">
        <img src="assets/img/resp.sec.1/sec.1.2-edit.jpg" alt="Imagen 2">
        <img src="assets/img/resp.sec.1/sec.1.3-edit.jpg" alt="Imagen 3">
        <img src="assets/img/resp.sec.1/sec.1.4-edit.jpg" alt="Imagen 4">
    </div>

    <!-- Sección 2 -->
    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-12">
                <h2>CAMPAMENTOS 2025</h2>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-6 order-md-2">
                <p>¡Los campamentos de 2025 serán una experiencia única! Con actividades emocionantes, aventuras al aire libre y un enfoque 
                    en el aprendizaje y los valores, garantizamos momentos inolvidables. Únete a nosotros y vive la mejor experiencia del año. 
                    ¡Te esperamos con los brazos abiertos!</p>
                </p>
            </div>
            <div class="col-md-6 order-md-1">
                <img src="assets/img/resp.sec.1/GettyImages-505936027.jpg" alt="Imagen seccion2" class="img-fluid">
            </div>
        </div>
    </div>
    <!-- Respiradero 2 -->
    <div class="contenedor-fotos">
        <img src="assets/img/resp.sec.2/sec.2.1.jpeg" alt="Imagen1">
        <img src="assets/img/resp.sec.2/sec.2.2.jpeg" alt="Imagen2">
        <img src="assets/img/resp.sec.2/sec.2.3.jpg"  alt="Imagen3">
        <img src="assets/img/resp.sec.2/sec.2.4.jpeg" alt="Imagen4">
    </div>
    <!-- Sección 3 -->
    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-12">
                <h2>NUESTO EQUIPO</h2>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-6">
                <p>En CampTrack, contamos con un equipo experimentado y apasionado en la organización de campamentos y actividades al aire libre. 
                    Nos comprometemos a brindarte seguridad, diversión y aprendizaje, diseñando experiencias únicas que fomentan valores y cuidan 
                    cada detalle para que vivas momentos inolvidables. ¡Estás en buenas manos!</p>
            </div>
            <div class="col-md-6">
                <img src="assets\img\monis\img.monisGen.jpg" alt="Imagen seccion3" class="img-fluid">
            </div>
        </div>
    </div>

    <div class="fila-imagenes">
        <a href="views/gen/aventura.php"><img src="assets/img/nav2/(nav) AVENTURA.EDIT.jpg" alt="Imagen 1" class="imagen"></a>
        <a href="views/gen/cursos.php"><img src="assets/img/nav2/(nav) CURSOS.EDIT.jpg" alt="Imagen 2" class="imagen"></a> 
        <a href="views/gen/masActividades.php"><img src="assets/img/nav2/(nav) MAS ACTIVIDADES.EDIT.jpg" alt="Imagen 3" class="imagen"></a> 
    </div>



    </main>

    <?php require_once('templates/footerGen.php'); ?> <!-- component : footerGen.php -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>