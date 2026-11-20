<?php
session_start();
$titulo_pagina = "Mi Cuenta | SIS Seguridad Electrónica";
$pagina_actual = "cuenta";
$base_path = "../";
require_once '../includes/header.php';
require_once '../auth/auth_guard.php';

$es_admin = es_admin();
?>

    <main id="contenido">
      <section class="page-hero">
        <div class="container">
          <h1>Mi Cuenta</h1>
          <p>Tu información de usuario en el sistema.</p>
        </div>
      </section>

      <section class="section-pad">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="contact-form">
                <h2 class="h3 fw-bold mb-4">Datos del Usuario</h2>

                <ul class="list-unstyled mb-4">
                  <li class="mb-3">
                    <strong>Nombre:</strong> <?= htmlspecialchars($_SESSION['usuario_nombre']); ?>
                  </li>
                  <li class="mb-3">
                    <strong>Email:</strong> <?= htmlspecialchars($_SESSION['usuario_email']); ?>
                  </li>
                  <li class="mb-3">
                    <strong>Rol:</strong>
                    <span class="badge <?= $es_admin ? 'bg-success' : 'bg-primary'; ?>">
                      <?= htmlspecialchars($_SESSION['usuario_rol']); ?>
                    </span>
                  </li>
                </ul>

                <div class="d-flex gap-2">
                  <?php if ($es_admin): ?>
                    <a class="btn btn-sis flex-grow-1" href="admin_panel.php">
                      <i class="bi bi-speedometer2 me-2"></i>Ir al Panel Admin
                    </a>
                  <?php endif; ?>
                  <a class="btn btn-sis-outline flex-grow-1" href="<?= $base_path ?>index.php">
                    <i class="bi bi-house me-2"></i>Ir al Sitio
                  </a>
                  <a class="btn btn-danger flex-grow-1" href="logout.php">
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
