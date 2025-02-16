CampTrack

CampTrack es una plataforma de gestión de actividades y seguimiento de inscripciones para campamentos. Permite a los usuarios registrarse en actividades, gestionar pagos y almacenar información relevante de los participantes y sus familias.

Características

Registro e inscripción de participantes en actividades.

Gestión de información personal, médica y de contacto.

Subida y almacenamiento de documentos requeridos.

Diferentes métodos de pago: directo en portal o por transferencia bancaria.

Seguridad en la base de datos mediante transacciones y consultas preparadas.

Panel de administración para la gestión de inscripciones y actividades.

Tecnologías Utilizadas

Backend: PHP con PDO para la conexión a la base de datos.

Frontend: HTML, CSS y JavaScript.

Base de Datos: MySQL alojado en Clever Cloud.

Frameworks y Librerías: Bootstrap para estilos y diseño responsivo.

Estructura del Proyecto

CampTrack/
│── assets/
│   ├── css/
│   ├── img/
│   ├── js/
│── controller/
│── model/
│   ├── database/
│── templates/
│── views/
│── licence.txt
│── index.php
│── README.md

Instalación

Clonar el repositorio:

git clone https://github.com/usuario/CampTrack.git

Configurar la base de datos en model/database/connection.php.

Subir el proyecto a un servidor web compatible con PHP.

Asegurar permisos de escritura en la carpeta uploads/ para almacenar documentos.

Uso

Acceder a la página de inscripción (views/inscripcion.php).

Completar el formulario con los datos del participante.

Subir los documentos requeridos y seleccionar el método de pago.

Confirmar la inscripción y proceder con el pago.

Contribución

Las contribuciones son bienvenidas. Para contribuir:

Hacer un fork del repositorio.

Crear una nueva rama (feature/nueva-funcionalidad).

Realizar los cambios y subirlos al fork.

Crear un Pull Request con una descripción clara de los cambios.

Licencia

Este proyecto está bajo la licencia Creative Commons Atribución-NoComercial 4.0 Internacional (CC BY-NC 4.0).

Autor

Alejandro Roces Fernández

