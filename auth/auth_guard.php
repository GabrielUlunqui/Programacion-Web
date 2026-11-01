<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php?error=acceso_denegado");
    exit;
}

function es_admin() {
    return isset($_SESSION['usuario_rol']) && $_SESSION['usuario_rol'] === 'admin';
}

function verificar_rol_admin() {
    if (!es_admin()) {
        http_response_code(403);
        die('<div class="alert alert-danger text-center my-5">
            <h4 class="alert-heading">Acceso Denegado</h4>
            <p>No tienes permisos suficientes para acceder a esta sección.</p>
            <hr>
            <p class="mb-0">Solo los administradores pueden acceder a esta página.</p>
            <a href="javascript:history.back()" class="btn btn-outline-danger mt-3">Volver</a>
        </div>');
    }
}
?>
