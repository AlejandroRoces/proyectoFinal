<!DOCTYPE html>
<!--
    =========================================================================================================
    Página: Actividades
    Descripción: Muestra las diferentes opciones que oferta la aplicacion para los usuarios que la visiten. 
    Autor: Alejandro Roces Fernandez
    Fecha de Creación: 01 de enero de 2025
    Última Modificación: 16.02.2025
    Versión: 1.0
    Dependencias:
        - styles.php        (estilos generales de la aplicacion web)
        - actividades.css   (estilos específicos para esta página)
        - boostrap          (librerias para estructuracion y funcionalidad)
        
        - headerligth.php   (header ligero para la view con css integrado)
        - footerGen.php     (footer ligero para la view con css integrado)
    ========================================================================================================
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades</title>
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
            <?php
            // Incluir el archivo de actividades.php que trae los datos de la base de datos
            require_once('../../model/database/activities.php');

            // Mostrar cada actividad dentro de una card
            foreach ($actividades as $actividad): ?>
                <div class="card">
                    <img src="<?php echo htmlspecialchars($actividad['imagen']); ?>" alt="<?php echo htmlspecialchars($actividad['nombre']); ?>">
                    <h3><?php echo htmlspecialchars($actividad['nombre']); ?></h3>
                    <p><?php echo htmlspecialchars($actividad['descripcion']); ?></p>
                    <div>
                        <a href="maquetaActividades.php" class="btn btn-sm btn-outline-secondary">+info</a>
                        <a href="inscripciones.php?id_actividad=<?php echo $actividad['id']; ?>" class="btn btn-sm btn-outline-secondary">Apuntarse</a>
                        </div>
                    <br>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<footer>
    <p>&copy; 2025 CampTrack. Todos los derechos reservados.</p>
</footer>

</body>
</html>
