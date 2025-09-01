<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexion = new mysqli("localhost", "root", "", "baseDatosChamba");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    $email = $_POST["email"];
    $passwordIngresada = $_POST["password"];

    // Traer solo el hash de la contraseña desde la base
    $stmt = $conexion->prepare("SELECT password FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $passwordHash = $fila["password"];

        // Verificar la contraseña encriptada
        if (password_verify($passwordIngresada, $passwordHash)) {
            $_SESSION["email"] = $email;
            header("Location: confirmar.php");
            exit();
        } else {
            header("Location: rechazar.php");
            exit();
        }
    } else {
        header("Location: rechazar.php");
        exit();
    }

    $stmt->close();
    $conexion->close();
} else {
    echo "Acceso inválido.";
}
?>
