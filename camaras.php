<?php
$titulo_pagina = "Cámaras de Seguridad | SIS Seguridad Electrónica";
$pagina_actual = "servicios";
require_once 'includes/header.php';
?>

    <main id="contenido">
      <section class="page-hero">
        <div class="container">
          <h1>Cámaras de Seguridad</h1>
          <p>Videovigilancia profesional con visión nocturna, detección de eventos y acceso remoto.</p>
        </div>
      </section>

      <section class="section-pad">
        <div class="container">
          <div class="row g-4 align-items-center">
            <div class="col-lg-6">
              <div class="service-media" style="background-image:url('imagen/camara.webp')" role="img" aria-label="Cámara de seguridad"></div>
            </div>
            <div class="col-lg-6">
              <span class="eyebrow">CCTV</span>
              <h2 class="display-heading h2">Monitoreo claro, día y noche</h2>
              <p class="lead-muted">Instalamos cámaras domo, bullet e IP según el entorno. Configuramos NVR/DVR y apps seguras para ver en vivo desde el celular.</p>
              <ul class="check-list">
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Resolución HD / 4K</li>
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Visión nocturna</li>
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Detección de movimiento</li>
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Grabación local o cloud</li>
              </ul>
              <a class="btn btn-sis" href="asesoramiento.php">Solicitar presupuesto</a>
            </div>
          </div>
        </div>
      </section>

      <section class="cta-bar">
        <div class="container d-flex flex-wrap gap-2 justify-content-between align-items-center">
          <h2 class="h4 fw-bold text-white mb-0">¿Querés un relevamiento sin cargo?</h2>
          <a class="btn btn-sis" href="contacto.php">Ir a contacto</a>
        </div>
      </section>
    </main>

    <footer class="sis-footer">
      <div class="container">
        <div class="row g-4">
          <div class="col-lg-4">
            <a class="sis-brand text-white mb-3 d-inline-flex" href="index.php">
              <img class="sis-logo-img" src="imagen/Logo-final.jpeg" alt="SIS Seguridad Electrónica" width="280" height="88" />
            </a>
            <p>Soluciones de seguridad electrónica en Salta.</p>
          </div>
          <div class="col-6 col-lg-4">
            <h2 class="footer-title">EMPRESA</h2>
            <ul>
              <li><a href="nosotros.php">Nosotros</a></li>
              <li><a href="trabajos.php">Nuestros trabajos</a></li>
              <li><a href="contacto.php">Contacto</a></li>
            </ul>
          </div>
          <div class="col-6 col-lg-4">
            <h2 class="footer-title">CONTACTO</h2>
            <ul>
              <li><?= TELEFONO; ?></li>
              <li><?= EMAIL_SOPORTE; ?></li>
            </ul>
          </div>
        </div>
        <div class="footer-bottom">© <?= ANIO_COPYRIGHT; ?> <?= NOMBRE_SITIO; ?>. Todos los derechos reservados.</div>
      </div>
    </footer>
    <a class="whatsapp-fab" href="https://wa.me/<?= WHATSAPP; ?>" target="_blank" rel="noopener noreferrer" aria-label="Escribir por WhatsApp"><i class="bi bi-whatsapp"></i></a>
<?php require_once 'includes/footer.php'; ?>
