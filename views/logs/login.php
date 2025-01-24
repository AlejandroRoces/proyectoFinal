<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampTrack Login</title>
    <link rel="icon" type="image/png" href="img/logos/logoSF.png">
    <link rel="stylesheet" href="../../assets/css/logs_css/login.css">

</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-icon">
                <img src="../../assets/img/logos/logoSF.png" alt="Icono de usuario">
                <h4 style="color: #252222c9;">INICIO DE SESION</h4>
                <br>
            </div>
            
            <!-- Formulario de login -->
            <form action="/login" method="get">
                <div class="input-group">
                    <label for="username">Usuario</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="login-button">Acceder</button>
                <a href="forgotPass.php" class="forgot-password" style="color: #252222c9;"">He olvidado mi contraseña</a>
            </form>
        </div>
    </div>
</body>
</html>
