<!--
    =========================================================================================================
    Componente: nav.php
    Descripción: Este archivo contiene el nav global para la navegabilidad entre las paginas de la aplicacion, 
                 y para ser utilizado en las paginas que lo requieran.
    Autor: Alejandro Roces Fernandez
    Fecha de Creación: 01 de enero de 2025
    Última Modificación: 28 de enero de 2025
    Versión: 1.0
    Dependencias:
        - nav.css           (estilos específicos para la navegacion)

    Proposito:
        - Proporciona una navegación coherente en todas las páginas del sitio.
        - Facilita el mantenimiento, ya que los cambios en los enlaces o la estructura se reflejan automáticamente en todas las páginas.
        - Reduce la duplicación de código, manteniendo el proyecto organizado y eficiente.
    ========================================================================================================
-->
<link rel="stylesheet" href="assets/css/layout_css/nav.css" />

<nav id="main-nav">

    <a href="/CampTrack/proyectoFinal/index.php">INICIO</a>
    <a href="/CampTrack/proyectoFinal/views/gen/campamentos.php">CAMPAMENTOS</a>
    <a href="/CampTrack/proyectoFinal/views/gen/sobreNosotros.php">SOBRE NOSOTROS</a>
    <div class="dropdown">
        <a href="/CampTrack/proyectoFinal/views/gen/cursos.php">CURSOS</a>
        <div class="dropdown-content">
            <a href="#">Curso monitor TL </a>
            <a href="#">Curso coordinador</a>
            <a href="#">Curso monitor NEE</a>
        </div>
    </div>
    <a href="/CampTrack/proyectoFinal/views/gen/instalaciones.php">INSTALACIONES</a>
    <a href="#" class="disabled">OTRAS ACTIVIDADES</a>

</nav>
