<?php
$titulo_pagina = "Alarmas Inteligentes | SIS Seguridad Electrónica";
$pagina_actual = "servicios";
require_once 'includes/header.php';
?>

    <main id="contenido">
      <section class="page-hero">
        <div class="container">
          <h1>Alarmas Inteligentes</h1>
          <p>Detección inmediata, sirenas potentes y avisos al celular ante intrusiones.</p>
        </div>
      </section>

      <section class="section-pad">
        <div class="container">
          <div class="row g-4 align-items-center">
            <div class="col-lg-6 order-lg-2">
              <div class="service-media" style="background-image:url('imagen/alarma.webp')" role="img" aria-label="Panel de alarma"></div>
            </div>
            <div class="col-lg-6 order-lg-1">
              <span class="eyebrow">Alarmas</span>
              <h2 class="display-heading h2">Protección activa 24/7</h2>
              <p class="lead-muted">Diseñamos el perímetro de sensores según habitaciones, accesos y mascotas. Incluye puesta en marcha y capacitación de uso.</p>
              <ul class="check-list">
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Sensores inmunes a mascotas</li>
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Contactos magnéticos</li>
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Notificaciones móviles</li>
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Sirenas de alta potencia</li>
              </ul>
              <a class="btn btn-sis" href="asesoramiento.php">Solicitar presupuesto</a>
            </div>
          </div>
        </div>
      </section>

      <section class="cta-bar">
        <div class="container d-flex flex-wrap gap-2 justify-content-between align-items-center">
          <h2 class="h4 fw-bold text-white mb-0">Combiná alarma + cámaras para mayor cobertura</h2>
          <a class="btn btn-sis" href="servicios.php">Ver servicios</a>
        </div>
      </section>
    </main>

<?php require_once 'includes/footer.php'; ?>
