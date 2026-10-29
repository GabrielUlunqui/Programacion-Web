<?php
require_once __DIR__ . '/../config/env.php';
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="description"
      content="SIS Seguridad Electrónica en Salta. Cámaras, alarmas, control de accesos y soluciones integrales."
    />
    <title><?= $titulo_pagina ?? 'SIS Seguridad Electrónica'; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
      rel="stylesheet"
    />
    <link rel="icon" href="imagen/Logo-final.jpeg" type="image/jpeg" />
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body>
    <a class="skip-link" href="#contenido">Saltar al contenido</a>

    <header>
      <nav
        class="navbar navbar-expand-lg sis-navbar sticky-top"
        aria-label="Navegación principal"
      >
        <div class="container">
          <a class="navbar-brand sis-brand" href="index.php">
            <img
              class="sis-logo-img"
              src="imagen/Logo-final.jpeg"
              alt="SIS Seguridad Electrónica"
              width="280"
              height="88"
            />
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNav"
            aria-controls="mainNav"
            aria-expanded="false"
            aria-label="Abrir menú"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav mx-lg-auto sis-nav mb-3 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link <?= $pagina_actual === 'inicio' ? 'active' : ''; ?>" href="index.php" <?= $pagina_actual === 'inicio' ? 'aria-current="page"' : ''; ?>>Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $pagina_actual === 'nosotros' ? 'active' : ''; ?>" href="nosotros.php">Nosotros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $pagina_actual === 'servicios' ? 'active' : ''; ?>" href="servicios.php">Servicios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $pagina_actual === 'soluciones' ? 'active' : ''; ?>" href="soluciones.php">Soluciones</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $pagina_actual === 'contacto' ? 'active' : ''; ?>" href="contacto.php">Contacto</a>
              </li>
            </ul>
            <a class="btn btn-sis" href="asesoramiento.php">Solicitar asesoramiento</a>
          </div>
        </div>
      </nav>
    </header>
