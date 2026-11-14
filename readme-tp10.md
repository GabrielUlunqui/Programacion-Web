# TP 10 - Refactorización a MVC e Implementación con Framework

## Descripción

Trabajo práctico dividido en dos partes complementarias:

- **Parte A:** Refactorización del módulo CRUD de contratos (`admin/`) a arquitectura MVC nativa en PHP puro.
- **Parte B:** Implementación de un módulo nuevo (catálogo de servicios) dentro de un proyecto Laravel 12.

## Parte A - MVC Nativo (PHP puro)

### Módulo Refactorizado

El módulo de gestión de contratos de monitoreo (`contratos_monitoreo`) fue reorganizado siguiendo el patrón Modelo-Vista-Controlador:

```
app/
├── Models/
│   └── Contrato.php                  # Consultas SQL con PDO y prepared statements
├── Controllers/
│   └── ContratoController.php        # Manejo de requests, validación y renderizado
└── Views/
    └── admin/
        ├── index.php                 # Listado de contratos
        ├── crear.php                 # Formulario de alta
        └── editar.php                # Formulario de edición

admin/                                # Entry points delgados (rutas)
├── index.php                         # → ContratoController::index()
├── crear.php                         # → ContratoController::crear()
├── editar.php                        # → ContratoController::editar()
└── eliminar.php                      # → ContratoController::eliminar()
```

### Responsabilidades

**Modelo (`app/Models/Contrato.php`):**
- `todos()` - Listado completo ordenado por id descendente
- `buscar($termino)` - Búsqueda con `LIKE` sobre cliente y tipo de equipo
- `buscarPorId($id)` - Consulta de un contrato por ID
- `crear($datos)` - Inserción con prepared statement
- `actualizar($id, $datos)` - Actualización con prepared statement
- `eliminar($id)` - Eliminación con prepared statement

**Controlador (`app/Controllers/ContratoController.php`):**
- `index()`, `crear()`, `editar()`, `eliminar()` - Acciones por ruta
- `leerDatosFormulario()` - Sanitización de entradas POST
- `validarContrato()` - Validación de campos (nombre, equipo, tarifa)
- `render()` - Renderizado de vistas con header/footer del sitio

**Vistas (`app/Views/admin/`):**
- HTML limpio sin lógica de negocio
- Reciben datos vía `extract()` desde el controlador

**Entry points (`admin/`):**
- Sesión + `verificar_rol_admin()` + instanciación del controlador
- Las URLs existentes se mantienen (`admin/index.php`, etc.)

### API refactorizada

`api/buscar_contratos.php` ahora utiliza el Modelo `Contrato` en lugar de consultas directas, manteniendo la autenticación por sesión y las respuestas JSON.

## Parte B - Módulo en Laravel 12

### Proyecto

Se creó un proyecto Laravel 12 (`tp10-laravel/`) con Composer. La base de datos configurada es MySQL (`sis_seguridad`).

### Módulo: Catálogo de Servicios

CRUD completo de servicios de seguridad electrónica (los mismos que ofrece SIS: cámaras, alarmas, accesos, cercos, GPS, incendios).

```
tp10-laravel/
├── app/
│   ├── Http/Controllers/ServicioController.php   # Controlador resource
│   └── Models/Servicio.php                       # Modelo Eloquent
├── database/
│   ├── migrations/...create_servicios_table.php  # Migración de la tabla
│   └── seeders/ServicioSeeder.php                # Datos iniciales (6 servicios)
├── resources/views/
│   ├── layouts/app.blade.php                     # Layout base con Bootstrap
│   └── servicios/{index,create,edit,show}.blade.php
└── routes/web.php                                # Route::resource('servicios')
```

### Componentes del Framework

**Routing (`routes/web.php`):**
```php
Route::resource('servicios', ServicioController::class);
```
Genera automáticamente las 7 rutas REST: index, create, store, show, edit, update, destroy.

**Modelo (Eloquent):**
- `App\Models\Servicio` con `$fillable` para asignación masiva
- `Servicio::orderBy('id', 'desc')->get()` - consultas fluídas
- `Servicio::create($datos)` - creación
- `$servicio->update($datos)` - actualización
- `$servicio->delete()` - eliminación

**Controlador:**
- Inyección de `Request` y route model binding (`Servicio $servicio`)
- Validación con `$request->validate()`
- Redirecciones con `redirect()->route()` y mensajes flash

**Vistas (Blade):**
- `@extends` / `@section` / `@yield` para el layout
- `@csrf` y `@method('PUT'/'DELETE')` para formularios
- `@forelse`, `@error`, `old()` para formularios con errores
- `route()` helper para URLs nombradas

**Migraciones y Seeders:**
- `php artisan migrate` crea la tabla `servicios`
- `ServicioSeeder` carga los 6 servicios del sitio

## Configuración de la Base de Datos

**Base de Datos:** sis_seguridad (MySQL)
**Tablas del módulo nativo:** contratos_monitoreo, usuarios
**Tablas del framework:** servicios + tablas internas de Laravel (users, cache, jobs, migrations)

> **Nota:** El `.env` de Laravel contiene las credenciales y está gitignored. Ver `.env.example` para la estructura.

## Estructura de Archivos

```
app/                          # MVC nativo (Parte A)
├── Models/Contrato.php
├── Controllers/ContratoController.php
└── Views/admin/{index,crear,editar}.php

admin/                        # Entry points MVC
├── index.php, crear.php, editar.php, eliminar.php

api/buscar_contratos.php      # API JSON (usa Modelo)

tp10-laravel/                 # Proyecto Laravel 12 (Parte B)
├── app/{Models, Http/Controllers}
├── database/{migrations, seeders}
├── resources/views/{layouts, servicios}
├── routes/web.php
└── .env (gitignored)
```

## Links de Acceso para Demostración

**Parte A - MVC Nativo:**
- Listado de contratos: http://localhost/Programacion-Web/admin/index.php
- Crear contrato: http://localhost/Programacion-Web/admin/crear.php
- Editar contrato: http://localhost/Programacion-Web/admin/editar.php?id=1

**Parte B - Laravel:**
- Inicio (redirige a servicios): http://localhost:8001/
- Listado de servicios: http://localhost:8001/servicios
- Nuevo servicio: http://localhost:8001/servicios/create
- Editar servicio: http://localhost:8001/servicios/1/edit

**Servidor Laravel:**
```bash
cd tp10-laravel
php artisan serve --port=8001
```

## Tecnologías Utilizadas

**Parte A:** PHP 8.2, PDO, MySQL, programación orientada a objetos

**Parte B:** Laravel 12, Eloquent ORM, Blade, Migraciones, Seeders, Bootstrap 5
