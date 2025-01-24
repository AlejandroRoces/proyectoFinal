<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampTrack</title>
    <link rel="icon" type="image/png" href="assets/img/logos/logoSF.png">
    <link rel="stylesheet" href="assets/css/layout_css/headerGen.css" />
    <link rel="stylesheet" href="assets/css/layout_css/nav.css" />
    <style>body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #6c757d;
        }
        .featurette {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 2rem;
            border-bottom: 1px solid #ddd;
        }
        .featurette:nth-child(even) {
            flex-direction: row-reverse;
        }
        .featurette-content {
            flex: 1;
            padding: 0 1rem;
        }
        .featurette-image {
            flex: 0 0 500px;
            height: 500px;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #6c757d;
        }
        .featurette h2 {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        .featurette p {
            margin: 0;
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
</head>
<body>
    <?php require_once('components/headerGen.php'); ?> <!-- component : headerGen.php -->
    <?php require_once('components/nav.php'); ?>       <!-- component : nav.php -->


    <!-- aside  (futuro carrusel) 
    <aside class="anuncioPrincipal">
        <div class="container">
            <h3>¡Ya están abiertas las plazas de inscripción para los campamentos de 2025!</h3>
            <button class="btn btn-light mt-3">Apuntarse</button>
        </div>
    </aside> -->

    
<main style="background-color:gray">

  
  <div class="featurette">
    <div class="featurette-content">
        <h2>PORQUE NUESTRO CAMPAMENTO Y NO OTRO</h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto molestias reiciendis, possimus odio incidunt adipisci amet. Sunt esse, ut cum, illo praesentium rem reprehenderit asperiores vero, dignissimos quidem tempore eveniet?</p>
    </div>
    <div class="featurette-image">500x500</div>
</div>
<div class="contenedor-fotos">
  <img src="assets/img/resp.sec.1/sec.1.1-edit.jpg" alt="Imagen 1">
  <img src="assets/img/resp.sec.1/sec.1.2-edit.jpg" alt="Imagen 2">
  <img src="assets/img/resp.sec.1/sec.1.3-edit.jpg" alt="Imagen 3">
  <img src="assets/img/resp.sec.1/sec.1.4-edit.jpg" alt="Imagen 4">
</div>
<div class="featurette">
    <div class="featurette-content">
        <h2>CAMPAMENTO 2024</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias laudantium distinctio totam veritatis expedita maxime soluta quos accusamus autem debitis ratione quia inventore voluptates exercitationem nemo, non est esse nesciunt.</p>
    </div>
    <div class="featurette-image">500x500</div>
</div>
<div class="contenedor-fotos">
  <img src="assets/img/resp.sec.2/sec.2.1.jpeg" alt="Imagen 1">
  <img src="assets/img/resp.sec.2/sec.2.2.jpeg" alt="Imagen 2">
  <img src="assets/img/resp.sec.2/sec.2.3.jpg" alt="Imagen 3">
  <img src="assets/img/resp.sec.2/sec.2.4.jpeg" alt="Imagen 4">
</div>
<div class="featurette">
    <div class="featurette-content">
        <h2>NUESTRO EQUIPO</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis laborum dolorum quidem alias eligendi ab, provident corporis? At eveniet quae incidunt, culpa quia, rerum, beatae ut labore voluptatum quidem perferendis.</p>
    </div>
    <div class="featurette-image">500x500</div>
</div>
</main>
<?php require_once('components/footerGen.php'); ?>       <!-- component : nav.php -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>