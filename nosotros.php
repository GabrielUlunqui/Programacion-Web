<?php
$titulo_pagina = "Nosotros | SIS Seguridad Electrónica";
$pagina_actual = "nosotros";
require_once 'includes/header.php';
?>

    <main id="contenido">
      <section class="page-hero">
        <div class="container">
          <h1>Sobre SIS Seguridad Electrónica</h1>
          <p>Líderes en seguridad electrónica en la provincia de Salta, protegiendo hogares, comercios e industrias con excelencia.</p>
        </div>
      </section>

      <section class="section-pad">
        <div class="container">
          <div class="row align-items-center g-4 g-xl-5">
            <div class="col-lg-6">
              <span class="eyebrow">Nuestra trayectoria</span>
              <h2 class="display-heading h1 mb-3">Llevamos tranquilidad con soluciones de seguridad a medida</h2>
              <p class="lead-muted">
                Nacimos en Salta con el objetivo de acercar tecnología de seguridad confiable a familias y empresas.
                Hoy acompañamos proyectos residenciales, comerciales e industriales con instalación profesional y soporte local.
              </p>
              <p class="lead-muted mb-0">
                Nuestro equipo combina experiencia técnica, asesoramiento claro y un compromiso real con la protección
                de lo que más importa para cada cliente.
              </p>
            </div>
            <div class="col-lg-6">
              <img
                class="rounded-4 w-100"
                src="imagen/servicio.webp"
                alt="Equipo técnico de seguridad trabajando en laboratorio"
                width="800"
                height="560"
              />
            </div>
          </div>
        </div>
      </section>

      <section class="section-pad bg-soft">
        <div class="container">
          <div class="row g-3">
            <div class="col-md-6">
              <article class="mission-card">
                <div class="icon-box" aria-hidden="true"><i class="bi bi-shield"></i></div>
                <h2 class="h4 fw-bold">Nuestra Misión</h2>
                <p class="lead-muted mb-0">
                  Brindar soluciones de seguridad electrónica accesibles, confiables y adaptadas a cada entorno,
                  elevando la tranquilidad de nuestros clientes en toda la provincia.
                </p>
              </article>
            </div>
            <div class="col-md-6">
              <article class="mission-card">
                <div class="icon-box" aria-hidden="true"><i class="bi bi-eye"></i></div>
                <h2 class="h4 fw-bold">Nuestra Visión</h2>
                <p class="lead-muted mb-0">
                  Ser la empresa de referencia en Salta por calidad de instalación, innovación tecnológica
                  y un servicio postventa cercano y resolutivo.
                </p>
              </article>
            </div>
          </div>
        </div>
      </section>

      <section class="section-pad">
        <div class="container">
          <div class="text-center mb-5">
            <span class="eyebrow">Lo que nos define</span>
            <h2 class="display-heading h1">Nuestros Valores Fundamentales</h2>
          </div>
          <div class="row g-3">
            <div class="col-md-6 col-lg-3">
              <article class="value-item text-center">
                <div class="icon-circle mx-auto" aria-hidden="true"><i class="bi bi-heart"></i></div>
                <h3 class="h5 fw-bold">Compromiso</h3>
                <p class="lead-muted mb-0">Cumplimos lo prometido en cada etapa del proyecto.</p>
              </article>
            </div>
            <div class="col-md-6 col-lg-3">
              <article class="value-item text-center">
                <div class="icon-circle mx-auto" aria-hidden="true"><i class="bi bi-lightbulb"></i></div>
                <h3 class="h5 fw-bold">Innovación</h3>
                <p class="lead-muted mb-0">Incorporamos tecnología útil y fácil de usar.</p>
              </article>
            </div>
            <div class="col-md-6 col-lg-3">
              <article class="value-item text-center">
                <div class="icon-circle mx-auto" aria-hidden="true"><i class="bi bi-handshake"></i></div>
                <h3 class="h5 fw-bold">Confianza</h3>
                <p class="lead-muted mb-0">Transparencia en presupuestos, plazos y soporte.</p>
              </article>
            </div>
            <div class="col-md-6 col-lg-3">
              <article class="value-item text-center">
                <div class="icon-circle mx-auto" aria-hidden="true"><i class="bi bi-star"></i></div>
                <h3 class="h5 fw-bold">Excelencia</h3>
                <p class="lead-muted mb-0">Detalle técnico y calidad en cada instalación.</p>
              </article>
            </div>
          </div>
        </div>
      </section>

      <section class="cta-bar">
        <div class="container">
          <div class="row align-items-center g-3">
            <div class="col-lg-7 d-flex align-items-start gap-3">
              <div class="icon-circle mb-0 bg-sis text-white" aria-hidden="true"><i class="bi bi-shield-fill-check"></i></div>
              <div>
                <h2 class="h4 fw-bold text-white mb-1">Protegé lo que más importa</h2>
                <p class="mb-0" style="color:#94a3b8">Estamos listos para asesorarte las 24 horas del día.</p>
              </div>
            </div>
            <div class="col-lg-5 d-flex flex-wrap gap-2 justify-content-lg-end">
              <a class="btn btn-sis" href="asesoramiento.php">Solicitar asesoramiento</a>
              <a class="btn btn-sis-ghost" href="https://wa.me/<?= WHATSAPP; ?>" target="_blank" rel="noopener noreferrer">O escribinos por WhatsApp</a>
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
              <li><i class="bi bi-telephone text-sis me-2" aria-hidden="true"></i><?= TELEFONO; ?></li>
              <li><i class="bi bi-envelope text-sis me-2" aria-hidden="true"></i><?= EMAIL_SOPORTE; ?></li>
              <li><i class="bi bi-geo-alt text-sis me-2" aria-hidden="true"></i><?= CIUDAD; ?></li>
            </ul>
          </div>
        </div>
        <div class="footer-bottom">© <?= ANIO_COPYRIGHT; ?> <?= NOMBRE_SITIO; ?>. Todos los derechos reservados. <?= CIUDAD; ?>.</div>
      </div>
    </footer>

    <a class="whatsapp-fab" href="https://wa.me/<?= WHATSAPP; ?>" target="_blank" rel="noopener noreferrer" aria-label="Escribir por WhatsApp"><i class="bi bi-whatsapp"></i></a>
<?php require_once 'includes/footer.php'; ?>
