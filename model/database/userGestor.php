<?php
session_start(); // Iniciar sesión para guardar datos del usuario
require_once __DIR__ . '/connection.php'; // Conexion con la base de datos

// Función para recoger valores del formulario de manera segura
function recogerValor($key) {
    return isset($_POST[$key]) ? trim(htmlspecialchars($_POST[$key])) : null;
}

// Función para conectar y verificar las credenciales
function consultaPass($user, $pass) {
    $consulta = "SELECT * FROM login_camptrack WHERE user = :user";
    $pdo = conectarDB(); // Conectar a la base de datos

    try {
        $resul = $pdo->prepare($consulta);
        $resul->bindParam(':user', $user, PDO::PARAM_STR);
        $resul->execute();

        $registro = $resul->fetch(PDO::FETCH_ASSOC);

        if (!$registro) {
            echo "ERROR: Usuario no encontrado.";
            return false;
        }

        if (password_verify($pass, $registro['password'])) { // Compara usando password_verify()
            // Usuario y contraseña correctos
            $_SESSION['user'] = $registro['user'];
            $_SESSION['role'] = $registro['role'];
            return true;
        } else {
            echo "ERROR: Contraseña incorrecta.";
            return false;
        }
    } catch (PDOException $e) {
        echo "ERROR: Fallo en la consulta: " . $e->getMessage();
        return false;
    }
}

// Recoge los valores del formulario
$user = recogerValor('username');
$pass = recogerValor('password');

// Verifica que ambos campos estén completos
if ($user && $pass) {
    if (consultaPass($user, $pass)) {
        // Redirige al usuario según su rol
        switch ($_SESSION['role']) {
            case 'admin':
                header("Location: ../../views/dash/adminDash/adminDashboard.php");
                break;
            case 'monitor':
                header("Location: ../../views/dash/monitoresDashboard.php");
                break;
            case 'usuario':
                header("Location: ../../views/dash/familiasDashboard.php");
                break;
            default:
                echo "ERROR: Rol desconocido.";
                break;
        }
        exit();
    }
} else {
    echo "ERROR: Por favor complete ambos campos.";
}
?>
