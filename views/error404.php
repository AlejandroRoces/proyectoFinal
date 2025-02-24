<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Oops!</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #ff6b6b, #ffd93d);
            color: #333;
            overflow: hidden;
        }

        .error-container {
            text-align: center;
            animation: fadeIn 1.5s ease-in-out;
        }

        h1 {
            font-size: 4rem;
            margin: 0;
        }

        h2 {
            font-size: 1.5rem;
            margin: 10px 0;
        }

        p {
            font-size: 1rem;
        }

        .animation {
            font-size: 5rem;
            color: #ff9f1c;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .button-container {
            margin-top: 20px;
        }

        a {
            text-decoration: none;
            background: #ff6b6b;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background 0.3s;
        }

        a:hover {
            background: #ff3b3b;
        }


    </style>
</head>
<body>

    <div class="error-container">
        <h1> Oops!</h1>
        <img style="align-items: center;" src="../assets/img/errorMSG/error.png">
        <h2>Algo salió mal...</h2>
        <p>No podemos cargar la página que estabas buscando. Por favor, inténtalo de nuevo o contacta con soporte si el problema persiste.</p>
        <div class="button-container">
            <a href="../index.php">Volver al Inicio</a>
        </div>
    </div>
</body>
</html>
