<!DOCTYPE html>
<!--
    =========================================================================================================
    Página: Sobre Nosotros
    Descripción: Muestra la pesentacion de la empresa, quienes somos, y algunas de las actividades que ofrecemos. 
    Autor: Alejandro Roces Fernandez
    Fecha de Creación: 01 de enero de 2025
    Última Modificación: 12.02.2025
    Versión: 1.0
    Dependencias:
        - styles.php            (estilos generales de la aplicacion web)
        - sobreNosotros.css     (estilos específicos para esta página)
        - boostrap              (librerias para estructuracion y funcionalidad)
        
        - headerligth.php   (header ligero para la view con css integrado)
    ========================================================================================================
-->
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sobre Nosotros</title>
    <link rel="icon" type="image/png" href="../../assets/img/logos/logoSF.png">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../assets/css/gen_css/sobreNosotros.css">
    <?php require_once('../../assets/css/styles.php'); ?> <!-- styles-->


</head>

<body>
    <?php require_once('../../templates/headerLigth.php'); ?> <!-- component : headerGen.php -->

    <header class="header2">
        <h1>QUIEN SOMOS NOSOTROS</h1>
    </header>

    <section class="container py-5">
    <div class="row align-items-center">
        <div class="col-lg-6 text-center">
            <img src="../../assets/img/sobreNosotros/equipo.jpg" class="img-fluid rounded shadow" alt="Nuestro Equipo">
        </div>
        <div class="col-lg-6">
            <h2 class="mb-4 text-primary">Sobre Nosotros</h2>
            <p class="text-muted">
                En <strong>CampTrack</strong>, creemos que la clave para ofrecer experiencias inolvidables está en las personas que las hacen posibles. Nuestro equipo está formado por monitores, educadores y profesionales apasionados por el ocio y el tiempo libre, comprometidos con la diversión, la seguridad y el aprendizaje.
            </p>
            <p class="text-muted">
                Cada miembro aporta su experiencia y entusiasmo para crear actividades innovadoras, fomentando valores como el compañerismo, el respeto por la naturaleza y la aventura. Juntos, diseñamos experiencias únicas para niños, jóvenes y familias, asegurándonos de que cada momento sea especial.
            </p>
            <p class="fw-bold text-primary">¡Conócenos y vive la magia del ocio con nosotros! 🎉🏕️</p>
        </div>
    </div>
</section>


    <section class="section">
        <h2>Alguna de las cosas que ofrecemos ...</h2>
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
        <p>&copy; 2025 CampTrack. Todos los derechos reservados.</p>
    </footer>
</body>

</html>