# Guía de Instalación de Camptrack

Bienvenido a la guía de instalación de **Camptrack**, una aplicación web diseñada para generar soluciones personalizadas basadas en su estructura base.

## Requisitos Previos

Antes de comenzar, asegúrate de tener instalados los siguientes componentes en tu sistema:

- **Sistema Operativo:** Windows, macOS o Linux.
- **Servidor Web:** Apache o Nginx con soporte para PHP.
- **PHP:** Versión 7.4 o superior.
- **Base de Datos:** MySQL o MariaDB.
- **Gestor de Paquetes:** Composer para la gestión de dependencias PHP.
- **Node.js y npm:** Para la gestión de dependencias JavaScript y tareas de construcción.

## Guía de Instalación

Sigue estos pasos para instalar y configurar Camptrack:

1. **Preparación del Entorno:**
   - Verifica que PHP, Composer, Node.js y npm estén instalados ejecutando `php -v`, `composer -v` y `node -v` en tu terminal.
   - Asegúrate de que tu servidor web esté configurado correctamente para servir aplicaciones PHP.

2. **Clonación del Repositorio:**
   - Navega al directorio raíz de tu servidor web.
   - Clona el repositorio de Camptrack:
     ```bash
     git clone https://github.com/tu_usuario/camptrack.git
     ```
   - Accede al directorio del proyecto:
     ```bash
     cd camptrack
     ```

3. **Instalación de Dependencias:**
   - **Dependencias PHP:**
     - Instala las dependencias utilizando Composer:
       ```bash
       composer install
       ```
   - **Dependencias JavaScript:**
     - Instala las dependencias con npm:
       ```bash
       npm install
       ```

4. **Configuración de la Base de Datos:**
   - Crea una base de datos en tu servidor MySQL o MariaDB.
   - Renombra el archivo `.env.example` a `.env` y edítalo para configurar los parámetros de conexión a la base de datos:
     ```
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=nombre_base_datos
     DB_USERNAME=usuario
     DB_PASSWORD=contraseña
     ```
   - Ejecuta las migraciones para crear las tablas necesarias:
     ```bash
     php artisan migrate
     ```

5. **Configuración Adicional:**
   - **Variables de Entorno:**
     - Define otras variables necesarias en el archivo `.env`, como las relacionadas con servicios externos o configuraciones específicas de la aplicación.
   - **Compilación de Activos:**
     - Compila los activos front-end:
       ```bash
       npm run dev
       ```
   - **Configuración del Servidor Web:**
     - Asegúrate de que tu servidor web esté configurado para apuntar al directorio `public` del proyecto como raíz del documento.

## Verificación

Para confirmar que la instalación fue exitosa:

- Accede a `http://localhost` en tu navegador. Deberías ver la página de inicio de Camptrack.
- Inicia sesión con las credenciales predeterminadas o las que hayas configurado durante la instalación.
- Verifica que las funcionalidades principales, como la gestión de actividades y la personalización del widget, estén operativas.

## Solución de Problemas Comunes

- **Error de Conexión a la Base de Datos:**
  - Verifica que las credenciales en el archivo `.env` sean correctas.
  - Asegúrate de que el servicio de base de datos esté en funcionamiento.
- **Problemas con la Compilación de Activos:**
  - Revisa los mensajes de error durante la ejecución de `npm run dev`.
  - Asegúrate de que todas las dependencias de Node.js estén instaladas correctamente.

## Actualizaciones y Mantenimiento

Para mantener tu instalación de Camptrack actualizada:

- **Actualización de Dependencias:**
  - **PHP:**
    ```bash
    composer update
    ```
  - **JavaScript:**
    ```bash
    npm update
    ```
- **Respaldo de la Base de Datos:**
  - Realiza copias de seguridad periódicas de tu base de datos utilizando herramientas como `mysqldump`.
- **Logs y Monitoreo:**
  - Revisa los logs de la aplicación y del servidor web para identificar y solucionar posibles problemas.

## Recursos Adicionales

- **Documentación Oficial de Camptrack:**
  - Accede a la guía completa de usuario y desarrollador en [https://docs.camptrack.com](https://docs.camptrack.com).
- **Soporte y Comunidad:**
  - Únete a nuestro foro en [https://foro.camptrack.com](https://foro.camptrack.com) para compartir experiencias y obtener ayuda de otros usuarios.
- **Contribuciones:**
  - Si deseas contribuir al desarrollo de Camptrack, consulta las [guías de contribución](https://docs.camptrack.com/contribucion) para comenzar.

Una instalación y configuración adecuadas garantizarán el óptimo funcionamiento de Camptrack, permitiéndote aprovechar al máximo sus características para promover y gestionar tus actividades de manera eficiente.
