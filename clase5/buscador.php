<?php
$titulo_pagina = "Buscador de Servicios | SIS Seguridad Electrónica";
$pagina_actual = "servicios";
$base_path = "../";
require_once '../includes/header.php';

$mensaje = "";
$tipo_mensaje = "";
$termino_busqueda = "";
$resultados = [];

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['buscar'])) {
    $termino_busqueda = filter_input(INPUT_GET, 'termino', FILTER_SANITIZE_SPECIAL_CHARS);
    $termino_busqueda = trim($termino_busqueda);

    if (empty($termino_busqueda)) {
        $mensaje = "Por favor, ingresa un término de búsqueda.";
        $tipo_mensaje = "warning";
    } elseif (strlen($termino_busqueda) < 3) {
        $mensaje = "El término de búsqueda debe tener al menos 3 caracteres.";
        $tipo_mensaje = "warning";
    } else {
        $servicios = [
            "cámaras" => [
                "titulo" => "Cámaras de Seguridad",
                "descripcion" => "Videovigilancia HD/4K con visión nocturna",
                "link" => $base_path . "camaras.php"
            ],
            "alarmas" => [
                "titulo" => "Alarmas Inteligentes",
                "descripcion" => "Sistemas inteligentes con sensores y sirenas",
                "link" => $base_path . "alarmas.php"
            ],
            "accesos" => [
                "titulo" => "Control de Accesos",
                "descripcion" => "Biometría, tarjetas RFID y software de gestión",
                "link" => $base_path . "accesos.php"
            ],
            "cercos" => [
                "titulo" => "Cercos Eléctricos",
                "descripcion" => "Perímetros energizados con activación de alarma",
                "link" => $base_path . "servicios.php#cercos"
            ],
            "gps" => [
                "titulo" => "Seguimiento Vehicular",
                "descripcion" => "GPS en tiempo real y geocercas",
                "link" => $base_path . "servicios.php#gps"
            ],
            "incendios" => [
                "titulo" => "Sistemas contra Incendios",
                "descripcion" => "Detección temprana y alarmas visuales",
                "link" => $base_path . "servicios.php#incendios"
            ]
        ];

        foreach ($servicios as $clave => $servicio) {
            if (stripos($servicio['titulo'], $termino_busqueda) !== false ||
                stripos($servicio['descripcion'], $termino_busqueda) !== false) {
                $resultados[] = $servicio;
            }
        }

        if (count($resultados) > 0) {
            $mensaje = "Se encontraron " . count($resultados) . " resultado(s) para \"" . htmlspecialchars($termino_busqueda) . "\"";
            $tipo_mensaje = "success";
        } else {
            $mensaje = "No se encontraron resultados para \"" . htmlspecialchars($termino_busqueda) . "\"";
            $tipo_mensaje = "info";
        }
    }
}
?>

    <main id="contenido">
      <section class="page-hero">
        <div class="container">
          <h1>Buscador de Servicios</h1>
          <p>Encuentra rápidamente el servicio de seguridad que necesitas.</p>
        </div>
      </section>

      <section class="section-pad">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="contact-form">
                <h2 class="h3 fw-bold mb-4">Buscar Servicios</h2>

                <?php if (!empty($mensaje)): ?>
                  <div class="alert alert-<?= $tipo_mensaje; ?> mb-4" role="alert">
                    <?= $mensaje; ?>
                  </div>
                <?php endif; ?>

                <form method="GET" action="buscador.php">
                  <div class="mb-3">
                    <label class="form-label" for="termino">Término de búsqueda</label>
                    <input
                      class="form-control"
                      id="termino"
                      name="termino"
                      type="text"
                      placeholder="Ej: cámaras, alarmas, accesos..."
                      value="<?= htmlspecialchars($termino_busqueda); ?>"
                      required
                    />
                    <div class="form-text">Busca por nombre de servicio o descripción.</div>
                  </div>
                  <button class="btn btn-sis w-100" type="submit" name="buscar">
                    <i class="bi bi-search me-2"></i>Buscar
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

      <?php if (!empty($resultados)): ?>
      <section class="section-pad bg-soft">
        <div class="container">
          <h2 class="h3 fw-bold mb-4">Resultados de la búsqueda</h2>
          <div class="row g-3">
            <?php foreach ($resultados as $resultado): ?>
            <div class="col-md-6">
              <article class="service-card">
                <div class="icon-box" aria-hidden="true">
                  <i class="bi bi-star"></i>
                </div>
                <h3 class="h5 fw-bold"><?= htmlspecialchars($resultado['titulo']); ?></h3>
                <p class="lead-muted"><?= htmlspecialchars($resultado['descripcion']); ?></p>
                <a href="<?= htmlspecialchars($resultado['link']); ?>" class="text-sis fw-bold">
                  Ver más <i class="bi bi-arrow-right"></i>
                </a>
              </article>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
      <?php endif; ?>

      <section class="cta-bar">
        <div class="container d-flex flex-wrap gap-2 justify-content-between align-items-center">
          <h2 class="h4 fw-bold text-white mb-0">¿No encontrás lo que buscás?</h2>
          <a class="btn btn-sis" href="../asesoramiento.php">Solicitar asesoramiento</a>
        </div>
      </section>
    </main>

<?php require_once '../includes/footer.php'; ?>
