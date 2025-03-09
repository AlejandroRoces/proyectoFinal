<?php
include_once 'connection.php'; // Incluir el archivo de conexión PDO

// Establecer la conexión a la base de datos usando la función conectarDB() de connection.php
$conexion = conectarDB();

// Obtener el valor de búsqueda desde el parámetro GET
$buscar = isset($_GET['buscar']) ? $_GET['buscar'] : '';

// Definir la consulta SQL con un filtro de búsqueda
$query = "SELECT t.idTrabajador, t.nombre, t.apellido1, t.foto, c.cargo 
          FROM trabajadores_camptrack t
          JOIN cargo_camptrack c ON t.idCargo = c.idCargo";

// Si hay un término de búsqueda, agregar el filtro `LIKE`
if ($buscar) {
    $query .= " WHERE t.nombre LIKE :buscar OR t.apellido1 LIKE :buscar OR c.cargo LIKE :buscar";
}

try {
    // Ejecutar la consulta usando PDO
    $stmt = $conexion->prepare($query);

    // Si hay un término de búsqueda, se vincula el parámetro `:buscar`
    if ($buscar) {
        $stmt->bindValue(':buscar', '%' . $buscar . '%');
    }

    // Ejecutar la consulta
    $stmt->execute();

    // Verificar si se obtuvieron resultados
    if ($stmt->rowCount() > 0) {
        ?>
        <div class="container mt-4">
            <!-- Barra de búsqueda -->
            <form method="GET" action="">
                <div class="input-group mb-4">
                    <input type="text" class="form-control" placeholder="Buscar trabajador" name="buscar" value="<?php echo isset($_GET['buscar']) ? $_GET['buscar'] : ''; ?>">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
            </form>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6 justify-content-start"> <!-- Aumentar el número de columnas en pantallas grandes -->
                <?php
                // Recorrer los resultados
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <div class="col mb-3"> <!-- Reducido el margen inferior -->
                        <div class="worker-card">
                            <!-- Si la foto está vacía, usar imagen predeterminada -->
                            <img src="<?php echo $row['foto'] ?: 'ruta/a/imagen_predeterminada.jpg'; ?>" class="worker-img" alt="Foto de <?php echo $row['nombre']; ?>">
                            <div class="worker-name"><?php echo $row['nombre'] . ' ' . $row['apellido1']; ?></div>
                            <div class="worker-role"><?php echo $row['cargo']; ?></div>
                            <!-- Estrella de favorito -->
                            <i class="fas fa-star favorite-icon" data-worker-id="<?php echo $row['idTrabajador']; ?>"></i> <!-- Añadí un atributo data-worker-id para identificar el trabajador -->
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
    } else {
        echo "<p>No se encontraron trabajadores.</p>";
    }

} catch (PDOException $e) {
    // Manejo de errores si la consulta falla
    echo "Error en la consulta: " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabajadores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> <!-- Añadir Font Awesome -->
    <style>
        .worker-card {
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 6px;  /* Reducido el padding */
            background-color: #f9f9f9;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            margin-bottom: 10px; /* Reducido el margen inferior */
        }
        .worker-card:hover {
            transform: translateY(-5px);
        }
        .worker-img {
            width: 60px; /* Reducido el tamaño de la imagen */
            height: 60px; /* Reducido el tamaño de la imagen */
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #007bff;
            margin-bottom: 6px; /* Reducido el espacio entre la imagen y el nombre */
        }
        .worker-name {
            font-size: 0.85rem;  /* Reducido el tamaño de la fuente */
            font-weight: bold;
            margin-top: 6px;
        }
        .worker-role {
            font-size: 0.75rem;  /* Reducido el tamaño de la fuente */
            color: #555;
        }
        .favorite-icon {
            cursor: pointer;
            color: #ccc; /* Estilo inicial de la estrella sin marcar */
            font-size: 1.2rem;
            transition: color 0.3s ease;
            margin-top: 8px; /* Reducido el margen superior */
        }
        .favorite-icon.favorito {
            color: #ffcc00; /* Color dorado cuando la estrella está marcada */
        }
    </style>
</head>

<body>
    <!-- El contenido ya está en el código PHP para mostrar las tarjetas -->
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const estrellas = document.querySelectorAll('.favorite-icon'); // Seleccionar todas las estrellas
        
        estrellas.forEach(function(estrella) {
            estrella.addEventListener('click', function() {
                // Alternar la clase 'favorito' al hacer clic
                this.classList.toggle('favorito');

                // Aquí puedes manejar el almacenamiento del estado en una base de datos o localStorage
                const workerId = this.getAttribute('data-worker-id'); // Obtener el id del trabajador
                if (this.classList.contains('favorito')) {
                    console.log('Añadir a favoritos trabajador ID:', workerId);
                    // Aquí se puede enviar una solicitud al servidor para guardar en favoritos
                } else {
                    console.log('Eliminar de favoritos trabajador ID:', workerId);
                    // Aquí se puede enviar una solicitud al servidor para eliminar de favoritos
                }
            });
        });
    });
</script>

</html>
