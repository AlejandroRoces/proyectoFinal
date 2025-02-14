<!DOCTYPE html>
<!--
    =========================================================================================================
    Página: Instalaciones
    Descripción: Esta pagina muestra los diferentes albergue que ofrece campTrack para sus campamentos.
    Autor: Alejandro Roces Fernandez
    Fecha de Creación: 01 de enero de 2025
    Última Modificación: 14.02.2025
    Versión: 1.0
    Dependencias:
        - instalaciones.css (estilos específicos para esta página)
        - boostrap          (librerias para estructuracion y funcionalidad)

        - headerligth.php   (header ligero para la view con css integrado)
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
                    <p>Ubicado en un entorno natural privilegiado, el Campus Turístico Villamanín ofrece una experiencia única para quienes buscan aventura y descanso en la montaña. Sus instalaciones cuentan con alojamiento, actividades al aire libre y rutas de senderismo para disfrutar en cualquier época del año.</p>
                </a>
            </div>

            <div id="card2" class="card">
                <a href="../../controller/instalaciones.php?id=albergue_juvenil">
                    <img src="../../assets/img/installation/Villamanin_AlbergueJuvenil/img1.AlbergueJuvenil.jpg" alt="Foto de Monitor 3">
                    <h3>Albergue juvenil</h3>
                    <h4>(Villamanin)</h4>
                    <p>Este albergue es ideal para grupos y viajeros jóvenes que buscan comodidad y naturaleza. Con amplias habitaciones, zonas comunes y un entorno espectacular, permite disfrutar de actividades deportivas, excursiones y experiencias en plena montaña leonesa.</p>
                </a>
            </div>

            <div id="card3" class="card">
                <a href="../../controller/instalaciones.php?id=albergue_maristas">
                    <img src="../../assets/img/installation/Villamanin_Maristas/img1.MaristasVillamanin.jpg" alt="Foto de Monitor 4">
                    <h3>Albergue Maristas</h3>
                    <h4>(Villamanin)</h4>
                    <p>Situado en un entorno natural excepcional, este albergue pertenece a los Maristas y está diseñado para campamentos, convivencias y actividades educativas. Sus amplias instalaciones permiten desarrollar actividades en contacto con la naturaleza, fomentando el aprendizaje y la convivencia.</p>
                </a>
            </div>

            <div id="card4" class="card">
                <a href="../../controller/instalaciones.php?id=campamento_juvenil">
                    <img src="../../assets\img\installation\PolaGordon_CampamentoJuvenilPolaGordon\img1.CampamentoJuvenilPolaGordon.jpg" alt="camp">
                    <h3>Campamento juvenil</h3>
                    <h4>(Pola de Gordon)</h4>
                    <p>Un espacio perfecto para disfrutar del aire libre, el Campamento Juvenil Pola de Gordón ofrece estancias llenas de actividades deportivas, talleres y rutas de senderismo. Ideal para jóvenes y grupos organizados, combina diversión y aprendizaje en un entorno montañoso.</p>
                </a>
            </div>

            <div id="card5" class="card">
                <a href="../../controller/instalaciones.php?id=albergue_zamora">
                    <img src="../../assets\img\installation\Zamora_AlbergueSantibáñezDeVidriales\img1.SantibañezZamora.jpg" alt="Foto de Monitor 3">
                    <h3>Albergue santibáñez de vidriales</h3>
                    <h4>(Zamora)</h4>
                    <p>Ubicado en plena naturaleza zamorana, este albergue es perfecto para grupos y actividades al aire libre. Ofrece alojamiento cómodo, zonas recreativas y acceso a rutas de senderismo, brindando una experiencia de convivencia en un entorno rural único.</p>
                </a>
            </div>

            <div id="card6" class="card">
                <a href="../../controller/instalaciones.php?id=colonia_barro">
                    <img src="../../assets\img\installation\Llanes_ColoniaSanJose\img1.ColoniaSanJose.jpg" alt="Foto de Monitor 4">
                    <h3>Colonia San Jose Barro</h3>
                    <h4>(Llanes)</h4>
                    <p>Un lugar ideal para campamentos y actividades juveniles en la costa asturiana. Con acceso directo a la playa y rodeado de naturaleza, la Colonia San José Barro ofrece un ambiente seguro y dinámico para el ocio, la educación y el deporte.</p>
                </a>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 CampTrack. Todos los derechos reservados.</p>
    </footer>
</body>

</html>