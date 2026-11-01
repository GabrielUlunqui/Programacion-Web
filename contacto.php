<?php
$titulo_pagina = "Contacto | SIS Seguridad Electrónica";
$pagina_actual = "contacto";
require_once 'includes/header.php';

$mensaje = "";
$tipo_mensaje = "";
$nombre = "";
$email = "";
$telefono = "";
$servicio = "";
$mensaje_texto = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['enviar'])) {
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS);
    $nombre = trim($nombre);

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = trim($email);

    $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_SPECIAL_CHARS);
    $telefono = trim($telefono);

    $servicio = filter_input(INPUT_POST, 'servicio', FILTER_SANITIZE_SPECIAL_CHARS);
    $servicio = trim($servicio);

    $mensaje_texto = filter_input(INPUT_POST, 'mensaje', FILTER_SANITIZE_SPECIAL_CHARS);
    $mensaje_texto = trim($mensaje_texto);

    $errores = [];

    if (empty($nombre)) {
        $errores[] = "El nombre es obligatorio.";
    } elseif (strlen($nombre) < 3) {
        $errores[] = "El nombre debe tener al menos 3 caracteres.";
    }

    if (empty($email)) {
        $errores[] = "El email es obligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El formato del email no es válido.";
    }

    if (empty($telefono)) {
        $errores[] = "El teléfono es obligatorio.";
    }

    if (empty($servicio)) {
        $errores[] = "Debes seleccionar un servicio de interés.";
    }

    if (empty($mensaje_texto)) {
        $errores[] = "El mensaje es obligatorio.";
    } elseif (strlen($mensaje_texto) < 10) {
        $errores[] = "El mensaje debe tener al menos 10 caracteres.";
    }

    if (empty($errores)) {
        $mensaje = "¡Mensaje enviado exitosamente! Gracias por contactarnos. Te responderemos a la brevedad.";
        $tipo_mensaje = "success";

        $nombre = "";
        $email = "";
        $telefono = "";
        $servicio = "";
        $mensaje_texto = "";
    } else {
        $mensaje = "Por favor, corrige los siguientes errores:";
        $tipo_mensaje = "danger";
    }
}
?>

    <main id="contenido">
      <section class="page-hero">
        <div class="container">
          <h1>Contactanos</h1>
          <p>Escribinos o coordiná un asesoramiento técnico para tu propiedad sin costo.</p>
        </div>
      </section>

      <section class="section-pad">
        <div class="container">
          <div class="row g-4">
            <div class="col-lg-7">
              <div class="contact-form">
                <h2 class="h3 fw-bold mb-4">Enviar un mensaje</h2>

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

                <form method="POST" action="contacto.php">
                  <div class="mb-3">
                    <label class="form-label" for="nombre">Nombre completo</label>
                    <input
                      class="form-control"
                      id="nombre"
                      name="nombre"
                      type="text"
                      placeholder="Ingresá tu nombre"
                      value="<?= htmlspecialchars($nombre); ?>"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="email">Email de contacto</label>
                    <input
                      class="form-control"
                      id="email"
                      name="email"
                      type="email"
                      placeholder="correo@ejemplo.com"
                      value="<?= htmlspecialchars($email); ?>"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="telefono">Teléfono / Celular</label>
                    <input
                      class="form-control"
                      id="telefono"
                      name="telefono"
                      type="tel"
                      placeholder="+54 387 1234567"
                      value="<?= htmlspecialchars($telefono); ?>"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="servicio">Servicio de interés</label>
                    <select class="form-select" id="servicio" name="servicio" required>
                      <option value="">Seleccioná un servicio</option>
                      <option value="Cámaras de Seguridad" <?= $servicio === 'Cámaras de Seguridad' ? 'selected' : ''; ?>>Cámaras de Seguridad</option>
                      <option value="Alarmas Inteligentes" <?= $servicio === 'Alarmas Inteligentes' ? 'selected' : ''; ?>>Alarmas Inteligentes</option>
                      <option value="Control de Accesos" <?= $servicio === 'Control de Accesos' ? 'selected' : ''; ?>>Control de Accesos</option>
                      <option value="Cercos Eléctricos" <?= $servicio === 'Cercos Eléctricos' ? 'selected' : ''; ?>>Cercos Eléctricos</option>
                      <option value="Seguimiento Vehicular" <?= $servicio === 'Seguimiento Vehicular' ? 'selected' : ''; ?>>Seguimiento Vehicular</option>
                      <option value="Sistemas contra Incendios" <?= $servicio === 'Sistemas contra Incendios' ? 'selected' : ''; ?>>Sistemas contra Incendios</option>
                    </select>
                  </div>
                  <div class="mb-4">
                    <label class="form-label" for="mensaje">Mensaje o consulta</label>
                    <textarea
                      class="form-control"
                      id="mensaje"
                      name="mensaje"
                      rows="5"
                      placeholder="Contanos brevemente qué necesitás proteger..."
                      required
                    ><?= htmlspecialchars($mensaje_texto); ?></textarea>
                  </div>
                  <button class="btn btn-sis w-100" type="submit" name="enviar">Enviar mensaje</button>
                </form>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="d-flex flex-column gap-3">
                <article class="info-card d-flex gap-3">
                  <div class="icon-circle mb-0" aria-hidden="true"><i class="bi bi-geo-alt"></i></div>
                  <div>
                    <div class="eyebrow mb-1">Nuestra dirección</div>
                    <strong><?= CIUDAD; ?></strong>
                    <p class="lead-muted mb-0">Oficina comercial y despacho técnico</p>
                  </div>
                </article>
                <article class="info-card d-flex gap-3">
                  <div class="icon-circle mb-0" aria-hidden="true"><i class="bi bi-telephone"></i></div>
                  <div>
                    <div class="eyebrow mb-1">Teléfono de soporte</div>
                    <strong><?= TELEFONO; ?></strong>
                    <p class="lead-muted mb-0">Atención técnica de lunes a sábados</p>
                  </div>
                </article>
                <article class="info-card d-flex gap-3">
                  <div class="icon-circle mb-0" aria-hidden="true"><i class="bi bi-envelope"></i></div>
                  <div>
                    <div class="eyebrow mb-1">Correo electrónico</div>
                    <strong><?= EMAIL_SOPORTE; ?></strong>
                    <p class="lead-muted mb-0">Consultas comerciales y cotizaciones</p>
                  </div>
                </article>
                <article class="info-card d-flex gap-3">
                  <div class="icon-circle mb-0" aria-hidden="true"><i class="bi bi-clock"></i></div>
                  <div>
                    <div class="eyebrow mb-1">Horarios de atención</div>
                    <strong>Lunes a Viernes 8:00 - 18:00</strong>
                    <p class="lead-muted mb-0">Sábados de 9:00 a 13:00</p>
                  </div>
                </article>
                <div class="map-placeholder" role="img" aria-label="Mapa de ubicación en <?= CIUDAD; ?>">
                  <span class="map-badge"><?= strtoupper(CIUDAD); ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php require_once 'includes/footer.php'; ?>

    <a class="whatsapp-fab" href="https://wa.me/<?= WHATSAPP; ?>" target="_blank" rel="noopener noreferrer" aria-label="Escribir por WhatsApp"><i class="bi bi-whatsapp"></i></a>
<?php require_once 'includes/footer.php'; ?>
