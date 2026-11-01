# Instrucciones para Configurar el Módulo CRUD - Trabajo Práctico N° 7

## Configuración de la Base de Datos

### 1. Crear la Base de Datos y Tabla

Opción A: Usar phpMyAdmin
1. Abre phpMyAdmin (http://localhost/phpmyadmin)
2. Ejecuta el script SQL ubicado en `config/crear_tabla.sql`
3. O crea manualmente la base de datos `sis_seguridad` y la tabla `contratos_monitoreo`

Opción B: Usar línea de comandos
```bash
mysql -u root -p < config/crear_tabla.sql
```

### 2. Configurar la Conexión

El archivo `config/conexion.php` ya está configurado con los valores por defecto de XAMPP:
- Host: localhost
- Usuario: root
- Contraseña: (vacía)
- Base de datos: sis_seguridad

Si necesitas cambiar estos valores, edita el archivo `config/conexion.php`.

## Estructura de la Tabla

```sql
CREATE TABLE contratos_monitoreo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_cliente VARCHAR(255) NOT NULL,
    tipo_equipo VARCHAR(255) NOT NULL,
    tarifa_mensual DECIMAL(10, 2) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

## Uso del Módulo CRUD

### Archivos Implementados

1. **admin/index.php** - Listado de todos los contratos
   - URL: http://localhost/Programacion-Web/admin/index.php
   - Muestra tabla con todos los contratos
   - Botones para editar y eliminar

2. **admin/crear.php** - Formulario de alta
   - URL: http://localhost/Programacion-Web/admin/crear.php
   - Formulario para crear nuevos contratos
   - Validación en servidor
   - Sanitización de entradas

3. **admin/editar.php** - Formulario de edición
   - URL: http://localhost/Programacion-Web/admin/editar.php?id=X
   - Formulario precargado con datos del contrato
   - Actualización de datos existentes

4. **admin/eliminar.php** - Lógica de eliminación
   - URL: http://localhost/Programacion-Web/admin/eliminar.php?id=X
   - Elimina contrato por ID
   - Redirección al listado

## Medidas de Seguridad Implementadas

### 1. Prevención de SQL Injection
- Uso de consultas preparadas (Prepared Statements)
- Marcadores con nombre (:parametro) en todas las sentencias SQL
- Parámetros vinculados con bindParam()

### 2. Prevención de XSS
- Sanitización de entradas con filter_input()
- Escaping de salidas con htmlspecialchars()
- Validación de tipos de datos

### 3. Validación en Servidor
- Verificación de campos obligatorios
- Validación de formatos (números positivos)
- Longitud mínima de campos de texto

### 4. Manejo de Errores
- Bloques try-catch para capturar excepciones PDO
- Mensajes de error claros para el usuario
- Redirección segura en caso de errores

## Ejemplos de Uso

### Crear un Contrato
```php
POST a admin/crear.php con:
- nombre_cliente: "Juan Pérez"
- tipo_equipo: "Cámaras de Seguridad"
- tarifa_mensual: "1500.00"
```

### Editar un Contrato
```php
GET a admin/editar.php?id=1 (para ver el formulario)
POST a admin/editar.php?id=1 con los datos actualizados
```

### Eliminar un Contrato
```php
GET a admin/eliminar.php?id=1
```

## Requisitos del Sistema

- PHP 7.4 o superior
- MySQL 5.7 o superior
- Extensión PDO habilitada
- Extensión PDO MySQL habilitada

## Troubleshooting

### Error de conexión
- Verifica que MySQL esté corriendo en XAMPP
- Verifica que el usuario y contraseña sean correctos
- Verifica que la base de datos exista

### Error al crear/actualizar
- Verifica que la tabla exista
- Verifica que los campos sean válidos
- Revisa los mensajes de error en pantalla

### Tabla no encontrada
- Ejecuta el script SQL `config/crear_tabla.sql`
- Verifica que la base de datos sea `sis_seguridad`
