<!--
los valores de prueba dentro de la base de datos
('admin', 'admin123', 'admin@camptrack.com', 'admin'),
('user1', 'password1', 'user1@camptrack.com', 'usuario'),
('user2', 'password2', 'user2@camptrack.com', 'usuario'),
('monitor', 'monitor123', 'monitorr@camptrack.com', 'monitor');
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampTrack Login</title>
    <link rel="icon" type="image/png" href="img/logos/logoSF.png">
    <link rel="stylesheet" href="../../assets/css/logs_css/login.css">
    <script>
        function login() {
            const form = document.getElementById("usersLogin");
            form.action = "../../model/database/userGestor.php";
            form.submit();
        }
    </script>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-icon">
                <img src="../../assets/img/logos/logoSF.png" alt="Logo CampTrack">
                <h4 style="color: #252222c9;">INICIO DE SESIÓN</h4>
                <br>
            </div>
            
            <form method="post" name="usersLogin" id="usersLogin">
                <div class="input-group">
                    <label for="username">Usuario</label>
                    <input type="text" id="username" name="username" value="" required>
                </div>
                <div class="input-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" value="" required>
                </div>

                <button type="submit" class="login-button" onclick="login()">Acceder</button>
                <a href="forgotPass.php" class="forgot-password" style="color: #252222c9;">He olvidado mi contraseña</a>
                <br>
                <a href="singUp.php" class="register-link" style="color: #252222c9;">¿No tienes cuenta? Regístrate aquí</a>
            </form>
        </div>
    </div>
</body>
</html>
