<?php
require_once 'C:\\xampp\\htdocs\\CampTrack\\proyectoFinal\\model\\database\\connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['correo']);
    $username = trim($_POST['usuario']);
    $password = trim($_POST['contrasena']);
    $confirmPassword = trim($_POST['confirmar_contrasena']);
    $role = 'user';

    // Validar que las contraseñas coincidan
    if ($password !== $confirmPassword) {
        die("ERROR: Las contraseñas no coinciden.");
    }

    try {
        $conexion = conectarDB();

        // Hash de la contraseña para mayor seguridad
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        // Consulta SQL
        $query = "INSERT INTO login.campTrack (user, password, email, role) VALUES (:user, :password, :email, :role)";
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
