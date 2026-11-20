<?php
session_start();
require_once '../auth/auth_guard.php';
require_once '../config/conexion.php';

verificar_rol_admin();

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    $_SESSION['mensaje'] = "ID de usuario inválido.";
    $_SESSION['tipo_mensaje'] = "danger";
    header("Location: gestion_usuarios.php");
    exit;
}

if ((int) $id === (int) $_SESSION['usuario_id']) {
    $_SESSION['mensaje'] = "No puedes eliminar tu propia cuenta.";
    $_SESSION['tipo_mensaje'] = "danger";
    header("Location: gestion_usuarios.php");
    exit;
}

try {
    $sql = "SELECT id FROM usuarios WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() === 0) {
        $_SESSION['mensaje'] = "El usuario no existe.";
        $_SESSION['tipo_mensaje'] = "danger";
    } else {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $_SESSION['mensaje'] = "Usuario eliminado exitosamente.";
        $_SESSION['tipo_mensaje'] = "success";
    }
} catch (PDOException $e) {
    $_SESSION['mensaje'] = "Error al eliminar el usuario: " . $e->getMessage();
    $_SESSION['tipo_mensaje'] = "danger";
}

header("Location: gestion_usuarios.php");
exit;
