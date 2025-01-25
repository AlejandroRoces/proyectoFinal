<?php
session_start();                             // Iniciar sesión para guardar datos del usuario
require_once 'C:\xampp\htdocs\CampTrack\proyectoFinal\model\database\connection.php';   // Conexion con la base de datos

// Función para recoger valores del formulario de manera segura
function recogerValor($key) {
    $valor = "";
    if (isset($_POST[$key])) {
        $valor = trim(htmlspecialchars($_POST[$key]));
    } else {
        $valor = "ERROR: Campo $key no fue proporcionado.";
    }
    return $valor;
}

// Función para conectar y verificar las credenciales
function consultaPass($user, $pass) {
    // Consulta SQL para buscar el usuario
    $consulta = "SELECT * FROM login WHERE user = :user";
    $pdo = conectarDB(); // Establece conexión con la base de datos

    try {
        $resul = $pdo->prepare($consulta); // Prepara la consulta
        $resul->bindParam(':user', $user, PDO::PARAM_STR);
        $resul->execute(); // Ejecuta la consulta

        $registro = $resul->fetch(PDO::FETCH_ASSOC); // Obtiene el registro asociado al usuario

        if ($registro == null) {
            echo "ERROR: Usuario no encontrado.";
            return false;
        }

        if ($pass == $registro['password']) {
            // Usuario y contraseña correctos
            $_SESSION['user'] = $registro['user']; // Guarda el usuario en la sesión
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
if ($user && $pass && strpos($user, "ERROR") === false && strpos($pass, "ERROR") === false) {
    if (consultaPass($user, $pass)) {
        // Si la autenticación es correcta, redirige al dashboard
        header("Location: ../../views/dash/maquetaDashboard.php"); // esta instruccion direige como el href pero directo
        exit();
    }
} else {
    echo "ERROR: Por favor complete ambos campos.";
}
?>