<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cursos campTrack</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f9f9f9;
      color: #333;
      line-height: 1.6;
    }

    header {
      background-color: #4caf50;
      color: white;
      padding: 20px;
      text-align: center;
    }

    .container {
      max-width: 1200px;
      margin: 20px auto;
      padding: 20px;
      background: white;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .slogan {
      text-align: center;
      font-size: 3rem;
      color: #555;
      margin-bottom: 20px;
    }

    .hero-image {
      width: 100%;
      max-height: 600px;
      object-fit: cover;
      border-radius: 10px;
    }

    .file-section {
      margin: 20px 0;
      text-align: center;
    }

    .file-section a {
      color: #4caf50;
      text-decoration: none;
      font-size: 1.2rem;
      font-weight: bold;
    }

    .file-section a:hover {
      text-decoration: underline;
    }

    .description {
      margin: 20px 0;
      font-size: 1.1rem;
    }

    .form-section {
      margin-top: 40px;
    }

    iframe {
      width: 100%;
      height: 600px;
      border: none;
    }
  </style>
</head>
<body>
<?php require_once('../../templates/headerLigth.php'); ?> <!-- component : headerGen.php -->

  <header>
    <h1>Cursos de ocio y tiempo libre</h1>
  </header>

  <div class="container">
    <p class="slogan">Formate con nosotros</p>

    <img src="../../assets/img/cursos/anuncioCursos.jpg" alt="Cartel del curso" class="hero-image">

    <div class="file-section">
      <p>Consulta más información en el archivo oficial:</p>
      <a href="https://drive.google.com/file/d/ejemplo" target="_blank">Ver Documento en Google Drive</a>
    </div>

    <div class="description">
      <p>
        ¡Fórmate con nosotros y lidera el cambio! En CampTrack te ofrecemos cursos especializados para impulsar tu carrera en el ámbito 
        del ocio y tiempo libre: monitor de ocio y tiempo libre, coordinador de ocio y tiempo libre, monitor de necesidades especiales 
        y monitor de nivel. Todos nuestros cursos están homologados y cuentan con validez en toda España.
        Nos adaptamos a tus necesidades con modalidades online y semipresenciales, y siempre contamos con nuevas fechas disponibles para 
        que no pierdas la oportunidad de formarte. Aprende de profesionales, crece como líder y prepárate para marcar la diferencia.
       ¡Inscríbete hoy y da el primer paso hacia un futuro lleno de oportunidades! 🚀
      </p>
    </div>

    <div class="form-section">
      <p>Inscríbete directamente completando el formulario a continuación:</p>
      <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScAzxXMTsKkHNbce3QvhhM8hFl9witm9IsJHCJts-8Kq9Gv9A/viewform?embedded=true" width="640" height="3315" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
    </div>
  </div>
</body>


</html>
