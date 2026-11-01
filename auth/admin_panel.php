<?php
session_start();
$titulo_pagina = "Panel de Administración | SIS Seguridad Electrónica";
$pagina_actual = "admin";
$base_path = "../";
require_once '../includes/header.php';
require_once '../auth/auth_guard.php';
require_once '../config/conexion.php';

try {
    $sql_usuarios = "SELECT COUNT(*) as total FROM usuarios";
    $stmt_usuarios = $pdo->prepare($sql_usuarios);
    $stmt_usuarios->execute();
    $total_usuarios = $stmt_usuarios->fetch()['total'];

    $sql_contratos = "SELECT COUNT(*) as total FROM contratos_monitoreo";
    $stmt_contratos = $pdo->prepare($sql_contratos);
    $stmt_contratos->execute();
    $total_contratos = $stmt_contratos->fetch()['total'];
} catch (PDOException $e) {
    $total_usuarios = 0;
    $total_contratos = 0;
}

verificar_rol_admin();
?>

    <main id="contenido">
      <section class="page-hero">
        <div class="container">
          <h1>Panel de Administración</h1>
          <p>Bienvenido, <?= htmlspecialchars($_SESSION['usuario_nombre']); ?>. Sistema de gestión de contratos.</p>
        </div>
      </section>

      <section class="section-pad">
        <div class="container">
          <div class="row g-4 mb-5">
            <div class="col-md-6">
              <div class="card text-center">
                <div class="card-body">
                  <h5 class="card-title">Usuarios</h5>
                  <p class="card-text display-4 fw-bold text-sis"><?= htmlspecialchars($total_usuarios); ?></p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card text-center">
                <div class="card-body">
                  <h5 class="card-title">Contratos</h5>
                  <p class="card-text display-4 fw-bold text-sis"><?= htmlspecialchars($total_contratos); ?></p>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-8">
              <div class="card mb-4">
                <div class="card-header bg-navy text-white">
                  <h5 class="mb-0">Acciones Rápidas</h5>
                </div>
                <div class="card-body">
                  <div class="d-grid gap-2">
                    <a class="btn btn-sis text-start" href="gestion_usuarios.php">
                      <i class="bi bi-people me-2"></i>Gestionar Usuarios
                    </a>
                    <a class="btn btn-sis text-start" href="<?= $base_path ?>admin/index.php">
                      <i class="bi bi-list-check me-2"></i>Gestionar Contratos
                    </a>
                    <a class="btn btn-outline-primary text-start" href="#">
                      <i class="bi bi-graph-up me-2"></i>Ver Reportes
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="card mb-4">
                <div class="card-header bg-navy text-white">
                  <h5 class="mb-0">Información de Sesión</h5>
                </div>
                <div class="card-body">
                  <ul class="list-unstyled mb-0">
                    <li class="mb-2">
                      <strong>Usuario:</strong> <?= htmlspecialchars($_SESSION['usuario_nombre']); ?>
                    </li>
                    <li class="mb-2">
                      <strong>Email:</strong> <?= htmlspecialchars($_SESSION['usuario_email']); ?>
                    </li>
                    <li class="mb-2">
                      <strong>Rol:</strong> 
                      <span class="badge bg-success"><?= htmlspecialchars($_SESSION['usuario_rol']); ?></span>
                    </li>
                    <li>
                      <strong>ID de Sesión:</strong> <?= session_id(); ?>
                    </li>
                  </ul>
                </div>
                <div class="card-footer">
                  <a href="logout.php" class="btn btn-danger w-100">
                    <i class="bi bi-box-arrow-right me-2"></i>Cerrar Sesión
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php require_once '../includes/footer.php'; ?>
