<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>aventura</title>
    <link rel="icon" type="image/png" href="../../assets/img/logos/logoSF.png">

    <link rel="stylesheet" href="../../assets/css/gen_css/sobreNosotros.css">
    <?php require_once('../../assets/css/styles.php'); ?> <!-- styles-->

    <style>
        body {
            font-family: Arial, sans-serif;
        }


        .header h2 {
            color: black;
        }

        .header p {
            font-size: 16px;
            color: #333;
        }

        .header p a {
            color: orange;
            font-weight: bold;
            text-decoration: none;
        }

        .header p a:hover {
            text-decoration: underline;
        }

        .features {
            display: flex;
            justify-content: space-around;
            text-align: center;
            margin-top: 20px;
        }

        .feature {
            flex: 1;
            max-width: 250px;
        }

        .feature img {
            width: 50px;
            height: 50px;
        }

        .feature p {
            font-weight: bold;
            margin-top: 10px;
        }

        .divisor {
            text-align: center;
            margin: 40px 0;
            position: relative;
        }

        .divisor span {
            font-size: 24px;
            font-weight: bold;
            color: #2c3e50;
            letter-spacing: 5px;
            position: relative;
            display: inline-block;
        }

        .divisor::before,
        .divisor::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 40%;
            height: 3px;
            background: linear-gradient(to right, transparent, #2c3e50);
        }

        .divisor::before {
            left: 0;
        }

        .divisor::after {
            right: 0;
            background: linear-gradient(to left, transparent, #2c3e50);
        }

        /* Animación sutil */
        .divisor span {
            animation: fadeGlow 2s infinite alternate ease-in-out;
        }

        @keyframes fadeGlow {
            0% {
                opacity: 0.7;
                transform: scale(1);
            }

            100% {
                opacity: 1;
                transform: scale(1.1);
            }
        }






        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
            justify-content: center;
            margin-bottom:  20px;
        }

        .card {
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            max-width: 350px;
            text-align: center;
            transition: transform 0.2s;
            padding-bottom: 30px;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 100%;
            height: 220px;
        }

        .card h3 {
            margin: 16px 0 8px;
        }

        .card p {
            padding: 0 16px 16px;
            font-size: 14px;
            color: #666;
        }

        .container {
    max-width: 600px;
    margin: 40px auto;
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.header form {
    color: #333;
    font-size: 24px;
    margin-bottom: 15px;
}

.form-container {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.formulario {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

input, textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

textarea {
    height: 100px;
    resize: none;
}

.checkbox {
    text-align: left;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.checkbox input {
    width: auto;
}

.checkbox label a {
    color: #007bff;
    text-decoration: none;
}

.checkbox label a:hover {
    text-decoration: underline;
}

.info {
    display: flex;
    justify-content: space-around;
    align-items: center;
    gap: 20px;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px;
}

.info div {
    text-align: center;
}

.info img {
    width: 40px;
    height: 40px;
    margin-bottom: 8px;
}

.info strong {
    display: block;
    margin-bottom: 5px;
}

.info a {
    color: #333;
    text-decoration: none;
    font-weight: bold;
}

.info a:hover {
    color: #007bff;
}

    </style>

</head>

<body>
    <?php require_once('../../templates/headerLigth.php'); ?> <!-- component : headerGen.php -->

    <div class="container">
        <div class="header">
            <h2>Actividades CAMPTRACK</h2>
            <p>
                En <a href="#">CampTrack</a> proponemos un <strong>amplio catálogo</strong> de actividades para niñ@s, con la garantía y seguridad de contar con experiencia, monitor@s titulados, material propio, seguros de RC y accidentes, etc, para que l@s más pequeñ@s de la casa vivan una <strong>Gran Aventura</strong>.
            </p>
        </div>

        <div class="features">
            <div class="feature">
                <img src="https://cdn-icons-png.flaticon.com/512/681/681611.png" alt="Niños">
                <p>A partir de 0 años</p>
            </div>
            <div class="feature">
                <img src="https://cdn-icons-png.flaticon.com/512/2883/2883902.png" alt="Monitor titulado">
                <p>Monitor@s titulados y con experiencia</p>
            </div>
            <div class="feature">
                <img src="https://cdn-icons-png.flaticon.com/512/1260/1260318.png" alt="Adaptabilidad">
                <p>Nos adaptamos a tus necesidades</p>
            </div>
        </div>
    </div>

    <div class="divisor"><span>✦✦✦</span></div>   <!-- Separador de contenidos -->

    <div class="cards">
        <div class="card">
            <img src="../../assets/img/masActividades/animacion.jpg" alt="Animaciones">
            <h3>Animaciones</h3>
            <p>Realizamos animaciones infantiles para todo tipo de eventos de una forma totalmente personalizada y adaptada a tus necesidades. Si necesitas preparar un cumpleaños, una primera comunión, una boda, bautizo, o cualquier otro evento en el que participen niñ@s CampTrack puede ayudarte</p>
            <div>
                <a href="maquetaActividades.php" >+info</a>
            </div>
            <br>
        </div>

        <div class="card">
            <img src="../../assets/img/masActividades/actividadEscolar.jpg" alt="Actividades Escolares">
            <h3>Actividades Escolares</h3>
            <p>Ofrecemos excursiones de un día adaptadas a las necesidades de Colegios u otros Centros Educativos, principalmente relacionados con la Multiaventura o la Educación Ambiental.</p>
            <div>
                <a href="#" class="btn btn-sm btn-outline-secondary">+info</a>
            </div>
        </div>
        <div class="card">
            <img src="../../assets/img/masActividades/SemanaBlanca.jpg" alt="Semanas Blancas">
            <h3>Semanas Blancas</h3>
            <p>Ofrecemos excursiones de un día adaptadas a las necesidades de Colegios u otros Centros Educativos, principalmente relacionados con la Multiaventura o la Educación Ambiental.</p>
            <div>
                <a href="#" class="btn btn-sm btn-outline-secondary">+info</a>
            </div>
        </div>
        <div class="card">
            <img src="../../assets/img/masActividades/talleres.jpg" alt="Talleres">
            <h3>Talleres</h3>
            <p>Ofrecemos excursiones de un día adaptadas a las necesidades de Colegios u otros Centros Educativos, principalmente relacionados con la Multiaventura o la Educación Ambiental.</p>
            <div>
                <a href="#" class="btn btn-sm btn-outline-secondary">+info</a>
            </div>
        </div>
        <div class="card">
            <img src="../../assets/img/masActividades/ludoteca.jpg" alt="Ludotecas">
            <h3>Ludotecas</h3>
            <p>Ofrecemos excursiones de un día adaptadas a las necesidades de Colegios u otros Centros Educativos, principalmente relacionados con la Multiaventura o la Educación Ambiental.</p>
            <div>
                <a href="#" class="btn btn-sm btn-outline-secondary">+info</a>
            </div>
        </div>
        <div class="card">
            <img src="../../assets/img/masActividades/familias.jpg" alt="Actividades familiares">
            <h3>Actividades familiares</h3>
            <p>Ofrecemos excursiones de un día adaptadas a las necesidades de Colegios u otros Centros Educativos, principalmente relacionados con la Multiaventura o la Educación Ambiental.</p>
            <div>
                <a href="#" class="btn btn-sm btn-outline-secondary">+info</a>
            </div>
        </div>
    </div>

        

    
    <div class="divisor"><span>✦✦✦</span></div>  <!-- Separador de contenidos -->

    <div class="container">
        <div class="header form">
            <h2>NECESITAS MÁS INFORMACIÓN</h2>
        </div>

        <div class="form-container">
            <div class="formulario">
                <input type="text" placeholder="Nombre">
                <input type="email" placeholder="Dirección de correo electrónico">
                <textarea placeholder="Mensaje"></textarea>

                <div class="checkbox">
                    <input type="checkbox" id="privacidad">
                    <label for="privacidad">He leído y acepto las <a href="#">políticas de privacidad</a></label>
                </div>
            </div>

            <div class="info">
                <div>
                    <img src="https://cdn-icons-png.flaticon.com/512/724/724664.png" alt="Teléfono">
                    <strong>Teléfono</strong><br>
                    <a href="tel:618486475">618 48 64 75</a> Roces <br>
                
                </div>
                <div>
                    <img src="https://cdn-icons-png.flaticon.com/512/732/732200.png" alt="Email">
                    <strong>Mail</strong><br>
                    <a href="mailto:info.camptrack@gmail.com">info.camptrack@gmail.com</a>
                </div>
            </div>
        </div>
    </div>



        <footer>
            <p>&copy; 2025 CampTrack. Todos los derechos reservados.</p>
        </footer>
</body>

</html>