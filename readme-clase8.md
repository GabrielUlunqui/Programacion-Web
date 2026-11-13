# Clase 8 - Manejo de Estado, Sesiones y Autenticación

## Descripción

En esta unidad se implementó el sistema completo de autenticación y gestión de sesiones utilizando PHP y MySQL, aplicando las mejores prácticas de seguridad OWASP para el manejo de contraseñas y protección de sesiones.

## Seguridad de Contraseñas

**Hashing de Contraseñas:**
- Uso de `password_hash($password, PASSWORD_BCRYPT)` para encriptar contraseñas
- Algoritmo BCRYPT con factor de coste 10 (valor por defecto seguro)
- Nunca se almacenan contraseñas en texto plano
- Longitud de campo VARCHAR(255) para almacenar el hash

**Verificación de Contraseñas:**
- Uso de `password_verify($password, $hash)` para validar credenciales
- Compara la contraseña ingresada con el hash almacenado en la base de datos
- Time-constant comparison para prevenir ataques de timing

## Gestión de Sesiones

**Inicio de Sesión Seguro:**
- `session_start()` para iniciar la sesión PHP
- `session_regenerate_id(true)` para prevenir ataques de Session Fixation
- Almacenamiento seguro de datos en `$_SESSION`:
  - `$_SESSION['usuario_id']` - ID del usuario
  - `$_SESSION['usuario_nombre']` - Nombre del usuario
  - `$_SESSION['usuario_email']` - Email del usuario
  - `$_SESSION['usuario_rol']` - Rol del usuario (admin/usuario)
  - `$_SESSION['login_time']` - Timestamp de inicio de sesión

**Cierre de Sesión Seguro:**
- Unset de `$_SESSION` para limpiar datos de sesión
- Eliminación de cookies de sesión del navegador
- `session_destroy()` para destruir completamente la sesión
- Redirección al login después del cierre

## Control de Acceso por Roles

**Roles Implementados:**
- `admin` - Acceso completo al sistema
- `usuario` - Acceso limitado

**Guardián de Rutas (auth_guard.php):**
- Verificación de sesión iniciada con `isset($_SESSION['usuario_id'])`
- Redirección automática a login.php si no está autenticado
- Función `es_admin()` para verificar rol de administrador
- Función `verificar_rol_admin()` para proteger vistas sensibles

**Vistas Protegidas:**
- `admin_panel.php` - Solo accesible para rol admin
- `gestion_usuarios.php` - Solo accesible para rol admin
- `admin/index.php`, `admin/crear.php`, `admin/editar.php`, `admin/eliminar.php` - Solo accesible para rol admin

## Archivos Implementados

### 1. Script SQL (config/crear_tabla_usuarios.sql)
- Creación de tabla `usuarios` con estructura requerida
- Campo `password` VARCHAR(255) para almacenar hash
- Campo `rol` ENUM('admin', 'usuario')
- Índice UNIQUE en campo `email`

### 2. Módulo de Registro (auth/registro.php)
- Formulario con sanitización estricta contra XSS
- Verificación de email no exista previamente en base de datos
- Encriptación de contraseña con `password_hash($password, PASSWORD_BCRYPT)`
- Consultas preparadas PDO para prevenir SQL Injection
- Validación de longitud mínima de contraseña (8 caracteres)
- Confirmación de contraseña

### 3. Módulo de Login (auth/login.php)
- Validación de credenciales con `password_verify()`
- `session_start()` para iniciar sesión
- `session_regenerate_id(true)` para mitigar Session Fixation
- Almacenamiento de datos clave en `$_SESSION`
- Redirección al panel protegido tras login exitoso
- Mensajes de error para credenciales incorrectas

### 4. Guardián de Rutas (auth/auth_guard.php)
- Verificación de sesión iniciada con `isset($_SESSION['usuario_id'])`
- Redirección a login.php?error=acceso_denegado si no autenticado
- Función `es_admin()` para verificar rol de administrador
- Función `verificar_rol_admin()` para proteger vistas sensibles
- Previene acceso no autorizado a páginas protegidas

### 5. Cierre de Sesión (auth/logout.php)
- Unset de variable superglobal `$_SESSION`
- Eliminación de cookies de sesión del navegador
- `session_destroy()` para destruir sesión completamente
- Redirección al login con mensaje de cierre de sesión

### 6. Panel de Administración (auth/admin_panel.php)
- Vista protegida accesible solo para rol admin
- Estadísticas reales de la base de datos (usuarios y contratos)
- Información de sesión del usuario logueado
- Botón de cierre de sesión
- Enlaces a gestión de usuarios y contratos

### 7. Gestión de Usuarios (auth/gestion_usuarios.php)
- Listado de todos los usuarios del sistema
- Visualización de rol de cada usuario (badge)
- Botones para editar y eliminar usuarios
- Protección para evitar que admin se elimine a sí mismo
- Integración con diseño del sitio

## Integración con el Sitio Principal

**Enlace en Menú Principal:**
- Agregado enlace "Iniciar Sesión" en navegación principal
- Accesible desde cualquier página del sitio

**Protección de Módulos Existentes:**
- Módulo CRUD TP7 (gestión de contratos) protegido con auth_guard
- Solo usuarios con rol `admin` pueden acceder a gestión de contratos
- Redirección automática a login si no está autenticado

## Medidas de Seguridad OWASP Aplicadas

### 1. Prevención de SQL Injection
- Consultas preparadas (Prepared Statements) en todas las consultas SQL
- Uso de marcadores con nombre en PDO
- Parámetros vinculados con `bindParam()`

### 2. Seguridad de Contraseñas (OWASP A02:2021)
- Hashing con BCRYPT (algoritmo seguro y lento)
- Nunca almacenar contraseñas en texto plano
- Verificación segura con `password_verify()`
- Longitud mínima de contraseña (8 caracteres)

### 3. Prevención de Session Fixation (OWASP A07:2021)
- `session_regenerate_id(true)` al iniciar sesión
- Regeneración de ID de sesión para prevenir ataques de fijación
- Almacenamiento seguro de datos sensibles en sesión

### 4. Prevención de XSS
- Sanitización de entradas con `filter_input()`
- Escaping de salidas con `htmlspecialchars()`
- Validación de todos los datos del formulario

### 5. Control de Acceso (OWASP A01:2021)
- Verificación de roles antes de permitir acceso
- Protección de rutas sensibles con auth_guard.php
- Redirección automática de usuarios no autorizados

## Estructura de Archivos

```
config/
├── crear_tabla_usuarios.sql    # Script SQL para crear tabla usuarios

auth/
├── registro.php                # Formulario de registro
├── login.php                   # Formulario de login
├── logout.php                  # Cierre de sesión
├── auth_guard.php              # Guardián de rutas
├── admin_panel.php             # Panel de administración
└── gestion_usuarios.php        # Gestión de usuarios

admin/
├── index.php                    # Listado contratos (protegido)
├── crear.php                    # Crear contrato (protegido)
├── editar.php                   # Editar contrato (protegido)
└── eliminar.php                 # Eliminar contrato (protegido)

includes/
├── header.php                   # Con enlace a login (actualizado)
└── footer.php                   # Footer del sitio
```

## Tecnologías y Funciones PHP Utilizadas

- `session_start()` - Iniciar sesión PHP
- `session_regenerate_id(true)` - Regenerar ID de sesión (anti Session Fixation)
- `session_destroy()` - Destruir sesión
- `unset()` - Limpiar variable de sesión
- `$_SESSION` - Superglobal para datos de sesión
- `password_hash()` - Hash de contraseña con BCRYPT
- `PASSWORD_BCRYPT` - Algoritmo de hashing seguro
- `password_verify()` - Verificar contraseña contra hash
- `filter_input()` - Sanitización de entradas
- `FILTER_SANITIZE_SPECIAL_CHARS` - Sanitización contra XSS
- `FILTER_SANITIZE_EMAIL` - Sanitización de email
- `isset()` - Verificar si variable está definida
- `header()` - Redirección HTTP
- `setcookie()` - Eliminar cookies de sesión
- `htmlspecialchars()` - Escaping de salida (XSS prevention)

## Configuración de la Base de Datos

**Base de Datos:** sis_seguridad
**Charset:** utf8mb4
**Collation:** utf8mb4_unicode_ci

**Tabla: usuarios**
- id (INT, PK, AI)
- nombre (VARCHAR 255)
- email (VARCHAR 255, UNIQUE)
- password (VARCHAR 255)
- rol (ENUM('admin', 'usuario'))
- created_at (TIMESTAMP)

## Instrucciones de Instalación

1. Ejecutar el script SQL en `config/crear_tabla_usuarios.sql` en phpMyAdmin
2. Configurar credenciales en `config/conexion.php` si es necesario
3. Acceder al módulo de autenticación:
   - Registro: http://localhost/Programacion-Web/auth/registro.php
   - Login: http://localhost/Programacion-Web/auth/login.php
4. Para pruebas, crear usuarios con diferentes roles (admin/usuario)
