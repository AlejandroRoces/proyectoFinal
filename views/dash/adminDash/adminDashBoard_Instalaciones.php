<?php
session_start();
?>
<?php
require_once('../../../model/database/connection.php');

$conexion = conectarDB();

// Consulta para obtener los datos de los participantes
$sql = "SELECT * FROM Participantes_inscripciones_camptrack";
$stmt = $conexion->query($sql);
$participantes = $stmt->fetchAll();

// Consulta para obtener los datos de las direcciones
$sql2 = "SELECT * FROM Direcciones_inscripciones_camptrack";
$stmt2 = $conexion->query($sql2);
$direcciones = $stmt2->fetchAll();

// Consulta para obtener los datos de los padres
$sql3 = "SELECT * FROM Padres_inscripciones_camptrack";
$stmt3 = $conexion->query($sql3);
$padres = $stmt3->fetchAll();

// Consulta para obtener los datos de los documentos
$sql4 = "SELECT * FROM Documentos_inscripciones_camptrack";
$stmt4 = $conexion->query($sql4);
$documentos = $stmt4->fetchAll();
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplicación Campus</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    /* Cabecera */
    header {
      background-color: #1a73e8;
      color: white;
      padding: 15px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: fixed; /* Fijar en la parte superior */
      width: 100%;
      top: 0;
      left: 0;
      z-index: 1000;
    }

    .logo-container {
      display: flex;
      align-items: center;
    }

    .logo-container img {
      height: 50px;
      margin-right: 10px;
    }

    .logo-container span {
      font-size: 32px;
      font-weight: bold;
    }

    .user-menu {
      position: relative;
      display: flex;
      align-items: center;
      cursor: pointer;
    }

    .user-menu img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      object-fit: cover;
      margin-left: 10px;
    }

    .user-menu i {
      margin-left: 10px;
      font-size: 18px;
    }

    .dropdown-menu {
      display: none;
      position: absolute;
      right: 0;
      top: 60px;
      background-color: white;
      color: black;
      border-radius: 5px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
      width: 200px;
    }

    .dropdown-menu a, .dropdown-menu button {
      display: block;
      padding: 10px;
      text-decoration: none;
      color: black;
      text-align: left;
      background: none;
      border: none;
      width: 100%;
      font-size: 16px;
      cursor: pointer;
    }

    .dropdown-menu a:hover, .dropdown-menu button:hover {
      background-color: #f0f0f0;
    }

    .dropdown-menu button {
      background-color: #1a73e8;
      color: white;
      font-weight: bold;
      border-radius: 0 0 5px 5px;
    }

    .show-menu {
      display: block;
    }

    /* Menú de navegación */
    nav {
      background-color: #2c3e50;
      color: white;
      width: 200px;
      position: fixed; /* Fijar en el lateral */
      top: 80px; /* Debajo del header */
      left: 0;
      height: calc(100vh - 80px); /* Cubrir toda la pantalla menos el header */
      padding: 20px;
      overflow-y: auto; /* Agregar scroll si es necesario */
    }

    nav ul {
      list-style-type: none;
      padding: 0;
    }

    nav ul li {
      margin: 15px 0;
    }

    nav ul li a {
      color: white;
      text-decoration: none;
      font-size: 18px;
      display: block;
    }

    nav ul li a:hover {
      text-decoration: underline;
    }

    main {
  margin-left: 200px; /* La misma anchura que el nav */
  margin-top: 100px; /* Empuja el main hacia abajo para que no quede debajo del header */

  padding: 20px;
  background-color: #fff;
  min-height: 100vh;
}
.table-container {
  width: 80%; /* Reduce el ancho visible de la tabla */
  max-height: 400px; /* Limita la altura para evitar que sea muy larga */
  overflow-x: auto; /* Barra de desplazamiento horizontal */
  overflow-y: auto; /* Barra de desplazamiento vertical */
  white-space: nowrap; /* Evita que el texto se divida en varias líneas */
  background: white;
  padding: 10px;
  border-radius: 10px;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
  margin: auto; /* Centra la tabla en la pantalla */
}

table {
  border-collapse: collapse;
  width: max-content; /* Se ajusta al contenido */
  min-width: 100%;
}

th, td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: center;
}

th {
  background-color: #1a73e8;
  color: white;
}

/* Estilos para la barra de búsqueda */
#searchInput {
  width: 60%;
  padding: 10px;
  margin: 10px auto;
  display: block;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
}

/* Estilos para resaltar la fila seleccionada */
.highlight {
  background-color: #ffeb3b !important;
}




  </style>
</head>
<body>

  <!-- Cabecera -->
  <header>
    <div class="logo-container">
      <img src="../../../assets/img/logos/logoSF.png" alt="Logo">
      <span>Camptrack</span>
    </div>
    <div class="user-menu" onclick="toggleMenu()">
      <span>BIENVENIDO ALEJANDRO</span>
      <img src="../../../assets/img/log/FOTO CARNET ALEJANDRO.jpg" alt="Foto de perfil">
      <i class="fas fa-chevron-down"></i>
      <div class="dropdown-menu" id="dropdownMenu">
        <a href="#">Perfil</a>
        <a href="#">Configuración</a>
        <a href="#">Ayuda</a>
        <a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
      </div>
    </div>
  </header>

  <!-- Menú de navegación -->
  <nav>
    <ul>
      <li><a href="#"><i class="fas fa-home"></i> Inicio</a></li>
      <li><a href="#"><i class="fas fa-building"></i> Instalaciones</a></li>
      <li><a href="#"><i class="fas fa-users"></i> Trabajadores</a></li>
      <li><a href="#"><i class="fas fa-user-friends"></i> Inscripciones</a></li>
      <li><a href="#"><i class="fas fa-cogs"></i> Actividades</a></li>
    </ul>
  </nav>

  <!-- Contenido principal -->
  /* Contenido principal */
    <main id="contenido">
  

  <h2>Participantes</h2>
  <h2>Participantes</h2>
<div style="display: flex; justify-content: center; gap: 10px;">
  <input type="text" id="searchInput" placeholder="Buscar participante..." onkeyup="filtrarTabla()" />
  <select id="orderSelect" onchange="ordenarTabla()">
    <option value="asc">Edad Ascendente</option>
    <option value="desc">Edad Descendente</option>
  </select>
</div>

<div class="table-container">
  <table>
    <tr>
      <th></th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>DNI</th>
      <th>Fecha de Nacimiento</th>
      <th>Edad</th>
      <th>Alergias</th>
      <th>Enfermedades</th>
      <th>Medicinas</th>
      <th>Calle</th>
      <th>Número</th>
      <th>Portal</th>
      <th>Piso</th>
      <th>Letra</th>
      <th>Información Adicional</th>
      <th>Nombre Padre</th>
      <th>Apellidos Padre</th>
      <th>Teléfono Padre</th>
      <th>DNI Padre</th>
      <th>Nombre Madre</th>
      <th>Apellidos Madre</th>
      <th>Teléfono Madre</th>
      <th>DNI Madre</th>
      <th>Correo Electrónico</th>
      <th>Foto DNI</th>
      <th>Tarjeta Sanitaria</th>
      <th>Archivos Adicionales</th>
    </tr>
    <?php foreach ($participantes as $index => $participante): ?>
    <tr>
    <td>
            <button class="edit-btn" onclick="editarFila(this)">
              <i class="fas fa-pencil-alt"></i>
            </button>
          </td>      <td><?php echo htmlspecialchars($participante['nombre']); ?></td>
      <td><?php echo htmlspecialchars($participante['apellidos']); ?></td>
      <td><?php echo htmlspecialchars($participante['dni']); ?></td>
      <td><?php echo htmlspecialchars($participante['fecha_nacimiento']); ?></td>
      <td><?php echo htmlspecialchars($participante['edad']); ?></td>
      <td><?php echo htmlspecialchars($participante['alergias']); ?></td>
      <td><?php echo htmlspecialchars($participante['enfermedades']); ?></td>
      <td><?php echo htmlspecialchars($participante['medicinas']); ?></td>

      <!-- Datos de dirección -->
      <td><?php echo htmlspecialchars($direcciones[$index]['calle'] ?? ''); ?></td>
      <td><?php echo htmlspecialchars($direcciones[$index]['numero'] ?? ''); ?></td>
      <td><?php echo htmlspecialchars($direcciones[$index]['portal'] ?? ''); ?></td>
      <td><?php echo htmlspecialchars($direcciones[$index]['piso'] ?? ''); ?></td>
      <td><?php echo htmlspecialchars($direcciones[$index]['letra'] ?? ''); ?></td>
      <td><?php echo htmlspecialchars($direcciones[$index]['informacion_adicional'] ?? ''); ?></td>

      <!-- Datos de padres -->
      <td><?php echo htmlspecialchars($padres[$index]['nombre_padre'] ?? ''); ?></td>
      <td><?php echo htmlspecialchars($padres[$index]['apellidos_padre'] ?? ''); ?></td>
      <td><?php echo htmlspecialchars($padres[$index]['telefono_padre'] ?? ''); ?></td>
      <td><?php echo htmlspecialchars($padres[$index]['dni_padre'] ?? ''); ?></td>
      <td><?php echo htmlspecialchars($padres[$index]['nombre_madre'] ?? ''); ?></td>
      <td><?php echo htmlspecialchars($padres[$index]['apellidos_madre'] ?? ''); ?></td>
      <td><?php echo htmlspecialchars($padres[$index]['telefono_madre'] ?? ''); ?></td>
      <td><?php echo htmlspecialchars($padres[$index]['dni_madre'] ?? ''); ?></td>
      <td><?php echo htmlspecialchars($padres[$index]['correo_electronico'] ?? ''); ?></td>

      <!-- Documentos -->
      <td><a href="../../../uploads/<?php echo htmlspecialchars($documentos[$index]['foto_dni'] ?? ''); ?>" target="_blank">Ver Foto</a></td>
      <td><a href="../../../uploads/<?php echo htmlspecialchars($documentos[$index]['tarjeta_sanitaria'] ?? ''); ?>" target="_blank">Ver Tarjeta</a></td>
      <td><a href="../../../uploads/<?php echo htmlspecialchars($documentos[$index]['archivos_adicionales'] ?? ''); ?>" target="_blank">Ver Archivos</a></td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>

</main>


  <script>
    // Función para filtrar la tabla
function filtrarTabla() {
  let input = document.getElementById("searchInput").value.toLowerCase();
  let rows = document.querySelectorAll(".table-container table tbody tr");

  rows.forEach(row => {
    let text = row.innerText.toLowerCase();
    row.style.display = text.includes(input) ? "" : "none";
  });

  ordenarTabla(); // Re-aplicar orden después de filtrar
}

// Función para ordenar la tabla por edad
function ordenarTabla() {
  let table = document.querySelector(".table-container table tbody");
  let rows = Array.from(table.querySelectorAll("tr"));
  let order = document.getElementById("orderSelect").value; // Obtiene el valor del selector

  // Ordenar las filas según la edad (columna 4, ya que es la 5ta columna)
  rows.sort((rowA, rowB) => {
    let edadA = parseInt(rowA.cells[4].innerText.trim()); // Columna de Edad (índice 4)
    let edadB = parseInt(rowB.cells[4].innerText.trim()); // Columna de Edad (índice 4)

    if (isNaN(edadA) || isNaN(edadB)) {
      return 0; // Si la edad no es válida, no hacer nada
    }

    if (order === "asc") {
      return edadA - edadB; // Orden ascendente
    } else {
      return edadB - edadA; // Orden descendente
    }
  });

  // Reaplicar las filas ordenadas
  rows.forEach(row => table.appendChild(row));
}

// Función para resaltar fila seleccionada
document.addEventListener("DOMContentLoaded", () => {
  let filas = document.querySelectorAll(".table-container table tbody tr");

  filas.forEach(fila => {
    fila.addEventListener("click", function () {
      filas.forEach(f => f.classList.remove("highlight"));
      this.classList.add("highlight");
    });
  });
});


  </script>
  

</body>
</html>