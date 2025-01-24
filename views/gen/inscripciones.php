<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción a Actividad</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        .container {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1, h2 {
            text-align: center;
            color: #444;
        }
        .description {
            text-align: center;
            margin-bottom: 20px;
        }
        img {
            display: block;
            max-width: 100%;
            height: auto;
            margin: 0 auto 20px;
            border-radius: 8px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        input, label {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="file"] {
            padding: 5px;
        }
        input:focus {
            border-color: #007bff;
            outline: none;
        }
        button {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Inscripción a la Actividad: Campamento de Verano</h1>
        <p class="description">Únete a nuestro increíble campamento de verano lleno de actividades, diversión y aprendizaje. Una experiencia inolvidable para niños y jóvenes.</p>
        <img src="https://via.placeholder.com/800x400" alt="Imagen del campamento">
        
        <form>
            <h2>Información del Participante</h2>
            <input type="text" placeholder="Nombre" required>
            <input type="text" placeholder="Apellidos" required>
            <input type="text" placeholder="DNI" required>
            <input type="date" placeholder="Fecha de Nacimiento" required>
            <input type="number" placeholder="Edad" required>
            <input type="text" placeholder="Alergias">
            <input type="text" placeholder="Enfermedades">
            <input type="text" placeholder="Medicinas">
            
            <h2>Dirección</h2>
            <input type="text" placeholder="Calle" required>
            <input type="text" placeholder="Número" required>
            <input type="text" placeholder="Portal" required>
            <input type="text" placeholder="Piso" required>
            <input type="text" placeholder="Letra" required>
            <input type="text" placeholder="Información Adicional">
            
            <h2>Información de los Padres</h2>
            <input type="text" placeholder="Nombre del Padre" required>
            <input type="text" placeholder="Apellidos del Padre" required>
            <input type="text" placeholder="Teléfono del Padre" required>
            <input type="text" placeholder="DNI del Padre" required>
            <input type="text" placeholder="Nombre de la Madre"required>
            <input type="text" placeholder="Apellidos de la Madre" required>
            <input type="text" placeholder="Teléfono de la Madre"required>
            <input type="text" placeholder="DNI de la Madre"required>
            <input type="email" placeholder="Correo Electrónico"required>
            
            <h2>Adjuntar Documentos</h2>
            <label>Foto del DNI</label>
            <input type="file" required>
            <label>Tarjeta Sanitaria</label>
            <input type="file" required>
            <label>Archivos Adicionales (opcional)</label>
            <input type="file" multiple>
            
            <button type="submit">Enviar Inscripción</button>
        </form>
    </div>
</body>
</html>
