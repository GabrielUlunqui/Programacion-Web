<?php
session_start();
$titulo_pagina = "Registro de Usuario | SIS Seguridad Electrónica";
$pagina_actual = "registro";
$base_path = "../";
require_once '../includes/header.php';
require_once '../config/conexion.php';

$mensaje = "";
$tipo_mensaje = "";
$nombre = "";
$email = "";
$password = "";
$confirmar_password = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['registrarse'])) {
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS);
    $nombre = trim($nombre);

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = trim($email);

    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = trim($password);

    $confirmar_password = filter_input(INPUT_POST, 'confirmar_password', FILTER_SANITIZE_SPECIAL_CHARS);
    $confirmar_password = trim($confirmar_password);

    $errores = [];

    if (empty($nombre)) {
        $errores[] = "El nombre es obligatorio.";
    } elseif (strlen($nombre) < 3) {
        $errores[] = "El nombre debe tener al menos 3 caracteres.";
    }

    if (empty($email)) {
        $errores[] = "El email es obligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El formato del email no es válido.";
    }

    if (empty($password)) {
        $errores[] = "La contraseña es obligatoria.";
    } elseif (strlen($password) < 8) {
        $errores[] = "La contraseña debe tener al menos 8 caracteres.";
    }

    if (empty($confirmar_password)) {
        $errores[] = "Debes confirmar la contraseña.";
    } elseif ($password !== $confirmar_password) {
        $errores[] = "Las contraseñas no coinciden.";
    }

    if (empty($errores)) {
        try {
            $sql = "SELECT id FROM usuarios WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $mensaje = "El email ya está registrado.";
                $tipo_mensaje = "warning";
            } else {
                $password_hash = password_hash($password, PASSWORD_BCRYPT);
                $rol = 'usuario';

                $sql = "INSERT INTO usuarios (nombre, email, password, rol) VALUES (:nombre, :email, :password, :rol)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password_hash);
                $stmt->bindParam(':rol', $rol);
                $stmt->execute();

                $mensaje = "Usuario registrado exitosamente. Ya puedes iniciar sesión.";
                $tipo_mensaje = "success";

                $nombre = "";
                $email = "";
                $password = "";
                $confirmar_password = "";
            }
        } catch (PDOException $e) {
            $mensaje = "Error al registrar el usuario: " . $e->getMessage();
            $tipo_mensaje = "danger";
        }
    } else {
        $mensaje = "Por favor, corrige los siguientes errores:";
        $tipo_mensaje = "danger";
    }
}
?>

    <main id="contenido">
      <section class="page-hero">
        <div class="container">
          <h1>Registro de Usuario</h1>
          <p>Crea tu cuenta para acceder al sistema de gestión de contratos.</p>
        </div>
      </section>

      <section class="section-pad">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="contact-form">
                <h2 class="h3 fw-bold mb-4">Datos del Usuario</h2>

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

                <form method="POST" action="registro.php">
                  <div class="mb-3">
                    <label class="form-label" for="nombre">Nombre completo</label>
                    <input
                      class="form-control"
                      id="nombre"
                      name="nombre"
                      type="text"
                      placeholder="Ej. Juan Pérez"
                      value="<?= htmlspecialchars($nombre); ?>"
                      required
                    />
                  </div>

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
                      placeholder="Mínimo 8 caracteres"
                      required
                    />
                    <div class="form-text">La contraseña debe tener al menos 8 caracteres.</div>
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="confirmar_password">Confirmar Contraseña</label>
                    <input
                      class="form-control"
                      id="confirmar_password"
                      name="confirmar_password"
                      type="password"
                      placeholder="Repite tu contraseña"
                      required
                    />
                  </div>

                  <div class="d-flex gap-2">
                    <button class="btn btn-sis flex-grow-1" type="submit" name="registrarse">
                      <i class="bi bi-person-plus me-2"></i>Registrarse
                    </button>
                    <a class="btn btn-sis-outline flex-grow-1" href="login.php">Ya tengo cuenta</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="cta-bar">
        <div class="container d-flex flex-wrap gap-2 justify-content-between align-items-center">
          <h2 class="h4 fw-bold text-white mb-0">¿Ya tienes cuenta?</h2>
          <a class="btn btn-sis" href="login.php">Iniciar Sesión</a>
        </div>
      </section>
    </main>

<?php require_once '../includes/footer.php'; ?>
