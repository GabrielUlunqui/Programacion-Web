<?php
$titulo_pagina = "Gestión de Contratos | SIS Seguridad Electrónica";
$pagina_actual = "admin";
$base_path = "../";
require_once '../includes/header.php';
require_once '../config/conexion.php';

$sql = "SELECT * FROM contratos_monitoreo ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$contratos = $stmt->fetchAll();
?>

    <main id="contenido">
      <section class="page-hero">
        <div class="container">
          <h1>Gestión de Contratos de Monitoreo</h1>
          <p>Administración de contratos de monitoreo de alarmas y cámaras.</p>
        </div>
      </section>

      <section class="section-pad">
        <div class="container">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3 fw-bold">Listado de Contratos</h2>
            <a class="btn btn-sis" href="<?= $base_path ?>crear.php">
              <i class="bi bi-plus-lg me-2"></i>Nuevo Contrato
            </a>
          </div>

          <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead class="table-light">
                <tr>
                  <th>ID</th>
                  <th>Nombre del Cliente</th>
                  <th>Tipo de Equipo</th>
                  <th>Tarifa Mensual</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php if (count($contratos) > 0): ?>
                  <?php foreach ($contratos as $contrato): ?>
                    <tr>
                      <td><?= htmlspecialchars($contrato['id']); ?></td>
                      <td><?= htmlspecialchars($contrato['nombre_cliente']); ?></td>
                      <td><?= htmlspecialchars($contrato['tipo_equipo']); ?></td>
                      <td><?= htmlspecialchars($contrato['tarifa_mensual']); ?></td>
                      <td>
                        <a href="editar.php?id=<?= htmlspecialchars($contrato['id']); ?>" class="btn btn-sm btn-outline-primary me-2">
                          <i class="bi bi-pencil"></i> Editar
                        </a>
                        <a href="eliminar.php?id=<?= htmlspecialchars($contrato['id']); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro de eliminar este contrato?');">
                          <i class="bi bi-trash"></i> Eliminar
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="5" class="text-center py-4">
                      <p class="lead-muted mb-0">No hay contratos registrados.</p>
                      <a href="<?= $base_path ?>crear.php" class="btn btn-sis">Crear primer contrato</a>
                    </td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <section class="cta-bar">
        <div class="container d-flex flex-wrap gap-2 justify-content-between align-items-center">
          <h2 class="h4 fw-bold text-white mb-0">¿Necesitas ayuda con los contratos?</h2>
          <a class="btn btn-sis" href="<?= $base_path ?>contacto.php">Contactar soporte</a>
        </div>
      </section>
    </main>

<?php require_once '../includes/footer.php'; ?>
