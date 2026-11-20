<?php
session_start();
$titulo_pagina = "Editar Usuario | SIS Seguridad Electrónica";
$pagina_actual = "admin";
$base_path = "../";
require_once '../includes/header.php';
require_once '../auth/auth_guard.php';
require_once '../config/conexion.php';

verificar_rol_admin();

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
}

$usuario = null;
if ($id) {
    $sql = "SELECT id, nombre, email, rol FROM usuarios WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $usuario = $stmt->fetch();
}

if (!$usuario) {
    $_SESSION['mensaje'] = "El usuario solicitado no existe.";
    $_SESSION['tipo_mensaje'] = "danger";
    header("Location: gestion_usuarios.php");
    exit;
}

$mensaje = "";
$tipo_mensaje = "";
$errores = [];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['guardar'])) {
    $nombre = trim(filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $password = trim((string) filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS));
    $confirmar_password = trim((string) filter_input(INPUT_POST, 'confirmar_password', FILTER_SANITIZE_SPECIAL_CHARS));
    $rol = filter_input(INPUT_POST, 'rol', FILTER_SANITIZE_SPECIAL_CHARS);

    if (!in_array($rol, ['admin', 'usuario'], true)) {
        $rol = 'usuario';
    }

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

    $cambia_password = ($password !== '' || $confirmar_password !== '');
    if ($cambia_password) {
        if (strlen($password) < 8) {
            $errores[] = "La contraseña debe tener al menos 8 caracteres.";
        }
        if ($password !== $confirmar_password) {
            $errores[] = "Las contraseñas no coinciden.";
        }
    }

    if (empty($errores)) {
        try {
            $sql = "SELECT id FROM usuarios WHERE email = :email AND id != :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $mensaje = "El email ya está registrado por otro usuario.";
                $tipo_mensaje = "warning";
            } else {
                if ($cambia_password) {
                    $password_hash = password_hash($password, PASSWORD_BCRYPT);
                    $sql = "UPDATE usuarios SET nombre = :nombre, email = :email, rol = :rol, password = :password WHERE id = :id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':password', $password_hash);
                } else {
                    $sql = "UPDATE usuarios SET nombre = :nombre, email = :email, rol = :rol WHERE id = :id";
                    $stmt = $pdo->prepare($sql);
                }
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':rol', $rol);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();

                if ((int) $id === (int) $_SESSION['usuario_id']) {
                    $_SESSION['usuario_nombre'] = $nombre;
                    $_SESSION['usuario_rol'] = $rol;
                }

                $_SESSION['mensaje'] = "Usuario actualizado exitosamente.";
                $_SESSION['tipo_mensaje'] = "success";
                header("Location: gestion_usuarios.php");
                exit;
            }
        } catch (PDOException $e) {
            $mensaje = "Error al actualizar el usuario: " . $e->getMessage();
            $tipo_mensaje = "danger";
        }
    } else {
        $mensaje = "Por favor, corrige los siguientes errores:";
        $tipo_mensaje = "danger";
    }

    $usuario['nombre'] = $nombre;
    $usuario['email'] = $email;
    $usuario['rol'] = $rol;
}
?>

    <main id="contenido">
      <section class="page-hero">
        <div class="container">
          <h1>Editar Usuario</h1>
          <p>Modificación de los datos del usuario #<?= htmlspecialchars($usuario['id']); ?>.</p>
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

                <form method="POST" action="editar_usuario.php?id=<?= htmlspecialchars($usuario['id']); ?>">
                  <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']); ?>" />

                  <div class="mb-3">
                    <label class="form-label" for="nombre">Nombre completo</label>
                    <input
                      class="form-control"
                      id="nombre"
                      name="nombre"
                      type="text"
                      value="<?= htmlspecialchars($usuario['nombre']); ?>"
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
                      value="<?= htmlspecialchars($usuario['email']); ?>"
                      required
                    />
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="password">Nueva contraseña</label>
                    <input
                      class="form-control"
                      id="password"
                      name="password"
                      type="password"
                      placeholder="Dejar en blanco para no cambiar"
                    />
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="confirmar_password">Confirmar nueva contraseña</label>
                    <input
                      class="form-control"
                      id="confirmar_password"
                      name="confirmar_password"
                      type="password"
                      placeholder="Repite la nueva contraseña"
                    />
                    <div class="form-text">Completa ambos campos solo si querés cambiar la contraseña.</div>
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="rol">Rol</label>
                    <select class="form-select" id="rol" name="rol" required>
                      <option value="usuario" <?= $usuario['rol'] === 'usuario' ? 'selected' : ''; ?>>Usuario</option>
                      <option value="admin" <?= $usuario['rol'] === 'admin' ? 'selected' : ''; ?>>Administrador</option>
                    </select>
                  </div>

                  <div class="d-flex gap-2">
                    <button class="btn btn-sis flex-grow-1" type="submit" name="guardar">
                      <i class="bi bi-check-lg me-2"></i>Guardar Cambios
                    </button>
                    <a class="btn btn-sis-outline flex-grow-1" href="gestion_usuarios.php">Cancelar</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php require_once '../includes/footer.php'; ?>
