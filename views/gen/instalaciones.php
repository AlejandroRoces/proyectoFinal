<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuestras instalaciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 16px 0;
        }

        .team-photo {
            width: 100%;
            height: auto;
            display: block;
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
        .card h4 {
            margin: 5px 0 8px;
            color: #4CAF50;
        }

        .card p {
            padding: 0 16px 16px;
            font-size: 14px;
            color: #666;
            text-justify:auto;
        }

        .card a{
            text-decoration: none;
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
<?php require_once('../../templates/headerLigth.php'); ?> <!-- component : headerGen.php -->


    <header>
        <h1>INSTALACIONES</h1>
    </header>

    <section class="section">
        <h2>Conoce todas nuestras instalaciones</h2>
        <div class="cards">

        <div id="card1" class="card">
            <a href="../../controller/instalaciones.php?id=campus_turistico">
                <img src="../../assets/img/installation/Villamanin_CampusTuristico/img1.campusTuristicoVillamanin.jpg" alt="camp">
                <h3>Campus turístico</h3>
                <h4>(Villamanin)</h4>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis facere eaque cumque nobis magni exercitationem quisquam molestiae praesentium aut provident soluta placeat labore sit, enim architecto odit sequi ut. Soluta!</p>
            </a>
        </div>

    <div id="card2" class="card">
        <a href="../../controller/instalaciones.php?id=albergue_juvenil">
        <img src="../../assets/img/installation/Villamanin_AlbergueJuvenil/img1.AlbergueJuvenil.jpg" alt="Foto de Monitor 3">
        <h3>Albergue juvenil</h3>
        <h4>(Villamanin)</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi magnam voluptatibus excepturi molestiae aliquid inventore obcaecati reiciendis corrupti dolores architecto eius, quia consequatur neque quam. Ad, architecto odit! Dolores, nesciunt?</p></a>
  
    </div>
    <div id="card3" class="card">
        <a href="../../controller/instalaciones.php?id=Maristas">   
        <img src="../../assets/img/installation/Villamanin_Maristas/img1.MaristasVillamanin.jpg" alt="Foto de Monitor 4">
        <h3>Albergue Maristas</h3>
        <h4>(Villamanin)</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas accusantium, consequatur dolores expedita veritatis distinctio iste iusto! Consectetur laudantium a molestiae nulla at dignissimos iste, hic adipisci dolorem tempora doloribus!</p>
        </a>
    
    <div id="card4" class="card">
        <a href="../../controller/instalaciones.php?id=PolaGrdon">   
        <img src="../../assets\img\installation\PolaGordon_CampamentoJuvenilPolaGordon\img1.CampamentoJuvenilPolaGordon.jpg" alt="camp">
        <h3>Campamento juvenil</h3>
        <h4>(Pola de Gordon)</h4>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis facere eaque cumque nobis magni exercitationem quisquam molestiae praesentium aut provident soluta placeat labore sit, enim architecto odit sequi ut. Soluta!</p>
        </a>
    </div>
    <div id="card5" class="card">
        <a href="../../controller/instalaciones.php?id=Zamora">   
        <img src="../../assets\img\installation\Zamora_AlbergueSantibáñezDeVidriales\img1.SantibañezZamora.jpg" alt="Foto de Monitor 3">
        <h3>Albergue santibáñez de vidriales</h3>
        <h4>(Zamora)</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi magnam voluptatibus excepturi molestiae aliquid inventore obcaecati reiciendis corrupti dolores architecto eius, quia consequatur neque quam. Ad, architecto odit! Dolores, nesciunt?</p>
        </a>
    </div>
    <div id="card6" class="card">
        <a href="../../controller/instalaciones.php?id=Barro">   
        <img src="../../assets\img\installation\Llanes_ColoniaSanJose\img1.ColoniaSanJose.jpg" alt="Foto de Monitor 4">
        <h3>Colonia San Jose Barro</h3>
        <h4>(Llanes)</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas accusantium, consequatur dolores expedita veritatis distinctio iste iusto! Consectetur laudantium a molestiae nulla at dignissimos iste, hic adipisci dolorem tempora doloribus!</p>
        </a>
    </div>
</div>

    </section>

    <footer>
        <p>&copy; 2025 Empresa de Actividades. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
