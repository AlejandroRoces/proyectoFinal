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
            <h4 style="color: #252222c9;">CÓDIGO DE RECUPERACIÓN</h4>
                <br>
            </div>
            
            <!-- Formulario para introducir el código -->
            <form action="changePass.php" method="get">
                <div class="grupo-input">
                    <label for="codigo">Código de Recuperación</label>
                    <input type="text" id="codigo" name="codigo" placeholder="Introduce tu código" required>
                </div>
                <button type="submit" class="boton-recuperacion">Validar Código</button>
                <a href="forgotPass.php" class="volver-inicio" style="color: #252222c9;">Volver a Recuperar Contraseña</a>
            </form>
        </div>
    </div>
</body>
</html>
