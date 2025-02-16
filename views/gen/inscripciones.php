<!DOCTYPE html>
<!--
    ========================================================================================================
    Página: Inscripción a Actividad
    Descripción: Esta página permite a los usuarios registrarse en una actividad proporcionando sus datos
                 personales, información médica y documentos requeridos.
    Autor: Alejandro Roces Fernandez
    Fecha de Creación: 01 de enero de 2025
    Última Modificación: 16.02.2025
    Versión: 1.0

    Dependencias:
        - ../../assets/css/gen_css/inscripciones.css  (Estilos específicos de la página de inscripción)
        - ../../assets/css/styles.php                 (Estilos generales compartidos)
        - Bootstrap (Para diseño responsivo y componentes UI)

    Funcionalidad:
    - Presenta un formulario donde el usuario debe completar sus datos personales, dirección, información médica,
      contacto de los padres y documentos requeridos.
    - Envía la información a "guardarInscripcion.php" en la carpeta "database" para su almacenamiento en la base de datos.
    - Permite la selección de dos métodos de pago: directo en portal o mediante transferencia bancaria.
    - Incluye validaciones básicas en el formulario para garantizar que los datos sean correctos.

    Licencia:
    Este código está licenciado bajo Creative Commons Atribución-NoComercial 4.0 Internacional (CC BY-NC 4.0).
    No se permite su uso comercial sin autorización previa del autor.
    Más información en: https://creativecommons.org/licenses/by-nc/4.0/

    Copyright (c) 2025 Alejandro Roces Fernandez
    ========================================================================================================
-->

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción a Actividad</title>
    <link rel="icon" type="image/png" href="../../assets/img/logos/logoSF.png">

    <link rel="stylesheet" href="../../assets/css/gen_css/inscripciones.css">
    <?php require_once('../../assets/css/styles.php'); ?> <!-- styles-->

</head>

<body>

    <div class="container">
        <h1>Inscripción a la Actividad</h1>
        <p class="description">Regístrate para participar en nuestra actividad llena de diversión y aprendizaje.</p>

        <form action="../../model/database/guardarInscripcion.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_actividad" value="<?php echo isset($_GET['id_actividad']) ? $_GET['id_actividad'] : ''; ?>">

            <h2>Información del Participante</h2>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>

            <label for="apellidos">Apellidos</label>
            <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos" required>

            <label for="dni">DNI</label>
            <input type="text" id="dni" name="dni" placeholder="DNI" required pattern="[0-9]{8}[A-Za-z]">

            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>

            <label for="edad">Edad</label>
            <input type="number" id="edad" name="edad" placeholder="Edad" required min="1">

            <label for="genero">Género</label>
            <select id="genero" name="genero" required>
                <option value="">Seleccione una opción</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
                <option value="otro">Otro</option>
                <option value="prefiero_no_decirlo">Prefiero no decirlo</option>
            </select>

            <label for="alergias">Alergias</label>
            <input type="text" id="alergias" name="alergias" placeholder="Alergias">

            <label for="enfermedades">Enfermedades</label>
            <input type="text" id="enfermedades" name="enfermedades" placeholder="Enfermedades">

            <label for="medicinas">Medicinas</label>
            <input type="text" id="medicinas" name="medicinas" placeholder="Medicinas">

            <h2>Dirección</h2>
            <label for="calle">Calle</label>
            <input type="text" id="calle" name="calle" placeholder="Calle" required>

            <label for="numero">Número</label>
            <input type="text" id="numero" name="numero" placeholder="Número" required>

            <label for="portal">Portal</label>
            <input type="text" id="portal" name="portal" placeholder="Portal">

            <label for="piso">Piso</label>
            <input type="text" id="piso" name="piso" placeholder="Piso">

            <label for="letra">Letra</label>
            <input type="text" id="letra" name="letra" placeholder="Letra">

            <label for="info_adicional">Información Adicional</label>
            <input type="text" id="info_adicional" name="info_adicional" placeholder="Información Adicional">

            <h2>Información de los Padres</h2>

            <label for="nombre_padre">Nombre del Padre</label>
            <input type="text" id="nombre_padre" name="nombre_padre" placeholder="Nombre del Padre" required>

            <label for="apellidos_padre">Apellidos del Padre</label>
            <input type="text" id="apellidos_padre" name="apellidos_padre" placeholder="Apellidos del Padre" required>

            <label for="telefono_padre">Teléfono del Padre</label>
            <input type="tel" id="telefono_padre" name="telefono_padre" placeholder="Teléfono del Padre" required>

            <label for="dni_padre">DNI del Padre</label>
            <input type="text" id="dni_padre" name="dni_padre" placeholder="DNI del Padre" required pattern="[0-9]{8}[A-Za-z]">

            <label for="nombre_madre">Nombre de la Madre</label>
            <input type="text" id="nombre_madre" name="nombre_madre" placeholder="Nombre de la Madre" required>

            <label for="apellidos_madre">Apellidos de la Madre</label>
            <input type="text" id="apellidos_madre" name="apellidos_madre" placeholder="Apellidos de la Madre" required>

            <label for="telefono_madre">Teléfono de la Madre</label>
            <input type="tel" id="telefono_madre" name="telefono_madre" placeholder="Teléfono de la Madre" required>

            <label for="dni_madre">DNI de la Madre</label>
            <input type="text" id="dni_madre" name="dni_madre" placeholder="DNI de la Madre" required pattern="[0-9]{8}[A-Za-z]">

            <label for="email">Correo Electrónico de Contacto</label>
            <input type="email" id="email" name="email" placeholder="Correo Electrónico" required>


            <h2>Adjuntar Documentos</h2>
            <label for="dni_foto">Foto del DNI</label>
            <input type="file" id="dni_foto" name="dni_foto" required>

            <label for="tarjeta_sanitaria">Tarjeta Sanitaria</label>
            <input type="file" id="tarjeta_sanitaria" name="tarjeta_sanitaria" required>

            <label for="archivos_adicionales">Archivos Adicionales (opcional)</label>
            <input type="file" id="archivos_adicionales" name="archivos_adicionales" multiple>

            <div class="button-group">
                <button type="submit" name="submit_type" value="pago_directo">Enviar y proceder al portal de pago</button>
                <button type="submit" name="submit_type" value="pago_transferencia">Enviar y hacer pago por transferencia</button>
            </div>
        </form>

    </div>
</body>

</html>