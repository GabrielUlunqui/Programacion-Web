<?php
$titulo_pagina = "Editar Contrato | SIS Seguridad Electrónica";
$pagina_actual = "admin";
$base_path = "../";
require_once '../includes/header.php';
require_once '../config/conexion.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$mensaje = "";
$tipo_mensaje = "";

if (!$id) {
    header("Location: index.php");
    exit;
}

$sql = "SELECT * FROM contratos_monitoreo WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$contrato = $stmt->fetch();

if (!$contrato) {
    header("Location: index.php");
    exit;
}

$nombre_cliente = $contrato['nombre_cliente'];
$tipo_equipo = $contrato['tipo_equipo'];
$tarifa_mensual = $contrato['tarifa_mensual'];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['actualizar'])) {
    $nombre_cliente = filter_input(INPUT_POST, 'nombre_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
    $nombre_cliente = trim($nombre_cliente);

    $tipo_equipo = filter_input(INPUT_POST, 'tipo_equipo', FILTER_SANITIZE_SPECIAL_CHARS);
    $tipo_equipo = trim($tipo_equipo);

    $tarifa_mensual = filter_input(INPUT_POST, 'tarifa_mensual', FILTER_SANITIZE_NUMBER_FLOAT);
    $tarifa_mensual = trim($tarifa_mensual);

    $errores = [];

    if (empty($nombre_cliente)) {
        $errores[] = "El nombre del cliente es obligatorio.";
    } elseif (strlen($nombre_cliente) < 3) {
        $errores[] = "El nombre debe tener al menos 3 caracteres.";
    }

    if (empty($tipo_equipo)) {
        $errores[] = "El tipo de equipo es obligatorio.";
    }

    if (empty($tarifa_mensual)) {
        $errores[] = "La tarifa mensual es obligatoria.";
    } elseif (!is_numeric($tarifa_mensual) || $tarifa_mensual <= 0) {
        $errores[] = "La tarifa debe ser un número positivo.";
    }

    if (empty($errores)) {
        try {
            $sql = "UPDATE contratos_monitoreo SET nombre_cliente = :nombre_cliente, tipo_equipo = :tipo_equipo, tarifa_mensual = :tarifa_mensual WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nombre_cliente', $nombre_cliente);
            $stmt->bindParam(':tipo_equipo', $tipo_equipo);
            $stmt->bindParam(':tarifa_mensual', $tarifa_mensual);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $mensaje = "Contrato actualizado exitosamente.";
            $tipo_mensaje = "success";
        } catch (PDOException $e) {
            $mensaje = "Error al actualizar el contrato: " . $e->getMessage();
            $tipo_mensaje = "danger";
        }
    } else {
        $mensaje = "Por favor, corrige los siguientes errores:";
        $tipo_mensaje = "danger";
    }
}
?>

    <main id="contenido">
      <section class="page-hero">
        <div class="container">
          <h1>Editar Contrato #<?= htmlspecialchars($id); ?></h1>
          <p>Modifica los datos del contrato de monitoreo.</p>
        </div>
      </section>

      <section class="section-pad">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="contact-form">
                <h2 class="h3 fw-bold mb-4">Datos del Contrato</h2>

                <?php if (!empty($mensaje)): ?>
                  <div class="alert alert-<?= $tipo_mensaje; ?> mb-4" role="alert">
                    <?= $mensaje; ?>
                    <?php if (!empty($errores)): ?>
                      <ul class="mb-0 mt-2">
                        <?php foreach ($errores as $error): ?>
                          <li><?= htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                      </ul>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>

                <form method="POST" action="editar.php?id=<?= htmlspecialchars($id); ?>">
                  <div class="mb-3">
                    <label class="form-label" for="nombre_cliente">Nombre del Cliente</label>
                    <input
                      class="form-control"
                      id="nombre_cliente"
                      name="nombre_cliente"
                      type="text"
                      placeholder="Ej. Juan Pérez"
                      value="<?= htmlspecialchars($nombre_cliente); ?>"
                      required
                    />
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="tipo_equipo">Tipo de Equipo</label>
                    <select class="form-select" id="tipo_equipo" name="tipo_equipo" required>
                      <option value="">Seleccioná un tipo</option>
                      <option value="Cámaras de Seguridad" <?= $tipo_equipo === 'Cámaras de Seguridad' ? 'selected' : ''; ?>>Cámaras de Seguridad</option>
                      <option value="Alarmas Inteligentes" <?= $tipo_equipo === 'Alarmas Inteligentes' ? 'selected' : ''; ?>>Alarmas Inteligentes</option>
                      <option value="Control de Accesos" <?= $tipo_equipo === 'Control de Accesos' ? 'selected' : ''; ?>>Control de Accesos</option>
                      <option value="Cercos Eléctricos" <?= $tipo_equipo === 'Cercos Eléctricos' ? 'selected' : ''; ?>>Cercos Eléctricos</option>
                      <option value="Seguimiento Vehicular" <?= $tipo_equipo === 'Seguimiento Vehicular' ? 'selected' : ''; ?>>Seguimiento Vehicular</option>
                      <option value="Sistemas contra Incendios" <?= $tipo_equipo === 'Sistemas contra Incendios' ? 'selected' : ''; ?>>Sistemas contra Incendios</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="tarifa_mensual">Tarifa Mensual ($)</label>
                    <input
                      class="form-control"
                      id="tarifa_mensual"
                      name="tarifa_mensual"
                      type="number"
                      step="0.01"
                      min="0"
                      placeholder="Ej. 1500.00"
                      value="<?= htmlspecialchars($tarifa_mensual); ?>"
                      required
                    />
                  </div>

                  <div class="d-flex gap-2">
                    <button class="btn btn-sis flex-grow-1" type="submit" name="actualizar">
                      <i class="bi bi-check-lg me-2"></i>Actualizar Contrato
                    </button>
                    <a class="btn btn-sis-outline flex-grow-1" href="<?= $base_path ?>index.php">Cancelar</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="cta-bar">
        <div class="container d-flex flex-wrap gap-2 justify-content-between align-items-center">
          <h2 class="h4 fw-bold text-white mb-0">¿Necesitas ayuda con el formulario?</h2>
          <a class="btn btn-sis" href="<?= $base_path ?>contacto.php">Contactar soporte</a>
        </div>
      </section>
    </main>

<?php require_once '../includes/footer.php'; ?>
