<?php

require_once __DIR__ . '/../Models/Contrato.php';

class ContratoController
{
    private Contrato $contratos;

    public function __construct(PDO $pdo)
    {
        $this->contratos = new Contrato($pdo);
    }

    public function index(): void
    {
        $this->render('index', [
            'titulo_pagina' => 'Gestión de Contratos | SIS Seguridad Electrónica',
            'contratos' => $this->contratos->todos(),
        ]);
    }

    public function crear(): void
    {
        $nombre_cliente = '';
        $tipo_equipo = '';
        $tarifa_mensual = '';
        $mensaje = '';
        $tipo_mensaje = '';
        $errores = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['crear'])) {
            [$nombre_cliente, $tipo_equipo, $tarifa_mensual] = $this->leerDatosFormulario();
            $errores = $this->validarContrato($nombre_cliente, $tipo_equipo, $tarifa_mensual);

            if (empty($errores)) {
                try {
                    $this->contratos->crear([
                        'nombre_cliente' => $nombre_cliente,
                        'tipo_equipo' => $tipo_equipo,
                        'tarifa_mensual' => $tarifa_mensual,
                    ]);
                    $mensaje = "Contrato creado exitosamente.";
                    $tipo_mensaje = "success";
                    $nombre_cliente = '';
                    $tipo_equipo = '';
                    $tarifa_mensual = '';
                } catch (PDOException $e) {
                    $mensaje = "Error al crear el contrato: " . $e->getMessage();
                    $tipo_mensaje = "danger";
                }
            } else {
                $mensaje = "Por favor, corrige los siguientes errores:";
                $tipo_mensaje = "danger";
            }
        }

        $this->render('crear', [
            'titulo_pagina' => 'Crear Contrato | SIS Seguridad Electrónica',
            'mensaje' => $mensaje,
            'tipo_mensaje' => $tipo_mensaje,
            'errores' => $errores,
            'nombre_cliente' => $nombre_cliente,
            'tipo_equipo' => $tipo_equipo,
            'tarifa_mensual' => $tarifa_mensual,
        ]);
    }

    public function editar(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        if (!$id) {
            header("Location: index.php");
            exit;
        }

        $contrato = $this->contratos->buscarPorId((int) $id);

        if (!$contrato) {
            header("Location: index.php");
            exit;
        }

        $nombre_cliente = $contrato['nombre_cliente'];
        $tipo_equipo = $contrato['tipo_equipo'];
        $tarifa_mensual = $contrato['tarifa_mensual'];
        $mensaje = '';
        $tipo_mensaje = '';
        $errores = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['actualizar'])) {
            [$nombre_cliente, $tipo_equipo, $tarifa_mensual] = $this->leerDatosFormulario();
            $errores = $this->validarContrato($nombre_cliente, $tipo_equipo, $tarifa_mensual);

            if (empty($errores)) {
                try {
                    $this->contratos->actualizar((int) $id, [
                        'nombre_cliente' => $nombre_cliente,
                        'tipo_equipo' => $tipo_equipo,
                        'tarifa_mensual' => $tarifa_mensual,
                    ]);
                    $mensaje = "Contrato actualizado exitosamente.";
                    $tipo_mensaje = "success";
                } catch (PDOException $e) {
                    $mensaje = "Error al actualizar el contrato: " . $e->getMessage();
                    $tipo_mensaje = "danger";
                }
            } else {
                $mensaje = "Por favor, corrige los siguientes errores:";
                $tipo_mensaje = "danger";
            }
        }

        $this->render('editar', [
            'titulo_pagina' => 'Editar Contrato | SIS Seguridad Electrónica',
            'id' => $id,
            'mensaje' => $mensaje,
            'tipo_mensaje' => $tipo_mensaje,
            'errores' => $errores,
            'nombre_cliente' => $nombre_cliente,
            'tipo_equipo' => $tipo_equipo,
            'tarifa_mensual' => $tarifa_mensual,
        ]);
    }

    public function eliminar(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        if (!$id) {
            header("Location: index.php");
            exit;
        }

        try {
            $contrato = $this->contratos->buscarPorId((int) $id);

            if (!$contrato) {
                header("Location: index.php?error=" . urlencode("El contrato no existe."));
                exit;
            }

            $this->contratos->eliminar((int) $id);
            header("Location: index.php?eliminado=1");
            exit;
        } catch (PDOException $e) {
            header("Location: index.php?error=" . urlencode($e->getMessage()));
            exit;
        }
    }

    private function leerDatosFormulario(): array
    {
        $nombre_cliente = filter_input(INPUT_POST, 'nombre_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
        $nombre_cliente = trim($nombre_cliente);

        $tipo_equipo = filter_input(INPUT_POST, 'tipo_equipo', FILTER_SANITIZE_SPECIAL_CHARS);
        $tipo_equipo = trim($tipo_equipo);

        $tarifa_mensual = filter_input(INPUT_POST, 'tarifa_mensual', FILTER_SANITIZE_NUMBER_FLOAT);
        $tarifa_mensual = trim($tarifa_mensual);

        return [$nombre_cliente, $tipo_equipo, $tarifa_mensual];
    }

    private function validarContrato(string $nombre_cliente, string $tipo_equipo, string $tarifa_mensual): array
    {
        $errores = [];

        if (empty($nombre_cliente)) {
            $errores[] = "El nombre del cliente es obligatorio.";
        } elseif (strlen($nombre_cliente) < 3) {
            $errores[] = "El nombre debe tener al menos 3 caracteres.";
        }

        if (empty($tipo_equipo)) {
            $errores[] = "El tipo de equipo es obligatorio.";
        }

        if (empty($tarifa_mensual)) {
            $errores[] = "La tarifa mensual es obligatoria.";
        } elseif (!is_numeric($tarifa_mensual) || $tarifa_mensual <= 0) {
            $errores[] = "La tarifa debe ser un número positivo.";
        }

        return $errores;
    }

    private function render(string $vista, array $datos = []): void
    {
        extract($datos);
        $base_path = '../';
        $pagina_actual = 'admin';

        require dirname(__DIR__, 2) . '/includes/header.php';
        require __DIR__ . '/../Views/admin/' . $vista . '.php';
        require dirname(__DIR__, 2) . '/includes/footer.php';
    }
}
