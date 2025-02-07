<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campamentos</title>
    <link rel="icon" type="image/png" href="../../assets/img/logos/logoSF.png">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../assets/css/gen_css/campamentos.css">
    <?php require_once('../../assets/css/styles.php'); ?> <!-- styles-->

</head>
<body>
    <?php require_once('../../templates/headerLigth.php'); ?> <!-- component: headerGen.php -->

    <div class="header2">
        <h1>Campamentos</h1>
    </div>

<main>
    <section class="section">
        <h2>¿Por qué nuestro campamento es la mejor opción?</h2>
        <div class="cards">
            <div class="card">
                <img src="../../assets/img/campamentos/camp1.jpg" alt="Camps de día (julio)">
                <h3>Camps de día (julio)</h3>
                <p>El campamento infantil de julio ofrece actividades divertidas y llenas de aprendizaje y exploración en la naturaleza. Diseñado para fomentar la creatividad y el trabajo en equipo.</p>
                <div>
                    <a href="maquetaActividades.php" class="btn btn-sm btn-outline-secondary">+info</a>
                    <a href="inscripciones.php" class="btn btn-sm btn-outline-secondary">Apuntarse</a>
                </div>
                <br>
            </div>

            <div class="card">
                <img src="../../assets/img/campamentos/camp2.jpg" alt="Camps de día (agosto)">
                <h3>Camps de día (agosto)</h3>
                <p>Agosto trae aventuras emocionantes, actividades al aire libre y talleres creativos. Es el momento perfecto para disfrutar de los últimos días de verano y crear recuerdos inolvidables.</p>
                <div>
                    <a href="#" class="btn btn-sm btn-outline-secondary">+info</a>
                    <a href="#" class="btn btn-sm btn-outline-secondary">Apuntarse</a>
                </div>
            </div>

            <div class="card">
                <img src="../../assets/img/campamentos/camp3.jpg" alt="Camps de día (septiembre)">
                <h3>Camps de día (septiembre)</h3>
                <p>Septiembre marca el regreso a la rutina con actividades que fomentan el aprendizaje, la creatividad y el trabajo en equipo. Ideal para prepararse para nuevos retos y proyectos.</p>
                <div>
                    <a href="#" class="btn btn-sm btn-outline-secondary">+info</a>
                    <a href="#" class="btn btn-sm btn-outline-secondary">Apuntarse</a>
                </div>
            </div>
        </div>
    </section>
</main>


<footer>
    <p>&copy; 2025 CampTrack. Todos los derechos reservados.</p>
</footer>

</body>
</html>
