<?php
$titulo_pagina = "Inicio | SIS Seguridad Electrónica";
$pagina_actual = "inicio";
require_once 'includes/header.php';
?>

    <main id="contenido">
      <section class="home-hero">
        <div class="container">
          <div class="row align-items-center g-4 g-xl-5">
            <div class="col-lg-6">
              <span class="eyebrow">Líderes en Salta</span>
              <h1>Seguridad inteligente para lo que más importa</h1>
              <p class="lead-muted mt-3 mb-4">
                Diseñamos, instalamos y damos soporte a sistemas de seguridad
                electrónica para hogares, comercios e industrias en toda la
                provincia de Salta.
              </p>
              <div class="d-flex flex-wrap gap-2">
                <a class="btn btn-sis" href="servicios.php"
                  >Conocé nuestros servicios</a
                >
                <a class="btn btn-sis-outline" href="asesoramiento.php"
                  >Solicitar asesoramiento</a
                >
              </div>
            </div>
            <div class="col-lg-6">
              <div
                class="home-hero-media"
                role="img"
                aria-label="Centro de monitoreo de seguridad con pantallas"
              ></div>
            </div>
          </div>
        </div>
      </section>

      <section class="section-pad pt-4" aria-labelledby="valores-title">
        <div class="container">
          <h2 id="valores-title" class="visually-hidden">
            Por qué confiar en SIS
          </h2>
          <div class="row g-3">
            <div class="col-md-4">
              <article class="value-card">
                <div class="icon-box" aria-hidden="true">
                  <i class="bi bi-phone"></i>
                </div>
                <h3 class="h5 fw-bold">Tecnología de vanguardia</h3>
                <p class="lead-muted mb-0">
                  Equipamiento profesional con monitoreo remoto y alertas en
                  tiempo real.
                </p>
              </article>
            </div>
            <div class="col-md-4">
              <article class="value-card">
                <div class="icon-box" aria-hidden="true">
                  <i class="bi bi-headset"></i>
                </div>
                <h3 class="h5 fw-bold">Soporte especializado</h3>
                <p class="lead-muted mb-0">
                  Equipo técnico local para instalación, mantenimiento y
                  respuesta rápida.
                </p>
              </article>
            </div>
            <div class="col-md-4">
              <article class="value-card">
                <div class="icon-box" aria-hidden="true">
                  <i class="bi bi-shield-check"></i>
                </div>
                <h3 class="h5 fw-bold">Confianza y respaldo</h3>
                <p class="lead-muted mb-0">
                  Proyectos a medida con garantías claras y acompañamiento
                  continuo.
                </p>
              </article>
            </div>
          </div>
        </div>
      </section>

      <section class="section-pad bg-soft" aria-labelledby="servicios-title">
        <div class="container">
          <div class="text-center mb-5">
            <span class="eyebrow">Nuestros servicios</span>
            <h2 id="servicios-title" class="display-heading h1">
              Soluciones integrales de seguridad
            </h2>
          </div>
          <div class="row g-3">
            <div class="col-md-6 col-lg-4">
              <article class="service-card">
                <div class="icon-box" aria-hidden="true">
                  <i class="bi bi-camera-video"></i>
                </div>
                <h3 class="h5 fw-bold">Cámaras de Seguridad</h3>
                <p class="lead-muted">
                  Videovigilancia HD/4K con visión nocturna y acceso desde el
                  celular.
                </p>
                <a href="camaras.php" class="text-sis fw-bold"
                  >Ver más <i class="bi bi-arrow-right"></i
                ></a>
              </article>
            </div>
            <div class="col-md-6 col-lg-4">
              <article class="service-card">
                <div class="icon-box" aria-hidden="true">
                  <i class="bi bi-bell"></i>
                </div>
                <h3 class="h5 fw-bold">Alarmas</h3>
                <p class="lead-muted">
                  Sistemas inteligentes con sensores, sirenas y notificaciones
                  móviles.
                </p>
                <a href="alarmas.php" class="text-sis fw-bold"
                  >Ver más <i class="bi bi-arrow-right"></i
                ></a>
              </article>
            </div>
            <div class="col-md-6 col-lg-4">
              <article class="service-card">
                <div class="icon-box" aria-hidden="true">
                  <i class="bi bi-fingerprint"></i>
                </div>
                <h3 class="h5 fw-bold">Control de Accesos</h3>
                <p class="lead-muted">
                  Biometría, tarjetas RFID y software de gestión para empresas.
                </p>
                <a href="accesos.php" class="text-sis fw-bold"
                  >Ver más <i class="bi bi-arrow-right"></i
                ></a>
              </article>
            </div>
            <div class="col-md-6 col-lg-4">
              <article class="service-card">
                <div class="icon-box" aria-hidden="true">
                  <i class="bi bi-lightning-charge"></i>
                </div>
                <h3 class="h5 fw-bold">Cercos Eléctricos</h3>
                <p class="lead-muted">
                  Perímetros energizados con señalización y activación de
                  alarma.
                </p>
                <a href="servicios.php#cercos" class="text-sis fw-bold"
                  >Ver más <i class="bi bi-arrow-right"></i
                ></a>
              </article>
            </div>
            <div class="col-md-6 col-lg-4">
              <article class="service-card">
                <div class="icon-box" aria-hidden="true">
                  <i class="bi bi-geo-alt"></i>
                </div>
                <h3 class="h5 fw-bold">Seguimiento Vehicular</h3>
                <p class="lead-muted">
                  GPS en tiempo real, geocercas e historial de recorridos.
                </p>
                <a href="servicios.php#gps" class="text-sis fw-bold"
                  >Ver más <i class="bi bi-arrow-right"></i
                ></a>
              </article>
            </div>
            <div class="col-md-6 col-lg-4">
              <article class="service-card">
                <div class="icon-box" aria-hidden="true">
                  <i class="bi bi-fire"></i>
                </div>
                <h3 class="h5 fw-bold">Sistemas contra Incendios</h3>
                <p class="lead-muted">
                  Detección temprana, alarmas visuales y mantenimiento
                  periódico.
                </p>
                <a href="servicios.php#incendios" class="text-sis fw-bold"
                  >Ver más <i class="bi bi-arrow-right"></i
                ></a>
              </article>
            </div>
          </div>
        </div>
      </section>

      <section class="section-pad" aria-labelledby="porque-title">
        <div class="container">
          <div class="text-center mb-5">
            <span class="eyebrow">Diferenciales</span>
            <h2 id="porque-title" class="display-heading h1">
              ¿Por qué elegir SIS?
            </h2>
          </div>
          <div class="row g-3">
            <div class="col-md-6 col-lg-3">
              <article class="reason-card">
                <div class="reason-number">01</div>
                <div class="icon-box" aria-hidden="true">
                  <i class="bi bi-cpu"></i>
                </div>
                <h3 class="h5 fw-bold">Tecnología profesional</h3>
                <p class="lead-muted mb-0">
                  Marcas confiables y configuración según el riesgo de cada
                  espacio.
                </p>
              </article>
            </div>
            <div class="col-md-6 col-lg-3">
              <article class="reason-card">
                <div class="reason-number">02</div>
                <div class="icon-box" aria-hidden="true">
                  <i class="bi bi-house-lock"></i>
                </div>
                <h3 class="h5 fw-bold">Seguridad a medida</h3>
                <p class="lead-muted mb-0">
                  Diseños personalizados para residencias, comercios e
                  industrias.
                </p>
              </article>
            </div>
            <div class="col-md-6 col-lg-3">
              <article class="reason-card">
                <div class="reason-number">03</div>
                <div class="icon-box" aria-hidden="true">
                  <i class="bi bi-people"></i>
                </div>
                <h3 class="h5 fw-bold">Asesoramiento especializado</h3>
                <p class="lead-muted mb-0">
                  Te guiamos en la elección de la solución más eficiente.
                </p>
              </article>
            </div>
            <div class="col-md-6 col-lg-3">
              <article class="reason-card">
                <div class="reason-number">04</div>
                <div class="icon-box" aria-hidden="true">
                  <i class="bi bi-tools"></i>
                </div>
                <h3 class="h5 fw-bold">Soporte técnico</h3>
                <p class="lead-muted mb-0">
                  Mantenimiento, revisiones y asistencia cuando lo necesitás.
                </p>
              </article>
            </div>
          </div>
        </div>
      </section>

      <section class="section-pad bg-soft" aria-labelledby="proceso-title">
        <div class="container">
          <div class="text-center mb-5">
            <span class="eyebrow">Método</span>
            <h2 id="proceso-title" class="display-heading h1">
              Cómo trabajamos
            </h2>
          </div>
          <div class="row g-4 process-row">
            <div class="col-md-6 col-lg-3">
              <div class="process-step">
                <div class="process-circle" aria-hidden="true">
                  <i class="bi bi-chat-dots"></i>
                </div>
                <h3 class="h5 fw-bold">01 Asesoramiento</h3>
                <p class="lead-muted">
                  Escuchamos tu necesidad y proponemos la mejor alternativa.
                </p>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="process-step">
                <div class="process-circle" aria-hidden="true">
                  <i class="bi bi-clipboard-check"></i>
                </div>
                <h3 class="h5 fw-bold">02 Relevamiento</h3>
                <p class="lead-muted">
                  Analizamos el sitio para definir puntos críticos y cobertura.
                </p>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="process-step">
                <div class="process-circle" aria-hidden="true">
                  <i class="bi bi-wrench-adjustable"></i>
                </div>
                <h3 class="h5 fw-bold">03 Instalación</h3>
                <p class="lead-muted">
                  Montaje profesional, pruebas y puesta en marcha del sistema.
                </p>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="process-step">
                <div class="process-circle" aria-hidden="true">
                  <i class="bi bi-life-preserver"></i>
                </div>
                <h3 class="h5 fw-bold">04 Soporte</h3>
                <p class="lead-muted">
                  Acompañamiento postventa y soporte técnico continuo.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section-pad">
        <div class="container">
          <div class="cta-banner">
            <div class="row g-0 align-items-stretch">
              <div class="col-lg-7 p-4 p-lg-5">
                <h2 class="h1 fw-bold text-white mb-3">
                  Tranquilidad que se siente
                </h2>
                <p class="mb-4" style="color: #94a3b8">
                  Protegé tu hogar, negocio o flota con un sistema pensado para
                  vos. Coordiná una visita técnica sin cargo.
                </p>
                <a class="btn btn-sis" href="asesoramiento.php"
                  >Quiero mi asesoramiento</a
                >
              </div>
              <div class="col-lg-5">
                <div
                  class="cta-banner-media h-100"
                  role="img"
                  aria-label="Cámara de seguridad exterior"
                ></div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section-pad bg-soft" aria-labelledby="faq-title">
        <div class="container">
          <div class="text-center mb-5">
            <span class="eyebrow">FAQ</span>
            <h2 id="faq-title" class="display-heading h1">
              Preguntas frecuentes
            </h2>
          </div>
          <div class="row g-3">
            <div class="col-lg-6">
              <div class="faq-item">
                <button type="button" aria-expanded="false">
                  ¿Qué tipo de cámaras necesito?
                  <i class="bi bi-plus-lg" aria-hidden="true"></i>
                </button>
                <div class="faq-body">
                  Depende del entorno: interior, exterior, iluminación y
                  cobertura. Te recomendamos el kit ideal tras un relevamiento.
                </div>
              </div>
              <div class="faq-item">
                <button type="button" aria-expanded="false">
                  ¿Las alarmas funcionan sin internet?
                  <i class="bi bi-plus-lg" aria-hidden="true"></i>
                </button>
                <div class="faq-body">
                  Sí. Pueden operar de forma local y sumar conectividad para
                  avisos remotos cuando hay red disponible.
                </div>
              </div>
              <div class="faq-item">
                <button type="button" aria-expanded="false">
                  ¿Trabajan con empresas?
                  <i class="bi bi-plus-lg" aria-hidden="true"></i>
                </button>
                <div class="faq-body">
                  Sí. Atendemos comercios, industrias y edificios con soluciones
                  de acceso, CCTV y monitoreo.
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="faq-item">
                <button type="button" aria-expanded="false">
                  ¿Cuánto tarda una instalación?
                  <i class="bi bi-plus-lg" aria-hidden="true"></i>
                </button>
                <div class="faq-body">
                  Un proyecto residencial suele resolverse en 1 a 2 jornadas;
                  obras mayores se planifican por etapas.
                </div>
              </div>
              <div class="faq-item">
                <button type="button" aria-expanded="false">
                  ¿Ofrecen mantenimiento?
                  <i class="bi bi-plus-lg" aria-hidden="true"></i>
                </button>
                <div class="faq-body">
                  Contamos con planes de mantenimiento preventivo y soporte
                  correctivo a demanda.
                </div>
              </div>
              <div class="faq-item">
                <button type="button" aria-expanded="false">
                  ¿Puedo ver las cámaras desde el celular?
                  <i class="bi bi-plus-lg" aria-hidden="true"></i>
                </button>
                <div class="faq-body">
                  Sí. Configuramos apps seguras para visualización remota y
                  notificaciones de eventos.
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="cta-bar" aria-labelledby="cta-final-title">
        <div class="container">
          <div class="row align-items-center g-3">
            <div class="col-lg-7 d-flex align-items-start gap-3">
              <div
                class="icon-circle mb-0 bg-sis text-white"
                aria-hidden="true"
              >
                <i class="bi bi-shield-fill-check"></i>
              </div>
              <div>
                <h2 id="cta-final-title" class="h4 fw-bold text-white mb-1">
                  Protegé lo que más importa
                </h2>
                <p class="mb-0" style="color: #94a3b8">
                  Estamos listos para asesorarte las 24 horas del día.
                </p>
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

<?php require_once 'includes/footer.php'; ?>
