<?php
session_start();
require_once '../config/conexion.php';
require_once '../auth/auth_guard.php';

verificar_rol_admin();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!$id) {
    header("Location: index.php");
    exit;
}

try {
    $sql = "DELETE FROM contratos_monitoreo WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: index.php?eliminado=1");
    exit;
} catch (PDOException $e) {
    header("Location: index.php?error=" . urlencode($e->getMessage()));
    exit;
}
