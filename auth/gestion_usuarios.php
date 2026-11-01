<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
$titulo_pagina = "Gestión de Usuarios | SIS Seguridad Electrónica";
$pagina_actual = "admin";
$base_path = "../";
require_once '../includes/header.php';
require_once '../auth/auth_guard.php';
require_once '../config/conexion.php';

verificar_rol_admin();

$sql = "SELECT id, nombre, email, rol, created_at FROM usuarios ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$usuarios = $stmt->fetchAll();
?>

    <main id="contenido">
      <section class="page-hero">
        <div class="container">
          <h1>Gestión de Usuarios</h1>
          <p>Administración de usuarios del sistema.</p>
        </div>
      </section>

      <section class="section-pad">
        <div class="container">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3 fw-bold">Listado de Usuarios</h2>
            <a class="btn btn-sis" href="crear_usuario.php">
              <i class="bi bi-plus-lg me-2"></i>Nuevo Usuario
            </a>
          </div>

          <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead class="table-light">
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Rol</th>
                  <th>Fecha de Registro</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php if (count($usuarios) > 0): ?>
                  <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                      <td><?= htmlspecialchars($usuario['id']); ?></td>
                      <td><?= htmlspecialchars($usuario['nombre']); ?></td>
                      <td><?= htmlspecialchars($usuario['email']); ?></td>
                      <td>
                        <span class="badge <?= $usuario['rol'] === 'admin' ? 'bg-success' : 'bg-primary'; ?>">
                          <?= htmlspecialchars($usuario['rol']); ?>
                        </span>
                      </td>
                      <td><?= htmlspecialchars($usuario['created_at']); ?></td>
                      <td>
                        <a href="editar_usuario.php?id=<?= htmlspecialchars($usuario['id']); ?>" class="btn btn-sm btn-outline-primary me-2">
                          <i class="bi bi-pencil"></i> Editar
                        </a>
                        <?php if ($usuario['id'] != $_SESSION['usuario_id']): ?>
                          <a href="eliminar_usuario.php?id=<?= htmlspecialchars($usuario['id']); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro de eliminar este usuario?');">
                            <i class="bi bi-trash"></i> Eliminar
                          </a>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="6" class="text-center py-4">
                      <p class="lead-muted mb-0">No hay usuarios registrados.</p>
                      <a href="crear_usuario.php" class="btn btn-sis">Crear primer usuario</a>
                    </td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>

          <div class="mt-4">
            <a class="btn btn-sis-outline" href="admin_panel.php">
              <i class="bi bi-arrow-left me-2"></i>Volver al Panel
            </a>
          </div>
        </div>
      </section>
    </main>

<?php require_once '../includes/footer.php'; ?>
