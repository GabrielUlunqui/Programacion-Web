<?php
require_once '../config/conexion.php';

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
