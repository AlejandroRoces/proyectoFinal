<?php
require_once __DIR__ . '/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['correo']);
    $username = trim($_POST['usuario']);
    $password = trim($_POST['contrasena']);
    $confirmPassword = trim($_POST['confirmar_contrasena']);
    $role = 'usuario';

    // Validar que las contraseñas coincidan
    if ($password !== $confirmPassword) {
        die("ERROR: Las contraseñas no coinciden.");
    }

    try {
        $conexion = conectarDB();

        // Verificar si el correo o el usuario ya existen
        $queryCheck = "SELECT id FROM login_camptrack WHERE email = :email OR user = :user";
        $stmtCheck = $conexion->prepare($queryCheck);
        $stmtCheck->bindParam(':email', $email, PDO::PARAM_STR);
        $stmtCheck->bindParam(':user', $username, PDO::PARAM_STR);
        $stmtCheck->execute();

        if ($stmtCheck->rowCount() > 0) {
            die("ERROR: El correo o usuario ya están registrados.");
        }

        // Hash de la contraseña para mayor seguridad
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        // Insertar en la base de datos
        $query = "INSERT INTO login_camptrack (user, password, email, role) VALUES (:user, :password, :email, :role)";
        $stmt = $conexion->prepare($query);
        $stmt->bindParam(':user', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $passwordHash, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
        $stmt->execute();

        // Redirección tras la creación exitosa
        header("Location: ../../views/logs/login.php");
        exit();
    } catch (PDOException $e) {
        die("ERROR: No se pudo crear la cuenta. " . $e->getMessage());
    }
} else {
    die("ERROR: Método no permitido.");
}
?>
