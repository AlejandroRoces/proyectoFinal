<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aventura</title>
    <link rel="icon" type="image/png" href="../../assets/img/logos/logoSF.png">

    <!-- Carga de estilos -->
    <link rel="stylesheet" href="../../assets/css/gen_css/sobreNosotros.css">
    <?php require_once('../../assets/css/styles.php'); ?> <!-- styles-->

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <style>
        .activity-card {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            transition: transform 0.2s ease-out;
        }

        .activity-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .activity-card .title {
            position: absolute;
            bottom: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            text-align: center;
            padding: 10px;
            font-weight: bold;
        }

        .viñeta {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin: 20px;
            box-shadow: 0 4px 6px rgba(79, 143, 172, 0.1);
            color: #333;
            max-width: 1300px;
            margin-left: auto;
            margin-right: auto;
        }

        .viñeta h2 {
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .viñeta p {
            font-size: 1rem;
            line-height: 1.6;
            color: #555;
        }

        .viñeta ul {
            list-style-type: none;
            padding-left: 0;
            margin-bottom: 15px;
        }

        .viñeta ul li {
            background: #e0f7fa;
            padding: 10px;
            margin-bottom: 8px;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
        }

        .viñeta ul li svg {
            margin-right: 10px;
            font-size: 1.5rem;
        }

        .viñeta p:last-child {
            font-weight: bold;
            font-size: 1.1rem;
        }
    </style>
</head>

<body>

    <?php require_once('../../templates/headerLigth.php'); ?> <!-- Carga del header -->

    <header class="header2 text-center my-4">
        <h1>LA ZONA</h1>
    </header>

    <section class="container text-center">
        <iframe
            src="https://www.google.com/maps?q=42.973,-5.705&hl=es&z=14&t=k&output=embed"
            width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen>
        </iframe>

    </section>
    <div class="viñeta">
        <h2>🌲 Descubre Villamanín: Paraíso del Ocio y la Aventura ⛰️</h2>
        <p>
            Villamanín es el destino perfecto para los amantes del turismo activo. Ubicado en plena montaña leonesa,
            este enclave natural ofrece experiencias inolvidables de ocio, tiempo libre y multiaventura.
        </p>
        <ul>
            <li>🚵‍♂️ <strong> de senderismo y BTT </strong>
                <tab> &nbsp;&nbsp; entre paisajes espectaculares.
            </li>
            <li>🧗 <strong>Escalada y vías ferratas </strong> &nbsp;&nbsp; para los más aventureros.</li>
            <li>🏞️ <strong>Parajes naturales impresionantes </strong> &nbsp;&nbsp; como los Hoces de Vegacervera.</li>
            <li>🌿 <strong>Contacto directo con la naturaleza </strong> &nbsp;&nbsp; en un entorno único.</li>
            <li>❄️ <strong>Deportes de invierno </strong> &nbsp;&nbsp; gracias a la cercanía de la estación de esquí de Pajares.</li>
        </ul>
        <p>
            Ya sea que busques adrenalina o tranquilidad, en Villamanín encontrarás el plan ideal para una escapada inolvidable.
        </p>
    </div>
    <br><br>
    <section style="text-align: center;">
        <h2>Qué ofrecemos</h2>
    </section>
    <br>
    <div class="container py-5">
        <div class="row g-4">
            <?php
            $activities = [
                ["img1.jpeg", "Cueva de Valporquero"],
                ["img2.jpeg", "Vias Ferratas"],
                ["img3.jpg", "Espeologia"],
                ["img4.jpg", "Barranquismo"],
                ["img5.jpg", "Raquetas de Nieve"],
                ["img6.jpeg", "Combat Archery"],
                ["img7.jpeg", "Escalada"],
                ["img8.jpg", "Piraguismo"],
                ["img9.jpg", "Padel Surf"],
                ["img10.jpg", "Treking"],
                ["img11.png", "BTT"],
                ["img12.jpg", "Proximamente.."]
            ];

            foreach ($activities as $activity) {
                echo '
                    <div class="col-md-3">
                        <div class="activity-card">
                            <img src="../../assets/img/aventura/' . $activity[0] . '" alt="' . $activity[1] . '">
                            <div class="title">' . $activity[1] . '</div>
                        </div>
                    </div>';
            }
            ?>
        </div>
    </div>

    <footer class="text-center py-4">
        <p>&copy; 2025 CampTrack. Todos los derechos reservados.</p>
    </footer>

    <script>
        document.querySelectorAll('.activity-card').forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                const rotateX = ((y - centerY) / centerY) * -20;
                const rotateY = ((x - centerX) / centerX) * 20;

                card.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = 'rotateX(0deg) rotateY(0deg)';
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>