<?php
header('Content-Type: application/json; charset=utf-8');
session_start();

if (!isset($_SESSION['usuario_id']) || ($_SESSION['usuario_rol'] ?? '') !== 'admin') {
    http_response_code(401);
    echo json_encode([
        'status' => 'error',
        'message' => 'No autorizado'
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

require_once '../config/conexion.php';

$termino = $_GET['q'] ?? '';

if (!is_string($termino)) {
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => 'Parámetro de búsqueda inválido'
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$termino = trim($termino);
$termino = mb_substr($termino, 0, 100);

try {
    if ($termino !== '') {
        $like = "%{$termino}%";
        $sql = "SELECT id, nombre_cliente, tipo_equipo, tarifa_mensual FROM contratos_monitoreo
                WHERE nombre_cliente LIKE :q OR tipo_equipo LIKE :q
                ORDER BY id DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':q', $like);
        $stmt->execute();
    } else {
        $sql = "SELECT id, nombre_cliente, tipo_equipo, tarifa_mensual FROM contratos_monitoreo ORDER BY id DESC";
        $stmt = $pdo->query($sql);
    }

    $contratos = $stmt->fetchAll();

    http_response_code(200);
    echo json_encode([
        'status' => 'success',
        'data' => $contratos
    ], JSON_UNESCAPED_UNICODE);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => 'Error al consultar la base de datos'
    ], JSON_UNESCAPED_UNICODE);
}
