<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampTrack - Crear Cuenta</title>
    <link rel="icon" type="image/png" href="img/logos/logoSF.png">
    <link rel="stylesheet" href="../../assets/css/logs_css/login.css">
</head>

<body>
    <div class="signup-container">
        <div class="signup-box">
            <div class="signup-icon">
                <img src="img/logos/logoSF.png" alt="Icono de usuario">
                <h4 style="color: #252222c9;">CREAR CUENTA</h4>
                <br>
            </div>

            <!-- Formulario de creación de cuenta -->
            <form action="/signup" method="post">
                <div class="input-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="verification-code">Código de Verificación</label>
                    <div class="verification-code-container">
                        <input type="text" id="verification-code" name="verification_code" required>
                        <span class="info-icon"
                            title="Este código ha sido enviado a su correo electrónico tras reservar la actividad. Es obligatorio reservr una actividad para poder crear una cuenta.">ℹ️</span>
                    </div>
                </div>
                <div class="input-group">
                    <label for="username">Usuario</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="signup-button">Crear Cuenta</button>
                <a href="login.html" class="already-account" style="color: #252222c9;">¿Ya tienes una cuenta? Inicia
                    sesión</a>
            </form>
        </div>
    </div>
</body>

</html>