<?php
$titulo_pagina = "Contacto | SIS Seguridad Electrónica";
$pagina_actual = "contacto";
require_once 'includes/header.php';
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
                <div id="form-success" class="alert alert-success d-none" role="status">
                  ¡Gracias! Recibimos tu mensaje. Te contactaremos a la brevedad.
                </div>
                <form id="contact-form" novalidate>
                  <div class="mb-3">
                    <label class="form-label" for="nombre">Nombre completo</label>
                    <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Ingresá tu nombre" required />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="email">Email de contacto</label>
                    <input class="form-control" id="email" name="email" type="email" placeholder="correo@ejemplo.com" required />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="telefono">Teléfono / Celular</label>
                    <input class="form-control" id="telefono" name="telefono" type="tel" placeholder="+54 387 1234567" required />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="servicio">Servicio de interés</label>
                    <select class="form-select" id="servicio" name="servicio" required>
                      <option value="">Seleccioná un servicio</option>
                      <option>Cámaras de Seguridad</option>
                      <option>Alarmas Inteligentes</option>
                      <option>Control de Accesos</option>
                      <option>Cercos Eléctricos</option>
                      <option>Seguimiento Vehicular</option>
                      <option>Sistemas contra Incendios</option>
                    </select>
                  </div>
                  <div class="mb-4">
                    <label class="form-label" for="mensaje">Mensaje o consulta</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="5" placeholder="Contanos brevemente qué necesitás proteger..." required></textarea>
                  </div>
                  <button class="btn btn-sis w-100" type="submit">Enviar mensaje</button>
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

    <footer class="sis-footer">
      <div class="container">
        <div class="row g-4">
          <div class="col-md-6 col-lg-3">
            <a class="sis-brand text-white mb-3 d-inline-flex" href="index.php">
              <img class="sis-logo-img" src="imagen/Logo-final.jpeg" alt="SIS Seguridad Electrónica" width="280" height="88" />
            </a>
            <p>Soluciones de seguridad electrónica para hogares, comercios e industrias en Salta.</p>
            <div class="social-links">
              <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
              <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
            </div>
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
