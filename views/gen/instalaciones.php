<!DOCTYPE html>
<!--
    =========================================================================================================
    Página: CampTrack (instalaciones)
    Descripción: Esta pagina muestra los diferntes albergue que ofrece campTrack para sus campamentos.
    Autor: Alejandro Roces Fernandez
    Fecha de Creación: 01 de enero de 2025
    Última Modificación: 28 de enero de 2025
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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Instalaciones CampTrack</title>
    <link rel="icon" type="image/png" href="../../assets/img/logos/logoSF.png">

    <link rel="stylesheet" href="../../assets/css/gen_css/instalaciones.css">
    <?php require_once('../../assets/css/styles.php'); ?> <!-- styles-->

</head>
<body>
<?php require_once('../../templates/headerLigth.php'); ?> <!-- component : headerGen.php -->


    <header class="header2">
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
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi magnam voluptatibus excepturi molestiae aliquid inventore obcaecati reiciendis corrupti dolores architecto eius, quia consequatur neque quam. Ad, architecto odit! Dolores, nesciunt?</p>
            </a>
        </div>

        <div id="card3" class="card">
            <a href="../../controller/instalaciones.php?id=albergue_maristas">   
                <img src="../../assets/img/installation/Villamanin_Maristas/img1.MaristasVillamanin.jpg" alt="Foto de Monitor 4">
                <h3>Albergue Maristas</h3>
                <h4>(Villamanin)</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas accusantium, consequatur dolores expedita veritatis distinctio iste iusto! Consectetur laudantium a molestiae nulla at dignissimos iste, hic adipisci dolorem tempora doloribus!</p>
            </a>
        </div>
    
        <div id="card4" class="card">
            <a href="../../controller/instalaciones.php?id=campamento_juvenil">   
                <img src="../../assets\img\installation\PolaGordon_CampamentoJuvenilPolaGordon\img1.CampamentoJuvenilPolaGordon.jpg" alt="camp">
                <h3>Campamento juvenil</h3>
                <h4>(Pola de Gordon)</h4>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis facere eaque cumque nobis magni exercitationem quisquam molestiae praesentium aut provident soluta placeat labore sit, enim architecto odit sequi ut. Soluta!</p>
            </a>
        </div>

        <div id="card5" class="card">
            <a href="../../controller/instalaciones.php?id=albergue_zamora">   
                <img src="../../assets\img\installation\Zamora_AlbergueSantibáñezDeVidriales\img1.SantibañezZamora.jpg" alt="Foto de Monitor 3">
                <h3>Albergue santibáñez de vidriales</h3>
                <h4>(Zamora)</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi magnam voluptatibus excepturi molestiae aliquid inventore obcaecati reiciendis corrupti dolores architecto eius, quia consequatur neque quam. Ad, architecto odit! Dolores, nesciunt?</p>
            </a>
        </div>

        <div id="card6" class="card">
            <a href="../../controller/instalaciones.php?id=colonia_barro">   
                <img src="../../assets\img\installation\Llanes_ColoniaSanJose\img1.ColoniaSanJose.jpg" alt="Foto de Monitor 4">
                <h3>Colonia San Jose Barro</h3>
                <h4>(Llanes)</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas accusantium, consequatur dolores expedita veritatis distinctio iste iusto! Consectetur laudantium a molestiae nulla at dignissimos iste, hic adipisci dolorem tempora doloribus!</p>
            </a>
        </div>

    </section>

    <footer>
    <p>&copy; 2025 CampTrack. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
