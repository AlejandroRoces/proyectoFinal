<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrastrar a Litera</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        tr {
            cursor: grab;
            background-color: #fff;
            transition: background-color 0.2s ease-in-out;
        }

        tr:hover {
            background-color: #f0f0f0;
        }

        .contenedor {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        /* Caja que representa la litera */
        .litera {
            width: 200px;
            height: 300px;
            border: 2px solid #555;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #eee;
        }

        /* Camas dentro de la litera */
        .cama {
            width: 180px;
            height: 100px;
            border: 2px dashed #888;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #555;
            transition: background-color 0.3s ease-in-out;
        }

        .cama-hover {
            background-color: #d1f7d1;
            border-color: #4CAF50;
        }

        /* Círculo flotante con el nombre */
        .drag-circle {
            position: absolute;
            width: 100px;
            height: 100px;
            background-color: rgba(0, 123, 255, 0.8);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            font-weight: bold;
            border-radius: 50%;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            pointer-events: none;
            transform: translate(-50%, -50%);
            z-index: 1000;
            display: none;
        }

        .fila-soltar {
            animation: caer 0.3s ease-in-out;
        }

        @keyframes caer {
            from {
                transform: translateY(-10px);
                opacity: 0.5;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <h1>Arrastrar personas a una litera</h1>

    <!-- Tabla -->
    <table id="tabla">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr draggable="true">
                <td>1</td>
                <td>Juan</td>
                <td>juan@mail.com</td>
            </tr>
            <tr draggable="true">
                <td>2</td>
                <td>Ana</td>
                <td>ana@mail.com</td>
            </tr>
            <tr draggable="true">
                <td>3</td>
                <td>Pedro</td>
                <td>pedro@mail.com</td>
            </tr>
            <tr draggable="true">
                <td>4</td>
                <td>Lucía</td>
                <td>lucia@mail.com</td>
            </tr>
            <tr draggable="true">
                <td>5</td>
                <td>Mario</td>
                <td>mario@mail.com</td>
            </tr>
        </tbody>
    </table>

    <!-- Contenedor de literas -->
    <div class="contenedor">
        <div class="litera">
            <div class="cama" id="cama1">Cama Superior</div>
            <div class="cama" id="cama2">Cama Inferior</div>
        </div>
        <div class="litera">
            <div class="cama" id="cama3">Cama Superior</div>
            <div class="cama" id="cama4">Cama Inferior</div>
        </div>
        <div class="litera">
            <div class="cama" id="cama5">Cama Superior</div>
            <div class="cama" id="cama6">Cama Inferior</div>
        </div>
    </div>

    <!-- Círculo flotante para el nombre -->
    <div id="dragCircle" class="drag-circle"></div>

    <script>
        const filas = document.querySelectorAll("tr[draggable='true']");
        const camas = document.querySelectorAll(".cama");
        const tabla = document.querySelector("tbody");
        const dragCircle = document.getElementById("dragCircle");
        let draggingRow = null;

        // Evento de inicio de arrastre
        filas.forEach(fila => {
            fila.addEventListener("dragstart", (e) => {
                draggingRow = fila;
                const nombre = fila.children[1].textContent;
                e.dataTransfer.setData("text", nombre);

                // Mostrar círculo con el nombre
                dragCircle.textContent = nombre;
                dragCircle.style.display = "flex";
                fila.style.opacity = "0"; // Ocultar la fila original
            });

            fila.addEventListener("dragend", () => {
                fila.style.opacity = "1";
                dragCircle.style.display = "none";
            });
        });

        // Seguir el cursor con el círculo flotante
        document.addEventListener("dragover", (e) => {
            dragCircle.style.left = `${e.pageX}px`;
            dragCircle.style.top = `${e.pageY}px`;
        });

        // Permitir soltar en las camas
        camas.forEach(cama => {
            cama.addEventListener("dragover", (e) => {
                e.preventDefault();
                cama.classList.add("cama-hover");
            });

            cama.addEventListener("dragleave", () => {
                cama.classList.remove("cama-hover");
            });

            cama.addEventListener("drop", (e) => {
                e.preventDefault();
                cama.classList.remove("cama-hover");

                if (draggingRow) {
                    draggingRow.style.opacity = "1";
                    draggingRow.classList.add("fila-soltar");
                    cama.textContent = draggingRow.children[1].textContent; // Mostrar el nombre en la cama
                    cama.style.backgroundColor = "#b3e5fc"; // Cambiar color de la cama
                }

                dragCircle.style.display = "none";
            });
        });

        // Si el usuario suelta fuera de una cama, vuelve a la tabla
        document.addEventListener("drop", (e) => {
            if (!e.target.classList.contains("cama") && draggingRow) {
                draggingRow.style.opacity = "1";
                tabla.appendChild(draggingRow);
            }
            dragCircle.style.display = "none";
        });
    </script>
</body>

</html>
