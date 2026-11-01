<?php
session_start();
$titulo_pagina = "Iniciar Sesión | SIS Seguridad Electrónica";
$pagina_actual = "login";
$base_path = "../";
require_once '../includes/header.php';
require_once '../config/conexion.php';

$mensaje = "";
$tipo_mensaje = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = trim($email);

    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = trim($password);

    $errores = [];

    if (empty($email)) {
        $errores[] = "El email es obligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El formato del email no es válido.";
    }

    if (empty($password)) {
        $errores[] = "La contraseña es obligatoria.";
    }

    if (empty($errores)) {
        try {
            $sql = "SELECT id, nombre, email, password, rol FROM usuarios WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $usuario = $stmt->fetch();

            if ($usuario && password_verify($password, $usuario['password'])) {
                session_regenerate_id(true);

                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['nombre'];
                $_SESSION['usuario_email'] = $usuario['email'];
                $_SESSION['usuario_rol'] = $usuario['rol'];
                $_SESSION['login_time'] = time();

                header("Location: admin_panel.php");
                exit;
            } else {
                $mensaje = "Email o contraseña incorrectos.";
                $tipo_mensaje = "danger";
            }
        } catch (PDOException $e) {
            $mensaje = "Error al iniciar sesión: " . $e->getMessage();
            $tipo_mensaje = "danger";
        }
    } else {
        $mensaje = "Por favor, corrige los siguientes errores:";
        $tipo_mensaje = "danger";
    }
}

if (isset($_GET['error']) && $_GET['error'] === 'acceso_denegado') {
    $mensaje = "Debes iniciar sesión para acceder a esta página.";
    $tipo_mensaje = "warning";
}

if (isset($_GET['error']) && $_GET['error'] === 'logged_out') {
    $mensaje = "Has cerrado sesión correctamente.";
    $tipo_mensaje = "success";
}
?>

    <main id="contenido">
      <section class="page-hero">
        <div class="container">
          <h1>Iniciar Sesión</h1>
          <p>Accede al sistema de gestión de contratos de monitoreo.</p>
        </div>
      </section>

      <section class="section-pad">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5">
              <div class="contact-form">
                <h2 class="h3 fw-bold mb-4">Ingresar al Sistema</h2>

                <?php if (!empty($mensaje)): ?>
                  <div class="alert alert-<?= $tipo_mensaje; ?> mb-4" role="alert">
                    <?= $mensaje; ?>
                    <?php if (!empty($errores)): ?>
                      <ul class="mb-0 mt-2">
                        <?php foreach ($errores as $error): ?>
                          <li><?= htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                      </ul>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>

                <form method="POST" action="login.php">
                  <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input
                      class="form-control"
                      id="email"
                      name="email"
                      type="email"
                      placeholder="correo@ejemplo.com"
                      value="<?= htmlspecialchars($email); ?>"
                      required
                    />
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="password">Contraseña</label>
                    <input
                      class="form-control"
                      id="password"
                      name="password"
                      type="password"
                      placeholder="Tu contraseña"
                      required
                    />
                  </div>

                  <div class="mb-3 form-check">
                    <input class="form-check-input" id="recordar" name="recordar" type="checkbox">
                    <label class="form-check-label" for="recordar">Recordarme</label>
                  </div>

                  <button class="btn btn-sis w-100" type="submit" name="login">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar Sesión
                  </button>
                </form>

                <div class="text-center mt-3">
                  <p class="lead-muted mb-0">¿No tienes cuenta?</p>
                  <a href="registro.php" class="text-sis fw-bold">Registrarse</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="cta-bar">
        <div class="container d-flex flex-wrap gap-2 justify-content-between align-items-center">
          <h2 class="h4 fw-bold text-white mb-0">¿Olvidaste tu contraseña?</h2>
          <a class="btn btn-sis" href="../contacto.php">Contactar soporte</a>
        </div>
      </section>
    </main>

<?php require_once '../includes/footer.php'; ?>
