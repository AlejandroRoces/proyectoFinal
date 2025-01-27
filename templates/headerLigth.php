<!--
    =========================================================================================================
    Componente: headerLight.php
    Descripción: Este archivo contiene el encabezado global para las paginas, de manera resumida,
                 integrando la bara de navegacion y elementos corporativos de campTrack.
    Autor: Alejandro Roces Fernandez
    Fecha de Creación: 01 de enero de 2025
    Última Modificación: 28 de enero de 2025
    Versión: 1.0
    Dependencias:
        - headerLigth.css   (estilos específicos para la cabecera)
        - nav.css           (estilos específicos para la navegacion)

        - nav.php           (nav para la navegabilidad de CampTrack)

    Proposito:
        - Centraliza el diseño del encabezado y mejora la consistencia en todas las páginas.
        - Facilita el mantenimiento, ya que cualquier cambio se refleja automáticamente en todas las páginas.
        - Reduce la duplicación de código, haciendo el proyecto más limpio y eficiente. 
    ========================================================================================================
-->
<link rel="stylesheet" href="../../assets/css/layout_css/headerLigth.css" />
<link rel="stylesheet" href="assets/css/layout_css/nav.css" />

<header id="camptrack-header" class="main-header">
    <div class="logo">
        <img src="../../assets/img/logos/logoSF.png" alt="Logo CampTrack" onclick="window.location.href='/CampTrack/proyectoFinal/index.php'">
        <h1>CampTrack</h1>
    </div>

    <?php require_once('nav.php'); ?>       <!-- component : nav.php -->

    <div class="buttons">
        <button class="create-account">Crear Cuenta</button>
        <button class="login">Iniciar Sesión</button>
    </div>

</header>
