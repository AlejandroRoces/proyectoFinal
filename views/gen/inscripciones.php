<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción a Actividad</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #007bff, #00c6ff);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            width: 90%;
            max-width: 600px;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        h1, h2 {
            text-align: center;
            color: #0056b3;
        }
        .description {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        input {
            width: 90%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: 0.3s;
        }
        input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }
        button {
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            flex: 1;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
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
            <label>Nombre del Padre</label>
            <input type="text" placeholder="Nombre del Padre" required>
            <label>Apellidos del Padre</label>
            <input type="text" placeholder="Apellidos del Padre" required>
            <label>Teléfono del Padre</label>
            <input type="text" placeholder="Teléfono del Padre" required>
            <label>DNI del Padre</label>
            <input type="text" placeholder="DNI del Padre" required>
            <label>Nombre de la Madre</label>
            <input type="text" placeholder="Nombre de la Madre" required>
            <label>Apellidos de la Madre</label>
            <input type="text" placeholder="Apellidos de la Madre" required>
            <label>Teléfono de la Madre</label>
            <input type="text" placeholder="Teléfono de la Madre" required>
            <label>DNI de la Madre</label>
            <input type="text" placeholder="DNI de la Madre" required>
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