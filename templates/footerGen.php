<!--
=========================================================================================================
Componente: footer.php
Descripción: Este archivo contiene el pie de página global para la aplicación, que incluye información de contacto, 
             enlaces a redes sociales, detalles de los campamentos, y otros enlaces informativos.
Autor: Alejandro Roces Fernandez
Fecha de Creación: 01 de enero de 2025
Última Modificación: 28 de enero de 2025
Versión: 1.0
Dependencias:
    - footer.css        (estilos adicionales, si aplican)
    - FontAwesome       (para los iconos sociales, si se utiliza)

Propósito:
    - Proporciona una sección de pie de página consistente con información útil y enlaces para facilitar el contacto y 
      acceso a la información relevante del sitio.
    - Facilita la navegación hacia secciones adicionales como las tarifas, inscripciones y testimonios.
    - Ofrece un acceso rápido a las redes sociales y opciones de contacto directo.
    - Mejora la accesibilidad del sitio al proporcionar información relevante al final de cada página.
=========================================================================================================
-->
<footer style="background-color: #10102a; color: #e0e0e0; padding: 40px 20px; font-family: 'Roboto', sans-serif; font-size: 16px;">
    <div style="display: flex; justify-content: space-between; flex-wrap: wrap; max-width: 1200px; margin: auto; text-align: left; gap: 50px;"> <!-- Aumenté el gap aquí -->
      
        <!-- Logo y descripción -->
        <div style="flex: 1; min-width: 300px; text-align: left;">
            <div style="display: flex; align-items: center; margin-bottom: 30px;"> <!-- Más margen abajo -->
                <img style="width: 80px; height: 80px; margin-right: 15px;" src="assets/img/logos/logoSF.png" alt="Logo CampTrack">
                <h2 style="color: #ffd700; font-size: 28px; margin: 0;">CampTrack</h2>
            </div>
            <p style="margin: 0 0 20px; line-height: 1.6;">
                En CampTrack, creamos experiencias inolvidables a través de campamentos de verano diseñados para inspirar y conectar.
            </p>
            <div style="margin-top: 15px;">
                <a href="#" style="margin-right: 15px;"><img style="width: 30px;" src="assets/img/icons/faceboook.png" alt="Facebook"></a>
                <a href="https://www.instagram.com/camptrack.app?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" style="margin-right: 15px;"><img style="width: 30px;" src="assets/img/icons/instagram.png" alt="Instagram"></a>
                <a href="https://www.tiktok.com/@camptrack?is_from_webapp=1&sender_device=pc"><img style="width: 30px;" src="assets/img/icons/tiktok.png" alt="TikTok"></a>
            </div>
        </div>

        <!-- Información adicional -->
        <div style="flex: 1; min-width: 200px;">
            <h3 style="color: #ffd700; font-size: 24px; margin-bottom: 25px;">Información</h3> <!-- Más separación con título -->
            <ul style="list-style: none; padding: 0; margin: 0; line-height: 1.8;">
                <li><a href="#" style="color: #e0e0e0; text-decoration: none;">Fechas y ubicación</a></li>
                <li><a href="#" style="color: #e0e0e0; text-decoration: none;">Tarifas</a></li>
                <li><a href="#" style="color: #e0e0e0; text-decoration: none;">Inscripciones</a></li>
                <li><a href="#" style="color: #e0e0e0; text-decoration: none;">Testimonios</a></li>
            </ul>
        </div>

        <!-- Campamentos -->
        <div style="flex: 1; min-width: 200px;">
            <h3 style="color: #ffd700; font-size: 24px; margin-bottom: 25px;">Campamentos</h3>
            <ul style="list-style: none; padding: 0; margin: 0; line-height: 1.8;">
                <li><a href="#" style="color: #e0e0e0; text-decoration: none;">1ª quincena de julio</a></li>
                <li><a href="#" style="color: #e0e0e0; text-decoration: none;">2ª quincena de julio</a></li>
                <li><a href="#" style="color: #e0e0e0; text-decoration: none;">1ª quincena de agosto</a></li>
                <li><a href="#" style="color: #e0e0e0; text-decoration: none;">2ª quincena de agosto</a></li>
            </ul>
        </div>

        <!-- Contacto -->
        <div style="flex: 1; min-width: 300px; text-align: left; position: relative;">
            <h3 style="color: #ffd700; font-size: 24px; margin-bottom: 25px;">Contáctanos</h3>
            <p style="line-height: 1.6;">
                <strong>Dirección:</strong> León, Castilla y León<br>
                <strong>Teléfono:</strong> (+34) 618 48 64 75<br>
                <strong>Teléfono:</strong> (+34) 985 24 06 64<br>
                <strong>Email:</strong> <a href="mailto:camptrack.app@gmail.com" style="color: #ffd700; text-decoration: none;">camptrack.app@gmail.com</a>
            </p>
            <div class="map-container" style="display: none; position: absolute; top: 80px; left: 0; z-index: 10; background: #fff; border: 1px solid #ccc; border-radius: 8px; overflow: hidden;">
                <img style="width: 300px; height: auto;" src="assets/img/mapa.png" alt="Mapa">
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div style="text-align: center; margin-top: 50px; border-top: 1px solid #333; padding-top: 15px; font-size: 14px; color: #999;">
        <p style="margin: 0;">&copy; 2025 CampTrack. Todos los derechos reservados.</p>
    </div>
</footer>
