<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampTrack - Crear Cuenta</title>
    <link rel="icon" type="image/png" href="../../assets/img/logos/logoSF.png">
    <link rel="stylesheet" href="../../assets/css/logs_css/login.css">
    <script>
    // Verificar contraseñas en tiempo real
    function verificarContrasenas() {
        const contrasena = document.getElementById("contrasena").value;
        const confirmarContrasena = document.getElementById("confirmar_contrasena").value;
        const feedback = document.getElementById("passwordFeedback");

        if (contrasena !== confirmarContrasena && confirmarContrasena !== "") {
            feedback.textContent = "Las contraseñas no coinciden.";
            feedback.style.color = "red"; // Mostrar mensaje en rojo
        } else {
            feedback.textContent = ""; // Ocultar mensaje si coinciden
        }
    }

    // Mostrar alerta al enviar el formulario
    function mostrarConfirmacion(event) {
        event.preventDefault(); // Evitar el envío directo del formulario
        alert("¡Cuenta creada correctamente! Ahora serás redirigido al inicio.");
        document.getElementById("crearCuentaForm").submit(); // Enviar el formulario
    }
    </script>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-icon">
                <img src="../../assets/img/logos/logoSF.png" alt="Logo CampTrack">
                <h4 style="color: #252222c9;">CREAR CUENTA</h4>
            </div>

            <!-- Ajustar acción para enviar a index.php -->
            <form id="crearCuentaForm" method="POST" action="../../model/database/createAcount.php" onsubmit="mostrarConfirmacion(event)">
                <div class="input-group">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" id="correo" name="correo" placeholder="Ejemplo: correo@ejemplo.com" required>
                </div>

                <div class="input-group">
                    <label for="usuario">Nombre de Usuario</label>
                    <input type="text" id="usuario" name="usuario" placeholder="Elige un nombre de usuario" required>
                </div>

                <div class="input-group">
                    <label for="contrasena">Contraseña</label>
                    <input type="password" id="contrasena" name="contrasena" placeholder="Crea una contraseña" oninput="verificarContrasenas()" required>
                </div>

                <div class="input-group">
                    <label for="confirmar_contrasena">Confirmar Contraseña</label>
                    <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" placeholder="Confirma tu contraseña" oninput="verificarContrasenas()" required>
                    <div id="passwordFeedback" class="password-feedback"></div>
                </div>

                <button type="submit" class="login-button">Crear Cuenta</button>
                <a href="../../views/logs/login.php" class="forgot-password">¿Ya tienes una cuenta? Inicia sesión aquí</a>
            </form>
        </div>
    </div>
</body>
</html>
