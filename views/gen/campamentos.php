<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campamentos</title>
    <link rel="icon" type="image/png" href="img/logos/logoSF.png">
    <link rel="stylesheet" href="../../assets/css/globales.php">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: var(--color-nav); /* pruebas configurador */
            color: white;
            text-align: center;
            padding: 16px 0;
        }

        .section {
            padding: 32px;
            text-align: center;
        }

        .section h2 {
            margin-bottom: 16px;
            font-size: 32px;
            color: #4CAF50;
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
            justify-content: center;
        }

        .card {
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            max-width: 350px;
            text-align: center;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 100%;
            height: 220px;
        }

        .card h3 {
            margin: 16px 0 8px;
            color: #4CAF50;
        }

        .card p {
            padding: 0 16px 16px;
            font-size: 14px;
            color: #666;
        }

        footer {
            text-align: center;
            padding: 16px;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
<?php require_once('../../templates/headerLigth.php'); ?> <!-- component: headerGen.php -->

<header>
    <h1>Campamentos</h1>
</header>

<main>
    <section class="section">
        <h2>¿Por qué nuestro campamento es la mejor opción?</h2>
        <div class="cards">
            <div class="card">
                <img src="../../assets/img/campamentos/camp1.jpg" alt="Camps de día (julio)">
                <h3>Camps de día (julio)</h3>
                <p>El campamento infantil de julio ofrece actividades divertidas y llenas de aprendizaje, como juegos al aire libre, talleres creativos y exploración en la naturaleza. Diseñado para fomentar la creatividad y el trabajo en equipo.</p>
                <div>
                    <a href="maquetaActividades.php" class="btn btn-sm btn-outline-secondary">+info</a>
                    <a href="inscripciones.php" class="btn btn-sm btn-outline-secondary">Apuntarse</a>
                </div>
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
    <p>&copy; 2025 Empresa de Actividades. Todos los derechos reservados.</p>
</footer>

</body>
</html>
