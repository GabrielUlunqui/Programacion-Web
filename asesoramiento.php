<?php
$titulo_pagina = "Solicitar Asesoramiento | SIS Seguridad Electrónica";
$pagina_actual = "asesoramiento";
require_once 'includes/header.php';
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
                <div id="form-success" class="alert alert-success d-none" role="status">
                  ¡Listo! Registramos tu solicitud de asesoramiento.
                </div>
                <form id="contact-form" novalidate>
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label class="form-label" for="nombre">Nombre completo</label>
                      <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Ej. Ana Pérez" required />
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="telefono">Teléfono</label>
                      <input class="form-control" id="telefono" name="telefono" type="tel" placeholder="+54 387 1234567" required />
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="email">Email</label>
                      <input class="form-control" id="email" name="email" type="email" placeholder="correo@ejemplo.com" required />
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="tipo">Tipo de propiedad</label>
                      <select class="form-select" id="tipo" name="tipo" required>
                        <option value="">Seleccioná</option>
                        <option>Residencial</option>
                        <option>Comercial</option>
                        <option>Industrial</option>
                      </select>
                    </div>
                    <div class="col-12">
                      <label class="form-label" for="servicio">Servicio de interés</label>
                      <select class="form-select" id="servicio" name="servicio" required>
                        <option value="">Seleccioná un servicio</option>
                        <option>Cámaras de Seguridad</option>
                        <option>Alarmas Inteligentes</option>
                        <option>Control de Accesos</option>
                        <option>Cercos Eléctricos</option>
                        <option>Seguimiento Vehicular</option>
                        <option>Sistemas contra Incendios</option>
                        <option>Pack integral</option>
                      </select>
                    </div>
                    <div class="col-12">
                      <label class="form-label" for="mensaje">Contanos tu necesidad</label>
                      <textarea class="form-control" id="mensaje" name="mensaje" rows="4" placeholder="Qué querés proteger, tamaño del lugar o cualquier detalle útil..." required></textarea>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-sis w-100" type="submit">Enviar solicitud</button>
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

    <footer class="sis-footer">
      <div class="container">
        <div class="row g-4">
          <div class="col-md-6 col-lg-3">
            <a class="sis-brand text-white mb-3 d-inline-flex" href="index.php">
              <img class="sis-logo-img" src="imagen/Logo-final.jpeg" alt="SIS Seguridad Electrónica" width="280" height="88" />
            </a>
            <p>Soluciones de seguridad electrónica para hogares, comercios e industrias en Salta.</p>
          </div>
          <div class="col-6 col-lg-3">
            <h2 class="footer-title">SERVICIOS</h2>
            <ul>
              <li><a href="camaras.php">Cámaras de Seguridad</a></li>
              <li><a href="alarmas.php">Alarmas Inteligentes</a></li>
              <li><a href="accesos.php">Control de Accesos</a></li>
              <li><a href="servicios.php">Ver todos</a></li>
            </ul>
          </div>
          <div class="col-6 col-lg-3">
            <h2 class="footer-title">EMPRESA</h2>
            <ul>
              <li><a href="nosotros.php">Nosotros</a></li>
              <li><a href="trabajos.php">Nuestros trabajos</a></li>
              <li><a href="soluciones.php">Soluciones</a></li>
              <li><a href="contacto.php">Contacto</a></li>
            </ul>
          </div>
          <div class="col-lg-3">
            <h2 class="footer-title">CONTACTO</h2>
            <ul>
              <li><?= TELEFONO; ?></li>
              <li><?= EMAIL_SOPORTE; ?></li>
              <li><?= CIUDAD; ?></li>
            </ul>
          </div>
        </div>
        <div class="footer-bottom">© <?= ANIO_COPYRIGHT; ?> <?= NOMBRE_SITIO; ?>. Todos los derechos reservados. <?= CIUDAD; ?>.</div>
      </div>
    </footer>
    <a class="whatsapp-fab" href="https://wa.me/<?= WHATSAPP; ?>" target="_blank" rel="noopener noreferrer" aria-label="Escribir por WhatsApp"><i class="bi bi-whatsapp"></i></a>
<?php require_once 'includes/footer.php'; ?>
