<?php
$titulo_pagina = "Servicios | SIS Seguridad Electrónica";
$pagina_actual = "servicios";
require_once 'includes/header.php';
?>

    <main id="contenido">
      <section class="page-hero text-center">
        <div class="container">
          <h1>Nuestros Servicios</h1>
          <p class="mx-auto">Soluciones profesionales de seguridad electrónica con tecnología avanzada.</p>
        </div>
      </section>

      <section id="camaras" class="section-pad">
        <div class="container">
          <div class="row align-items-center g-4 g-xl-5">
            <div class="col-lg-6">
              <div class="icon-box" aria-hidden="true"><i class="bi bi-camera-video"></i></div>
              <h2 class="display-heading h2">Cámaras de Seguridad (CCTV)</h2>
              <p class="lead-muted">Videovigilancia profesional para interior y exterior con acceso remoto seguro.</p>
              <ul class="check-list">
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Tecnología HD / 4K</li>
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Visión nocturna avanzada</li>
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Detección de movimiento</li>
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Almacenamiento local o en la nube</li>
              </ul>
              <a class="btn btn-sis" href="camaras.php">Solicitar presupuesto</a>
            </div>
            <div class="col-lg-6">
              <div class="service-media" style="background-image:url('imagen/camara.webp')" role="img" aria-label="Cámara de seguridad tipo domo"></div>
            </div>
          </div>
        </div>
      </section>

      <section id="alarmas" class="section-pad bg-soft">
        <div class="container">
          <div class="row align-items-center g-4 g-xl-5">
            <div class="col-lg-6 order-lg-2">
              <div class="icon-box" aria-hidden="true"><i class="bi bi-bell"></i></div>
              <h2 class="display-heading h2">Alarmas Inteligentes</h2>
              <p class="lead-muted">Protección activa con sensores, sirenas y avisos al celular ante eventos.</p>
              <ul class="check-list">
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Sensores inmunes a mascotas</li>
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Contactos magnéticos</li>
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Notificaciones móviles</li>
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Sirenas de alta potencia</li>
              </ul>
              <a class="btn btn-sis" href="alarmas.php">Solicitar presupuesto</a>
            </div>
            <div class="col-lg-6 order-lg-1">
              <div class="service-media" style="background-image:url('imagen/alarma.webp')" role="img" aria-label="Panel de alarma en pared"></div>
            </div>
          </div>
        </div>
      </section>

      <section id="accesos" class="section-pad">
        <div class="container">
          <div class="row align-items-center g-4 g-xl-5">
            <div class="col-lg-6">
              <div class="icon-box" aria-hidden="true"><i class="bi bi-fingerprint"></i></div>
              <h2 class="display-heading h2">Control de Accesos</h2>
              <p class="lead-muted">Gestioná quién entra y sale de tu edificio con sistemas biométricos y RFID.</p>
              <ul class="check-list">
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Cerraduras magnéticas</li>
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Reconocimiento facial</li>
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Software de administración</li>
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Reportes de asistencia</li>
              </ul>
              <a class="btn btn-sis" href="accesos.php">Solicitar presupuesto</a>
            </div>
            <div class="col-lg-6">
              <div class="service-media" style="background-image:url('imagen/acceso.webp')" role="img" aria-label="Lector de acceso en puerta de oficina"></div>
            </div>
          </div>
        </div>
      </section>

      <section id="cercos" class="section-pad bg-soft">
        <div class="container">
          <div class="row align-items-center g-4 g-xl-5">
            <div class="col-lg-6 order-lg-2">
              <div class="icon-box" aria-hidden="true"><i class="bi bi-lightning-charge"></i></div>
              <h2 class="display-heading h2">Cercos Eléctricos Perimetrales</h2>
              <p class="lead-muted">Disuasión perimetral con activación inmediata de alarma ante intentos de ingreso.</p>
              <ul class="check-list">
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Cables de acero galvanizado</li>
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Descarga pulsada no letal</li>
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Activación inmediata de alarma</li>
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Señalización normativa</li>
              </ul>
              <a class="btn btn-sis" href="asesoramiento.php">Solicitar presupuesto</a>
            </div>
            <div class="col-lg-6 order-lg-1">
              <div class="service-media" style="background-image:url('imagen/cerco.webp')" role="img" aria-label="Cerco perimetral en muro"></div>
            </div>
          </div>
        </div>
      </section>

      <section id="gps" class="section-pad">
        <div class="container">
          <div class="row align-items-center g-4 g-xl-5">
            <div class="col-lg-6">
              <div class="icon-box" aria-hidden="true"><i class="bi bi-geo-alt"></i></div>
              <h2 class="display-heading h2">Seguimiento Vehicular (GPS)</h2>
              <p class="lead-muted">Monitoreá tu flota o vehículo particular con ubicación satelital en tiempo real.</p>
              <ul class="check-list">
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Ubicación satelital en vivo</li>
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Geocercas inteligentes</li>
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Historial de recorridos</li>
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Corte de motor remoto</li>
              </ul>
              <a class="btn btn-sis" href="asesoramiento.php">Solicitar presupuesto</a>
            </div>
            <div class="col-lg-6">
              <div class="service-media" style="background-image:url('imagen/rastreo.webp')" role="img" aria-label="Seguimiento GPS en smartphone"></div>
            </div>
          </div>
        </div>
      </section>

      <section id="incendios" class="section-pad bg-soft">
        <div class="container">
          <div class="row align-items-center g-4 g-xl-5">
            <div class="col-lg-6 order-lg-2">
              <div class="icon-box" aria-hidden="true"><i class="bi bi-fire"></i></div>
              <h2 class="display-heading h2">Sistemas contra Incendios</h2>
              <p class="lead-muted">Detección temprana y alerta visual/sonora para proteger personas y bienes.</p>
              <ul class="check-list">
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Detectores de humo y temperatura</li>
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Estaciones manuales</li>
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Sirenas con strobo</li>
                <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i>Mantenimiento periódico</li>
              </ul>
              <a class="btn btn-sis" href="asesoramiento.php">Solicitar presupuesto</a>
            </div>
            <div class="col-lg-6 order-lg-1">
              <div class="service-media" style="background-image:url('imagen/fuego.webp')" role="img" aria-label="Estación de alarma contra incendios"></div>
            </div>
          </div>
        </div>
      </section>

      <section class="cta-bar">
        <div class="container">
          <div class="row align-items-center g-3">
            <div class="col-lg-7">
              <h2 class="h4 fw-bold text-white mb-1">Protegé lo que más importa</h2>
              <p class="mb-0" style="color:#94a3b8">Estamos listos para asesorarte las 24 horas del día.</p>
            </div>
            <div class="col-lg-5 d-flex flex-wrap gap-2 justify-content-lg-end">
              <a class="btn btn-sis" href="asesoramiento.php">Solicitar asesoramiento</a>
              <a class="btn btn-sis-ghost" href="https://wa.me/<?= WHATSAPP; ?>" target="_blank" rel="noopener noreferrer">Consultanos por WhatsApp</a>
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
              <li><a href="#cercos">Cercos Eléctricos</a></li>
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
