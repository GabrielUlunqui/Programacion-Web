<?php
$titulo_pagina = "Solicitar Asesoramiento | SIS Seguridad Electrónica";
$pagina_actual = "asesoramiento";
require_once 'includes/header.php';

$mensaje = "";
$tipo_mensaje = "";
$nombre = "";
$telefono = "";
$email = "";
$tipo_propiedad = "";
$servicio = "";
$mensaje_texto = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['enviar_solicitud'])) {
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS);
    $nombre = trim($nombre);

    $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_SPECIAL_CHARS);
    $telefono = trim($telefono);

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = trim($email);

    $tipo_propiedad = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);
    $tipo_propiedad = trim($tipo_propiedad);

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

    if (empty($telefono)) {
        $errores[] = "El teléfono es obligatorio.";
    }

    if (empty($email)) {
        $errores[] = "El email es obligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El formato del email no es válido.";
    }

    if (empty($tipo_propiedad)) {
        $errores[] = "Debes seleccionar el tipo de propiedad.";
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
        $mensaje = "¡Solicitud de asesoramiento registrada! Te contactaremos dentro de las 24hs para coordinar la visita técnica.";
        $tipo_mensaje = "success";

        $nombre = "";
        $telefono = "";
        $email = "";
        $tipo_propiedad = "";
        $servicio = "";
        $mensaje_texto = "";
    } else {
        $mensaje = "Por favor, corrige los siguientes errores:";
        $tipo_mensaje = "danger";
    }
}
?>

    <main id="contenido">
      <section class="advise-hero">
        <div class="container">
          <span class="eyebrow" style="color: #8eb4ff">Asesoramiento técnico</span>
          <h1>Pedí tu relevamiento sin cargo</h1>
          <p>Te escuchamos, visitamos el lugar y armamos una propuesta a medida para tu casa, comercio o industria en Salta.</p>
          <div class="advise-pills">
            <span class="advise-pill"><i class="bi bi-check2-circle" aria-hidden="true"></i> Visita técnica gratis</span>
            <span class="advise-pill"><i class="bi bi-clock" aria-hidden="true"></i> Respuesta en 24 hs</span>
            <span class="advise-pill"><i class="bi bi-geo-alt" aria-hidden="true"></i> Capital y alrededores</span>
          </div>
        </div>
      </section>

      <section class="section-pad pt-0">
        <div class="container advise-layout">
          <div class="row g-4 align-items-stretch">
            <div class="col-lg-7">
              <div class="advise-form-card">
                <h2 class="h3 fw-bold mb-1">Completá tus datos</h2>
                <p class="lead-muted mb-4">Con esta información preparamos el relevamiento y te contactamos para coordinar día y horario.</p>

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

                <form method="POST" action="asesoramiento.php">
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label class="form-label" for="nombre">Nombre completo</label>
                      <input
                        class="form-control"
                        id="nombre"
                        name="nombre"
                        type="text"
                        placeholder="Ej. Ana Pérez"
                        value="<?= htmlspecialchars($nombre); ?>"
                        required
                      />
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="telefono">Teléfono</label>
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
                    <div class="col-md-6">
                      <label class="form-label" for="email">Email</label>
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
                    <div class="col-md-6">
                      <label class="form-label" for="tipo">Tipo de propiedad</label>
                      <select class="form-select" id="tipo" name="tipo" required>
                        <option value="">Seleccioná</option>
                        <option value="Residencial" <?= $tipo_propiedad === 'Residencial' ? 'selected' : ''; ?>>Residencial</option>
                        <option value="Comercial" <?= $tipo_propiedad === 'Comercial' ? 'selected' : ''; ?>>Comercial</option>
                        <option value="Industrial" <?= $tipo_propiedad === 'Industrial' ? 'selected' : ''; ?>>Industrial</option>
                      </select>
                    </div>
                    <div class="col-12">
                      <label class="form-label" for="servicio">Servicio de interés</label>
                      <select class="form-select" id="servicio" name="servicio" required>
                        <option value="">Seleccioná un servicio</option>
                        <option value="Cámaras de Seguridad" <?= $servicio === 'Cámaras de Seguridad' ? 'selected' : ''; ?>>Cámaras de Seguridad</option>
                        <option value="Alarmas Inteligentes" <?= $servicio === 'Alarmas Inteligentes' ? 'selected' : ''; ?>>Alarmas Inteligentes</option>
                        <option value="Control de Accesos" <?= $servicio === 'Control de Accesos' ? 'selected' : ''; ?>>Control de Accesos</option>
                        <option value="Cercos Eléctricos" <?= $servicio === 'Cercos Eléctricos' ? 'selected' : ''; ?>>Cercos Eléctricos</option>
                        <option value="Seguimiento Vehicular" <?= $servicio === 'Seguimiento Vehicular' ? 'selected' : ''; ?>>Seguimiento Vehicular</option>
                        <option value="Sistemas contra Incendios" <?= $servicio === 'Sistemas contra Incendios' ? 'selected' : ''; ?>>Sistemas contra Incendios</option>
                        <option value="Pack integral" <?= $servicio === 'Pack integral' ? 'selected' : ''; ?>>Pack integral</option>
                      </select>
                    </div>
                    <div class="col-12">
                      <label class="form-label" for="mensaje">Contanos tu necesidad</label>
                      <textarea
                        class="form-control"
                        id="mensaje"
                        name="mensaje"
                        rows="4"
                        placeholder="Qué querés proteger, tamaño del lugar o cualquier detalle útil..."
                        required
                      ><?= htmlspecialchars($mensaje_texto); ?></textarea>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-sis w-100" type="submit" name="enviar_solicitud">Enviar solicitud</button>
                    </div>
                  </div>
                </form>
                <div class="advise-steps">
                  <div class="advise-step">
                    <span>01</span>
                    <strong>Recibimos tu pedido</strong>
                    <p>Revisamos el caso el mismo día hábil.</p>
                  </div>
                  <div class="advise-step">
                    <span>02</span>
                    <strong>Coordinamos visita</strong>
                    <p>Un técnico releva el lugar sin cargo.</p>
                  </div>
                  <div class="advise-step">
                    <span>03</span>
                    <strong>Propuesta clara</strong>
                    <p>Te enviamos presupuesto y plan de obra.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-5">
              <aside class="advise-aside">
                <img class="advise-aside-photo" src="imagen/servicio.webp" alt="Equipo técnico de SIS Seguridad Electrónica" width="640" height="220" />
                <div class="advise-aside-body">
                  <h2 class="h5 fw-bold mb-1">¿Preferís hablar ahora?</h2>
                  <p class="lead-muted mb-3">También podés escribirnos o llamarnos. Atendemos consultas de lunes a sábados.</p>
                  <div class="advise-contact-row">
                    <div class="icon-box mb-0" aria-hidden="true"><i class="bi bi-whatsapp"></i></div>
                    <div>
                      <strong>WhatsApp</strong>
                      <p class="lead-muted mb-0"><?= TELEFONO; ?></p>
                    </div>
                  </div>
                  <div class="advise-contact-row">
                    <div class="icon-box mb-0" aria-hidden="true"><i class="bi bi-telephone"></i></div>
                    <div>
                      <strong>Teléfono</strong>
                      <p class="lead-muted mb-0"><?= TELEFONO; ?></p>
                    </div>
                  </div>
                  <div class="advise-contact-row">
                    <div class="icon-box mb-0" aria-hidden="true"><i class="bi bi-envelope"></i></div>
                    <div>
                      <strong>Email</strong>
                      <p class="lead-muted mb-0"><?= EMAIL_SOPORTE; ?></p>
                    </div>
                  </div>
                  <a class="btn btn-sis w-100 mt-3" href="https://wa.me/<?= WHATSAPP; ?>" target="_blank" rel="noopener noreferrer">
                    <i class="bi bi-whatsapp me-1" aria-hidden="true"></i> Abrir WhatsApp
                  </a>
                </div>
              </aside>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php require_once 'includes/footer.php'; ?>
