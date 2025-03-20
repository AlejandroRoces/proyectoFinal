<?php
require_once 'database/connection.php'; // Ajusta la ruta

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['user'])) {
    header("Location: ../../login.php");
    exit();
}

$userName = $_SESSION['user'];

// Obtener la primera letra del nombre del usuario
$firstLetter = strtoupper(substr($userName, 0, 1));

// Generar un color basado en el hash del nombre
$hash = md5($userName);
$color = substr($hash, 0, 6);
$randomColor = '#' . $color;

// Conectar a la base de datos
$pdo = conectarDB();

// Paginación y búsqueda
$recordsPerPage = isset($_GET['recordsPerPage']) ? intval($_GET['recordsPerPage']) : 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$searchTerm = isset($_GET['search']) ? "%" . $_GET['search'] . "%" : "%";
$start = ($page - 1) * $recordsPerPage;

// Consulta para obtener los mensajes del usuario
$sql = "SELECT * FROM mensajes_camptrack 
        WHERE destinatarios = :userName 
        AND (remitente LIKE :searchTerm OR asunto LIKE :searchTerm)
        ORDER BY fecha_envio DESC, hora_envio DESC
        LIMIT :start, :recordsPerPage";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':userName', $userName, PDO::PARAM_STR);
$stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
$stmt->bindParam(':start', $start, PDO::PARAM_INT);
$stmt->bindParam(':recordsPerPage', $recordsPerPage, PDO::PARAM_INT);
$stmt->execute();
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Contar total de mensajes para la paginación
$sqlTotal = "SELECT COUNT(*) FROM mensajes_camptrack 
             WHERE destinatarios = :userName 
             AND (remitente LIKE :searchTerm OR asunto LIKE :searchTerm)";
$stmtTotal = $pdo->prepare($sqlTotal);
$stmtTotal->bindParam(':userName', $userName, PDO::PARAM_STR);
$stmtTotal->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
$stmtTotal->execute();
$totalMessages = $stmtTotal->fetchColumn();
$totalPages = ceil($totalMessages / $recordsPerPage);
?>

<!-- Tabla de mensajes -->
<div class="card-body">
    <div class="d-flex justify-content-between mb-3">
        <div>
            <label for="recordsPerPage">Registros</label>
            <select id="recordsPerPage" class="form-select d-inline w-auto" onchange="updatePage()">
                <option <?php if ($recordsPerPage == 10) echo 'selected'; ?>>10</option>
                <option <?php if ($recordsPerPage == 25) echo 'selected'; ?>>25</option>
                <option <?php if ($recordsPerPage == 50) echo 'selected'; ?>>50</option>
                <option <?php if ($recordsPerPage == 100) echo 'selected'; ?>>100</option>
            </select>
            por página
        </div>
        <div class="input-group w-25">
            <input type="text" class="form-control" id="searchInput" placeholder="Buscar en recibidos" onkeyup="searchMessages()">
            <button class="btn btn-primary" type="button" onclick="searchMessages()">Buscar</button>
        </div>
    </div>

    <table class="table table-hover message-table">
        <thead>
            <tr>
                <th>Leído</th>
                <th>Remitente</th>
                <th>Asunto</th>
                <th>Fecha</th>
                <th>Hora</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($messages as $message): ?>
                <tr class="<?= $message['leido'] ? '' : 'unread' ?>" onclick="window.location.href='../../../views/dash/familyDash/familiasDashBoard_Mensajes_ver.php?id=<?= $message['id'] ?>'" style="cursor: pointer;">
                    <td><input type="checkbox" <?php if ($message['leido']) echo 'checked'; ?> disabled></td>
                    <td><?php echo htmlspecialchars($message['remitente']); ?></td>
                    <td class="<?php if (!$message['leido']) echo 'unread'; ?>">
                        <?php echo htmlspecialchars($message['asunto']); ?>
                        <?php if (!empty($message['mensaje'])): ?>
                            <i class="attachment-icon bi bi-paperclip"></i>
                        <?php endif; ?>
                    </td>
                    <td><?php echo date('d/m/Y', strtotime($message['fecha_envio'])); ?></td>
                    <td><?php echo date('H:i', strtotime($message['hora_envio'])); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

    <!-- Paginación -->
    <div class="pagination justify-content-center">
        <button class="btn btn-light" onclick="changePage(<?php echo $page - 1; ?>)" <?php if ($page <= 1) echo 'disabled'; ?>>&lt;</button>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <button class="btn <?php if ($i == $page) echo 'btn-primary';
                                else echo 'btn-light'; ?>" onclick="changePage(<?php echo $i; ?>)">
                <?php echo $i; ?>
            </button>
        <?php endfor; ?>
        <button class="btn btn-light" onclick="changePage(<?php echo $page + 1; ?>)" <?php if ($page >= $totalPages) echo 'disabled'; ?>>&gt;</button>
    </div>
</div>

<script>
    function changePage(page) {
        const searchTerm = document.getElementById('searchInput').value;
        const recordsPerPage = document.getElementById('recordsPerPage').value;
        window.location.href = `misMensajes.php?page=${page}&recordsPerPage=${recordsPerPage}&search=${searchTerm}`;
    }

    function updatePage() {
        const recordsPerPage = document.getElementById('recordsPerPage').value;
        const searchTerm = document.getElementById('searchInput').value;
        window.location.href = `misMensajes.php?page=1&recordsPerPage=${recordsPerPage}&search=${searchTerm}`;
    }

    function searchMessages() {
        const searchTerm = document.getElementById('searchInput').value;
        const recordsPerPage = document.getElementById('recordsPerPage').value;
        window.location.href = `misMensajes.php?page=1&recordsPerPage=${recordsPerPage}&search=${searchTerm}`;
    }
</script>