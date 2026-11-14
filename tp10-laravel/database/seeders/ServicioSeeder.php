<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    public function run(): void
    {
        $servicios = [
            ['nombre' => 'Cámaras de Seguridad (CCTV)', 'descripcion' => 'Videovigilancia profesional HD/4K para interior y exterior con acceso remoto seguro, visión nocturna y detección de movimiento.', 'imagen' => 'camara.webp'],
            ['nombre' => 'Alarmas Inteligentes', 'descripcion' => 'Protección activa con sensores, sirenas y avisos al celular ante eventos. Sensores inmunes a mascotas y contactos magnéticos.', 'imagen' => 'alarma.webp'],
            ['nombre' => 'Control de Accesos', 'descripcion' => 'Gestión de quién entra y sale del edificio con sistemas biométricos, RFID, cerraduras magnéticas y software de administración.', 'imagen' => 'acceso.webp'],
            ['nombre' => 'Cercos Eléctricos Perimetrales', 'descripcion' => 'Disuasión perimetral con cables de acero galvanizado y descarga pulsada no letal, con activación inmediata de alarma.', 'imagen' => 'cerco.webp'],
            ['nombre' => 'Seguimiento Vehicular (GPS)', 'descripcion' => 'Monitoreo de flota o vehículo particular con ubicación satelital en tiempo real, geocercas e historial de recorridos.', 'imagen' => 'rastreo.webp'],
            ['nombre' => 'Sistemas contra Incendios', 'descripcion' => 'Detección temprana con detectores de humo y temperatura, estaciones manuales, sirenas con strobo y mantenimiento periódico.', 'imagen' => 'fuego.webp'],
        ];

        foreach ($servicios as $servicio) {
            Servicio::create($servicio);
        }
    }
}
