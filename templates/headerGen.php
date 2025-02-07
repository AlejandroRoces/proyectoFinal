<!--
    =========================================================================================================
    Componente: headerGen.php
    Descripción: Este archivo contiene el encabezado exclusivo que se muestra en el index, incluyendo 
                 el logo, título, eslogan y otros elementos de la cabecera.
    Autor: Alejandro Roces Fernandez
    Fecha de Creación: 01 de enero de 2025
    Última Modificación: 28 de enero de 2025
    Versión: 1.0
    Dependencias:
        - headerGen.css (estilos específicos para la cabecera)
    ========================================================================================================
-->
<link rel="stylesheet" href="assets/css/layout_css/headerGen.css" />

<header id="main-header">
    <div id="header-buttons">
        <a href="views/logs/login.php">
            <button class="button login">Iniciar Sesión</button>
        </a>
    </div>
    <div id="header-div">
        <img alt="logo de empresa CampTrack" src="assets/img/logos/logoSF.png" width="100px" height="100px" />
        <h1>CAMPTRACK</h1>
        <p>Gestiona fácil, disfruta más</p>
    </div>  
</header>
