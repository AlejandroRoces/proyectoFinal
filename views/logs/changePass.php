<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperacion de contraseña</title>
    <link rel="icon" type="image/png" href="img/logos/logoSF.png">
    <link rel="stylesheet" href="../../assets/css/logs_css/forgotPass.css">
</head>
<body>
    <div class="recuperacion-container">
        <div class="recuperacion-caja">
            <div class="recuperacion-icono">
            <img src="../../assets/img/logos/logoSF.png" alt="Icono de usuario">
            <h4 style="color: #252222c9;">CAMBIAR CONTRASEÑA</h4>
                <br>
            </div>
            
            <!-- Formulario para cambiar contraseña -->
            <form action="/update-password" method="post">
                <div class="grupo-input">
                    <label for="new-password">Nueva Contraseña</label>
                    <input type="password" id="new-password" name="new-password" placeholder="Introduce tu nueva contraseña" required>
                </div>
                <div class="grupo-input">
                    <label for="confirm-password">Confirmar Contraseña</label>
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirma tu nueva contraseña" required>
                </div>
                <button type="submit" class="boton-recuperacion">Actualizar Contraseña</button>
                <a href="login.php" class="volver-inicio" style="color: #252222c9;">Volver al inicio de sesión</a>
            </form>
        </div>
    </div>
</body>
</html>
