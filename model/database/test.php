<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selector de Opciones</title>
    <style>
        .switch-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px;
        }
        .switch-wrapper {
            position: relative;
            display: inline-block;
            width: 100px;
            height: 40px;
        }
        .switch-wrapper input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .switch-label {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            border-radius: 20px;
            transition: 0.4s;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 5px;
            font-size: 14px;
            font-weight: bold;
            color: white;
        }
        .switch-label::before {
            content: "";
            position: absolute;
            height: 32px;
            width: 45px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            border-radius: 18px;
            transition: 0.4s;
        }
        input:checked + .switch-label {
            background-color: #007bff;
        }
        input:checked + .switch-label::before {
            transform: translateX(50px);
        }
        .switch-text {
            z-index: 1;
            width: 50%;
            text-align: center;
        }
        .content-section {
            display: none;
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        .visible-section {
            display: block;
        }
    </style>
</head>
<body>

<div class="switch-container">
    <div class="switch-wrapper">
        <input type="checkbox" id="option-selector" onchange="changeSection()">
        <label for="option-selector" class="switch-label">
            <span class="switch-text">Crear</span>
            <span class="switch-text">Modificar</span>
        </label>
    </div>
</div>

<div id="section-create" class="content-section visible-section">
    <h3>Sección de Creación</h3>
    <p>Contenido mostrado cuando la opción "Crear" está activada.</p>
</div>

<div id="section-edit" class="content-section">
    <h3>Sección de Modificación</h3>
    <p>Contenido mostrado cuando la opción "Modificar" está activada.</p>
</div>

<script>
function changeSection() {
    const createSection = document.getElementById("section-create");
    const editSection = document.getElementById("section-edit");
    const selector = document.getElementById("option-selector");

    if (selector.checked) {
        createSection.classList.remove("visible-section");
        editSection.classList.add("visible-section");
    } else {
        createSection.classList.add("visible-section");
        editSection.classList.remove("visible-section");
    }
}
</script>

</body>
</html>
