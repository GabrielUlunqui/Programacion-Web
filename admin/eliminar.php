<?php
session_start();
require_once '../config/conexion.php';
require_once '../auth/auth_guard.php';
require_once '../app/Controllers/ContratoController.php';

verificar_rol_admin();

$controller = new ContratoController($pdo);
$controller->eliminar();
