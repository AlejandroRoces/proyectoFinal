<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sobre Nosotros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        .header {
            background-color: #3b82f6;
            color: white;
            text-align: center;
            padding: 2.5rem 1rem;
        }

        .header h1 {
            font-size: 3rem;
            margin: 0;
        }

        .section {
            padding: 3rem 1rem;
            text-align: center;
        }

        .section h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #3b82f6;
        }

        .section p {
            margin: 0 auto 2rem;
            max-width: 600px;
            font-size: 1.1rem;
            color: #555;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            padding: 0 1rem;
        }

        .card {
            position: relative;
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            display: block;
        }

        .card .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            padding: 1rem;
        }

        .card:hover .overlay {
            opacity: 1;
        }

        .card h3 {
            margin: 1rem 0 0.5rem;
            color: #3b82f6;
        }

        .card p {
            padding: 0 1rem 1.5rem;
            font-size: 1rem;
            color: #555;
        }

        footer {
            text-align: center;
            padding: 1.5rem;
            background-color: #3b82f6;
            color: white;
        }

        @media (max-width: 600px) {
            .header h1 {
                font-size: 2.5rem;
            }

            .section h2 {
                font-size: 2rem;
            }

            .card img {
                height: 150px;
            }
        }
    </style>
</head>
<body>
<?php require_once('../../templates/headerLigth.php'); ?> <!-- component : headerGen.php -->

    <header class="header">
        <h1>QUIEN SOMOS NOSOTROS</h1>
    </header>

    <section class="section">
        <h2>Sobre Nosotros</h2>
        <p>Impulsamos el futuro mediante soluciones tecnológicas innovadoras. Nuestro equipo trabaja para transformar ideas en realidades que impactan el mundo positivamente.</p>
    </section>

    <section class="section">
        <h2>Nuestras Áreas</h2>
        <div class="grid">
            <div class="card">
                <img src="../../assets/img/sobreNosotros/multiaventura.jpg" alt="Desarrollo de software">
                <div class="overlay">
                    <p>Disfruta de emocionantes actividades de multiaventura en la naturaleza.</p>
                </div>
                <h3>Multiaventura</h3>
                <p>Contamos con actividades de multiaventura ofrecidas siempre por expertos en dichas actividades.</p>
            </div>

            <div class="card">
                <img src="../../assets/img/sobreNosotros/robotica.jpg" alt="Inteligencia Artificial">
                <div class="overlay">
                    <p>Explora la robótica desde niveles básicos hasta avanzados.</p>
                </div>
                <h3>Robotica</h3>
                <p>Desarrollamos actividades de robotica a todos los niveles y adaptándonos al público.</p>
            </div>

            <div class="card">
                <img src="../../assets/img/sobreNosotros/actividadesAcuaticas.jpg" alt="Robótica">
                <div class="overlay">
                    <p>Vive la aventura en ríos, lagos y pantanos con nuestras actividades acuáticas.</p>
                </div>
                <h3>Actividades acuaticas</h3>
                <p>Tenemos actividades acuáticas en entornos como ríos, lagos y pantanos.</p>
            </div>

            <div class="card">
                <img src="../../assets/img/sobreNosotros/virtualReality.jpg" alt="Realidad Virtual">
                <div class="overlay">
                    <p>Sumérgete en mundos virtuales diseñados especialmente para ti.</p>
                </div>
                <h3>Realidad Virtual</h3>
                <p>Creamos actividades de realidad virtual integradas con el resto de actividades.</p>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Centro de Innovación Tecnológica. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
