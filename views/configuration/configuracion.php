<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programa de configuracion</title>
    <link rel="icon" type="image/png" href="img/config.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url("img/backConfig3.jpeg");
            background-repeat: no-repeat;
            background-size: cover

        }
        .color-form {
            background-color: #ffffff96;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.2);
            width: 300px;
            color: #3f3d3d;
        }
        .color-form h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 20px;
        }
        .color-picker {
            margin-bottom: 15px;
        }
        .color-picker label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .color-picker input {
            width: 100%;
            height: 40px;
            border: none;
            cursor: pointer;
        }
        .buttons {
            display: flex;
            justify-content: space-between;
        }
        .buttons button {
            padding: 8px 16px;
            font-size: 14px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            color: #fff;
        }
        .save-btn {
            background-color: #4CAF50;
        }
        .reset-btn {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <div class="color-form">
        <h2>ARCHIVO DE CONFIGURACION </h2>
        <h2>(PALETA DE COLORES)</h2>
        <h3>Selecciona Colores</h3>
        <form id="colorForm">
            <!-- 8 campos para seleccionar colores -->
            <div class="color-picker">
                <label for="color1">Color primario:</label>
                <input type="color" id="color1" name="color1" value="#ffffff">
            </div>
            <div class="color-picker">
                <label for="color2">Color primario (oscuro):</label>
                <input type="color" id="color2" name="color2" value="#ffffff">
            </div>
            <div class="color-picker">
                <label for="color3">Color secondario:</label>
                <input type="color" id="color3" name="color3" value="#ffffff">
            </div>
            <div class="color-picker">
                <label for="color4">Color secondario (oscuro):</label>
                <input type="color" id="color4" name="color4" value="#ffffff">
            </div>
            <div class="color-picker">
                <label for="color5">Color header (fondo):</label>
                <input type="color" id="color5" name="color5" value="#ffffff">
            </div>
            <div class="color-picker">
                <label for="color6">Color navegador:</label>
                <input type="color" id="color6" name="color6" value="#ffffff">
            </div>
            <div class="color-picker">
                <label for="color7">Color footer:</label>
                <input type="color" id="color7" name="color7" value="#ffffff">
            </div>
            <div class="color-picker">
                <label for="color8">Color fondo de seccion:</label>
                <input type="color" id="color8" name="color8" value="#ffffff">
            </div>
            <!-- Botones de guardar y resetear -->
            <div class="buttons">
                <button type="button" class="save-btn" onclick="saveColors()">Guardar</button>
                <button type="reset" class="reset-btn">Resetear</button>
            </div>
        </form>
    </div>

    <script>
        function saveColors() {
            const form = document.getElementById('colorForm');
            const formData = new FormData(form);
            const colors = {};

            // Recopilar los colores del formulario
            formData.forEach((value, key) => {
                colors[key] = value;
            });

            console.log("Colores guardados:", colors);
            alert("Colores guardados correctamente.");
        }
    </script>
</body>
</html>
