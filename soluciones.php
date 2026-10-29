<?php
$titulo_pagina = "Soluciones | SIS Seguridad Electrónica";
$pagina_actual = "soluciones";
require_once 'includes/header.php';
?>

    <main id="contenido">
      <section class="page-hero">
        <div class="container">
          <h1>Soluciones a medida</h1>
          <p>Armamos paquetes de seguridad según el tipo de propiedad, riesgo y presupuesto.</p>
        </div>
      </section>

      <section class="section-pad">
        <div class="container">
          <div class="row g-4">
            <div class="col-lg-4">
              <article class="solution-card">
                <img class="solution-media" src="imagen/casa.webp" alt="Casa con sistema de seguridad" width="600" height="200" />
                <div class="solution-body">
                  <div class="icon-box" aria-hidden="true"><i class="bi bi-house-door"></i></div>
                  <h2 class="h4 fw-bold">Residencial</h2>
                  <p class="lead-muted">Protección para hogares y countries con monitoreo desde el celular.</p>
                  <ul class="check-list">
                    <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Cámaras interior/exterior</li>
                    <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Alarma con sensores</li>
                    <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>App de visualización</li>
                  </ul>
                  <a class="btn btn-sis" href="asesoramiento.php">Cotizar residencial</a>
                </div>
              </article>
            </div>
            <div class="col-lg-4">
              <article class="solution-card">
                <img class="solution-media" src="imagen/comercio.webp" alt="Local comercial con cámaras" width="600" height="200" />
                <div class="solution-body">
                  <div class="icon-box" aria-hidden="true"><i class="bi bi-shop"></i></div>
                  <h2 class="h4 fw-bold">Comercial</h2>
                  <p class="lead-muted">Soluciones para locales, oficinas y edificios con control de ingresos.</p>
                  <ul class="check-list">
                    <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>CCTV multipunto</li>
                    <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Control de accesos</li>
                    <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Grabación continua</li>
                  </ul>
                  <a class="btn btn-sis" href="asesoramiento.php">Cotizar comercial</a>
                </div>
              </article>
            </div>
            <div class="col-lg-4">
              <article class="solution-card">
                <img class="solution-media" src="imagen/industria.webp" alt="Depósito industrial" width="600" height="200" style="object-position: center 68%" />
                <div class="solution-body">
                  <div class="icon-box" aria-hidden="true"><i class="bi bi-buildings"></i></div>
                  <h2 class="h4 fw-bold">Industrial</h2>
                  <p class="lead-muted">Perímetros, flotas y detección para plantas, depósitos y logística.</p>
                  <ul class="check-list">
                    <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Cercos eléctricos</li>
                    <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>GPS de flota</li>
                    <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Sistemas contra incendios</li>
                  </ul>
                  <a class="btn btn-sis" href="asesoramiento.php">Cotizar industrial</a>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>

      <section class="section-pad bg-soft">
        <div class="container">
          <div class="row align-items-center g-4">
            <div class="col-lg-6">
              <span class="eyebrow">Cómo elegimos tu pack</span>
              <h2 class="display-heading h1 mb-3">Diseño según riesgo real</h2>
              <p class="lead-muted mb-0">
                Evaluamos accesos, iluminación, valor de activos y hábitos de uso para proponer
                una solución eficiente, sin sobredimensionar ni dejar puntos ciegos.
              </p>
            </div>
            <div class="col-lg-6">
              <div class="row g-3">
                <div class="col-sm-6"><article class="value-card"><h3 class="h5 fw-bold">Relevamiento</h3><p class="lead-muted mb-0">Visita técnica sin cargo.</p></article></div>
                <div class="col-sm-6"><article class="value-card"><h3 class="h5 fw-bold">Propuesta</h3><p class="lead-muted mb-0">Presupuesto claro y escalable.</p></article></div>
                <div class="col-sm-6"><article class="value-card"><h3 class="h5 fw-bold">Instalación</h3><p class="lead-muted mb-0">Montaje y puesta en marcha.</p></article></div>
                <div class="col-sm-6"><article class="value-card"><h3 class="h5 fw-bold">Soporte</h3><p class="lead-muted mb-0">Mantenimiento y asistencia.</p></article></div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="cta-bar">
        <div class="container d-flex flex-wrap gap-2 justify-content-between align-items-center">
          <div>
            <h2 class="h4 fw-bold text-white mb-1">¿No sabés qué solución necesitás?</h2>
            <p class="mb-0" style="color:#94a3b8">Te orientamos sin compromiso.</p>
          </div>
          <a class="btn btn-sis" href="asesoramiento.php">Solicitar asesoramiento</a>
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
