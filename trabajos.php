<?php
$titulo_pagina = "Nuestros Trabajos | SIS Seguridad Electrónica";
$pagina_actual = "trabajos";
require_once 'includes/header.php';
?>

    <main id="contenido">
      <section class="page-hero">
        <div class="container">
          <h1>Nuestros Trabajos</h1>
          <p>Casos reales y proyectos de seguridad que respaldan nuestro servicio.</p>
        </div>
      </section>

      <section class="section-pad">
        <div class="container">
          <div class="row g-4">
            <div class="col-md-6 col-lg-4">
              <article class="project-card">
                <img src="imagen/casa.webp" alt="Residencia con sistema de seguridad" width="600" height="190" />
                <div class="card-body">
                  <p class="location-badge"><i class="bi bi-geo-alt-fill" aria-hidden="true"></i> Salta, Argentina</p>
                  <h2 class="h5 fw-bold">Seguridad Residencial Tres Cerritos</h2>
                  <p class="lead-muted">CCTV 4K, alarma perimetral y app de monitoreo para una vivienda familiar.</p>
                  <a href="contacto.php" class="text-sis fw-bold">Ver detalles del proyecto <i class="bi bi-chevron-right"></i></a>
                </div>
              </article>
            </div>
            <div class="col-md-6 col-lg-4">
              <article class="project-card">
                <img src="imagen/comercio.webp" alt="Local comercial" width="600" height="190" />
                <div class="card-body">
                  <p class="location-badge"><i class="bi bi-geo-alt-fill" aria-hidden="true"></i> Salta, Argentina</p>
                  <h2 class="h5 fw-bold">Monitoreo Comercial Centro</h2>
                  <p class="lead-muted">Cámaras IP, DVR y alertas móviles para un local de alto tránsito.</p>
                  <a href="contacto.php" class="text-sis fw-bold">Ver detalles del proyecto <i class="bi bi-chevron-right"></i></a>
                </div>
              </article>
            </div>
            <div class="col-md-6 col-lg-4">
              <article class="project-card">
                <img src="imagen/cerco-barrio.webp" alt="Cerco eléctrico perimetral" width="600" height="190" />
                <div class="card-body">
                  <p class="location-badge"><i class="bi bi-geo-alt-fill" aria-hidden="true"></i> Salta, Argentina</p>
                  <h2 class="h5 fw-bold">Cerco Perimetral Industrial</h2>
                  <p class="lead-muted">Cerco electrificado con integración a central de alarma y señalización.</p>
                  <a href="contacto.php" class="text-sis fw-bold">Ver detalles del proyecto <i class="bi bi-chevron-right"></i></a>
                </div>
              </article>
            </div>
            <div class="col-md-6 col-lg-4">
              <article class="project-card">
                <img src="imagen/acceso.webp" alt="Oficina moderna" width="600" height="190" />
                <div class="card-body">
                  <p class="location-badge"><i class="bi bi-geo-alt-fill" aria-hidden="true"></i> Salta, Argentina</p>
                  <h2 class="h5 fw-bold">Control de Accesos Corporativo</h2>
                  <p class="lead-muted">Biometría, tarjetas RFID y reportes de ingreso para oficinas.</p>
                  <a href="contacto.php" class="text-sis fw-bold">Ver detalles del proyecto <i class="bi bi-chevron-right"></i></a>
                </div>
              </article>
            </div>
            <div class="col-md-6 col-lg-4">
              <article class="project-card">
                <img src="imagen/fuego.webp" alt="Depósito industrial" width="600" height="190" />
                <div class="card-body">
                  <p class="location-badge"><i class="bi bi-geo-alt-fill" aria-hidden="true"></i> Salta, Argentina</p>
                  <h2 class="h5 fw-bold">Detección contra Incendios</h2>
                  <p class="lead-muted">Detectores, estaciones manuales y sirenas en depósito logístico.</p>
                  <a href="contacto.php" class="text-sis fw-bold">Ver detalles del proyecto <i class="bi bi-chevron-right"></i></a>
                </div>
              </article>
            </div>
            <div class="col-md-6 col-lg-4">
              <article class="project-card">
                <img src="imagen/flota.webp" alt="Flota de vehículos" width="600" height="190" />
                <div class="card-body">
                  <p class="location-badge"><i class="bi bi-geo-alt-fill" aria-hidden="true"></i> Salta, Argentina</p>
                  <h2 class="h5 fw-bold">Monitoreo de Flota</h2>
                  <p class="lead-muted">GPS en tiempo real, geocercas e historial para 18 vehículos.</p>
                  <a href="contacto.php" class="text-sis fw-bold">Ver detalles del proyecto <i class="bi bi-chevron-right"></i></a>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>

      <section class="section-pad bg-soft">
        <div class="container">
          <div class="text-center mb-5">
            <span class="eyebrow">Testimonios reales</span>
            <h2 class="display-heading h1">Lo que dicen nuestros clientes</h2>
          </div>
          <div class="row g-3">
            <div class="col-md-4">
              <article class="testimonial-card">
                <div class="stars" aria-label="5 de 5 estrellas">★★★★★</div>
                <p class="lead-muted">“Excelente asesoramiento e instalación impecable. Ahora veo las cámaras desde el celular.”</p>
                <strong>Carlos Mendoza</strong>
                <div class="lead-muted">Local Comercial Salta</div>
              </article>
            </div>
            <div class="col-md-4">
              <article class="testimonial-card">
                <div class="stars" aria-label="5 de 5 estrellas">★★★★★</div>
                <p class="lead-muted">“El equipo fue claro con el presupuesto y cumplió los plazos. Muy recomendables.”</p>
                <strong>Laura Ríos</strong>
                <div class="lead-muted">Residencia Tres Cerritos</div>
              </article>
            </div>
            <div class="col-md-4">
              <article class="testimonial-card">
                <div class="stars" aria-label="5 de 5 estrellas">★★★★★</div>
                <p class="lead-muted">“Nos resolvieron el control de accesos de la oficina y el soporte sigue impecable.”</p>
                <strong>Martín Acosta</strong>
                <div class="lead-muted">Empresa de servicios</div>
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
            <div class="col-lg-5 d-flex flex-column align-items-lg-end gap-2">
              <a class="btn btn-sis" href="asesoramiento.php">Solicitar asesoramiento</a>
              <a class="text-white" href="https://wa.me/<?= WHATSAPP; ?>" target="_blank" rel="noopener noreferrer"><i class="bi bi-whatsapp"></i> O escribinos por WhatsApp</a>
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
