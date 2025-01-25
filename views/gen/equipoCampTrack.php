<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Equipo de Monitores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .o {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 1rem 0;
        }

        .team-photo {
            width: 100%;
            height: auto;
            display: block;
        }

        .section {
            padding: 2rem;
            text-align: center;
        }

        .section h2 {
            margin-bottom: 1rem;
            font-size: 2rem;
            color: #4CAF50;
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: center;
        }

        .card {
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            max-width: 300px;
            text-align: center;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 100%;
            height: auto;
        }

        .card h3 {
            margin: 1rem 0 0.5rem;
            color: #4CAF50;
        }

        .card p {
            padding: 0 1rem 1rem;
            font-size: 0.9rem;
            color: #666;
        }

        footer {
            text-align: center;
            padding: 1rem;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
<?php require_once('../../templates/headerLigth.php'); ?> <!-- component : headerGen.php -->

    <header class="o">
        <h1>Conoce a Nuestro Equipo de Monitores</h1>
    </header>

    <section class="section">
        <h2>Equipo de Trabajo</h2>
        <img src="team-photo.jpg" alt="Foto del equipo de monitores" class="team-photo">
        <p>Estamos orgullosos de presentar a nuestro increíble equipo de monitores, dedicados a garantizar actividades seguras, divertidas y educativas para todos.</p>
    </section>

    <section class="section">
        <h2>Conoce a Cada Monitor</h2>
        <div class="cards">
            <div class="card">
                <img src="monitor1.jpg" alt="Foto de Monitor 1">
                <h3>Juan Pérez</h3>
                <p>Especialista en actividades deportivas y dinámicas de grupo.</p>
            </div>

            <div class="card">
                <img src="monitor2.jpg" alt="Foto de Monitor 2">
                <h3>María López</h3>
                <p>Experta en talleres artísticos y creatividad.</p>
            </div>

            <div class="card">
                <img src="monitor3.jpg" alt="Foto de Monitor 3">
                <h3>Carlos Ramírez</h3>
                <p>Encargado de aventuras al aire libre y seguridad.</p>
            </div>

            <div class="card">
                <img src="monitor4.jpg" alt="Foto de Monitor 4">
                <h3>Laura Fernández</h3>
                <p>Especialista en actividades educativas y team building.</p>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Empresa de Actividades. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
