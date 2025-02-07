<!DOCTYPE html>
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
        
        <form>
            <h2>Información del Participante</h2>
            <label>Nombre</label>
            <input type="text" placeholder="Nombre" required>
            <label>Apellidos</label>
            <input type="text" placeholder="Apellidos" required>
            <label>DNI</label>
            <input type="text" placeholder="DNI" required>
            <label>Fecha de Nacimiento</label>
            <input type="date" required>
            <label>Edad</label>
            <input type="number" placeholder="Edad" required>
            <label>Género</label>
            <select required>
                <option value="">Seleccione una opción</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
                <option value="otro">Otro</option>
                <option value="prefiero_no_decirlo">Prefiero no decirlo</option>
            </select>
            <label>Alergias</label>
            <input type="text" placeholder="Alergias">
            <label>Enfermedades</label>
            <input type="text" placeholder="Enfermedades">
            <label>Medicinas</label>
            <input type="text" placeholder="Medicinas">
            
            <h2>Dirección</h2>
            <label>Calle</label>
            <input type="text" placeholder="Calle" required>
            <label>Número</label>
            <input type="text" placeholder="Número" required>
            <label>Portal</label>
            <input type="text" placeholder="Portal" required>
            <label>Piso</label>
            <input type="text" placeholder="Piso" required>
            <label>Letra</label>
            <input type="text" placeholder="Letra" required>
            <label>Información Adicional</label>
            <input type="text" placeholder="Información Adicional">
            
            <h2>Información de los Padres</h2>
            <label>Correo Electrónico</label>
            <input type="email" placeholder="Correo Electrónico" required>
            
            <h2>Adjuntar Documentos</h2>
            <label>Foto del DNI</label>
            <input type="file" required>
            <label>Tarjeta Sanitaria</label>
            <input type="file" required>
            <label>Archivos Adicionales (opcional)</label>
            <input type="file" multiple>
            
            <div class="button-group">
                <button type="submit" onclick="location.href='portal_pago.html'">Enviar y proceder al portal de pago</button>
                <button type="submit">Enviar y hacer pago por transferencia</button>
            </div>
        </form>
    </div>
</body>
</html>
