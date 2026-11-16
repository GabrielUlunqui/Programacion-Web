# Requisitos e Instalación del Proyecto

Guía para levantar el proyecto SIS Seguridad Electrónica en una computadora nueva.

El proyecto tiene dos partes:

- **Sitio principal** — PHP puro con MVC nativo (`Programacion-Web/`)
- **Módulo Laravel** — CRUD de servicios (`tp10-laravel/`)

---

## 1. Software necesario

| Software | Versión | Para qué |
|---|---|---|
| PHP | 8.2 o superior | Sitio principal y Laravel 12 |
| MySQL | 5.7+ / MariaDB | Base de datos `sis_seguridad` |
| Composer | 2.x | Instalar dependencias de Laravel (`vendor/`) |
| Git | cualquiera | Clonar el repositorio |
| Servidor web | XAMPP (Apache) o `php -S` | Servir el sitio PHP |

> **Importante:** Laravel 12 exige PHP >= 8.2. Si usás XAMPP, verificá la versión en `C:\xampp\php\php.exe -v`.

### Opción recomendada: XAMPP

Incluye Apache + MySQL/MariaDB + PHP en un solo instalador: https://www.apachefriends.org

> **Nota:** en la PC de desarrollo se usó MySQL Server 26.7 (servicio de Windows) en lugar del MySQL de XAMPP. Cualquiera de los dos funciona — lo importante es que PHP pueda conectarse.

---

## 2. Clonar el repositorio

```bash
git clone https://github.com/GabrielUlunqui/Programacion-Web.git
cd Programacion-Web
```

---

## 3. Base de datos

### 3.1 Crear la base y las tablas del sitio

En phpMyAdmin (`http://localhost/phpmyadmin`) o por consola, ejecutá los scripts en orden:

1. `config/crear_tabla.sql` — crea `sis_seguridad` + tabla `contratos_monitoreo`
2. `config/crear_tabla_usuarios.sql` — crea tabla `usuarios` + usuario admin

O por línea de comandos (ajustando credenciales):

```bash
mysql -u root -p < config/crear_tabla.sql
mysql -u root -p < config/crear_tabla_usuarios.sql
```

### 3.2 Configurar credenciales del sitio

Editá `config/conexion.php` con tu usuario/contraseña de MySQL:

```php
$host = 'localhost';
$dbname = 'sis_seguridad';
$username = 'root';
$password = 'TU_PASSWORD';
```

### 3.3 Tablas de Laravel

Las tablas de Laravel (`servicios`, `users`, `cache`, `jobs`, `migrations`) se crean con las migraciones — ver paso 5.3.

---

## 4. Instalar dependencias de Laravel

La carpeta `tp10-laravel/vendor/` **no está en el repositorio** (está gitignored). Hay que instalarla:

```bash
cd tp10-laravel
composer install
```

> Si no tenés Composer: descargá el instalador desde https://getcomposer.org o usá `composer.phar` con `php composer.phar install`.

---

## 5. Configurar Laravel

### 5.1 Archivo de entorno

```bash
cd tp10-laravel
cp .env.example .env
```

Editá `.env` y configurá la base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sis_seguridad
DB_USERNAME=root
DB_PASSWORD=TU_PASSWORD
```

> `.env` está gitignored — cada máquina tiene el suyo. `.env.example` tiene la estructura con password vacío.

### 5.2 Generar la clave de la app

```bash
php artisan key:generate
```

### 5.3 Correr migraciones y seeders

```bash
php artisan migrate --seed
```

Esto crea las tablas de Laravel y carga los 6 servicios iniciales.

> **NO uses `migrate:fresh`** — borra TODAS las tablas de `sis_seguridad`, incluidas las del sitio (`contratos_monitoreo`, `usuarios`). Usá `migrate` a secas.

---

## 6. Levantar los servidores

### 6.1 Sitio principal (PHP puro)

**Opción A — XAMPP:** copiá la carpeta del proyecto a `C:\xampp\htdocs\Programacion-Web\` y entrá a `http://localhost/Programacion-Web/`

**Opción B — servidor embebido de PHP** (sin copiar nada):

```bash
# Parate en la carpeta PADRE del proyecto
cd "C:\Users\Gabriel\Desktop\PROG WEB"
C:\xampp\php\php.exe -S localhost:8000
```

Luego entrá a `http://localhost:8000/Programacion-Web/`

> La opción B funciona porque las rutas de assets están hardcodeadas como `/Programacion-Web/...` — el docroot debe ser la carpeta padre para que esa ruta exista.

### 6.2 Laravel

```bash
cd tp10-laravel
php artisan serve --port=8001
```

Entrá a `http://localhost:8001/servicios`

---

## 7. Credenciales de prueba

| Acceso | URL | Usuario | Password |
|---|---|---|---|
| Login sitio | `/auth/login.php` | `admin@sis-seguridad.com.ar` | `admin123` |
| Panel admin | `/auth/admin_panel.php` | (tras login) | — |
| Contratos MVC | `/admin/index.php` | (tras login admin) | — |
| Laravel servicios | `http://localhost:8001/servicios` | — | — |

---

## 8. Estructura del proyecto

```
Programacion-Web/
├── app/                  # MVC nativo (TP10 Parte A)
│   ├── Models/           # Contrato.php
│   ├── Controllers/      # ContratoController.php
│   └── Views/admin/      # Vistas del CRUD
├── admin/                # Entry points del CRUD (contratos)
├── api/                  # Endpoint JSON (buscar_contratos.php)
├── auth/                 # Login, registro, sesiones, panel admin
├── config/               # conexion.php, env.php, scripts SQL
├── includes/             # header.php, footer.php
├── css/, js/, imagen/, img/
├── *.php                 # Páginas del sitio
├── readme*.md            # Documentación por unidad
└── tp10-laravel/         # Proyecto Laravel 12 (TP10 Parte B)
    ├── app/              # Modelos y controladores Eloquent
    ├── database/         # Migraciones y seeders
    ├── resources/views/  # Vistas Blade
    └── .env              # Config local (gitignored)
```

---

## 9. Troubleshooting

**"Access denied for user 'root'"**
→ La contraseña de MySQL no coincide. Revisá `config/conexion.php` y `tp10-laravel/.env`.

**Error 10048 / puerto 3306 ocupado**
→ Hay dos MySQL corriendo (ej. servicio MySQL267 + MySQL de XAMPP). Frená uno: `net stop MySQL267` en cmd como administrador, o deshabilitá el servicio en `services.msc`.

**Laravel da error de tablas**
→ Corré `php artisan migrate` dentro de `tp10-laravel`. Si la tabla `migrations` no existe, `migrate:fresh` la crea pero borra todo — en ese caso recreá las tablas del sitio con los scripts de `config/`.

**El sitio no encuentra CSS/imágenes**
→ Estás sirviendo desde la carpeta equivocada. Con `php -S` el docroot debe ser la carpeta padre (`PROG WEB`), no `Programacion-Web`.

**El botón "Gestionar Servicios" no llega a Laravel**
→ Laravel no está corriendo. Levantalo con `php artisan serve --port=8001`. La URL está en `config/env.php` → `URL_LARAVEL`.
