<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
// Eliminamos el uso de App\Models\Usuario porque User ya escribe en esa tabla
use App\Models\Administrador;
use App\Models\Curso;
use App\Models\Donante;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // 1. LIMPIAR CACHÉ
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

    // 2. ROLES DE SPATIE
    $adminRole = Role::create(['name' => 'admin']);
    $createPermission = Permission::create(['name' => 'create post']);
    $adminRole->givePermissionTo($createPermission);

    // 3, 4, 5. NEREA, JUAN y GABRIEL (Añadido el campo 'rol' para la tabla usuarios)
    $authNerea = User::create([
        'nombre' => 'Nerea Fernandez',
        'email' => 'nerea_fernandez@cifpzonzamas.es',
        'password' => Hash::make('12345678'),
        'rol' => 'Súper Admin', // <--- IMPORTANTE
    ]);
    $authNerea->assignRole($adminRole);

    $authJuan = User::create([
        'nombre' => 'Juan',
        'email' => 'juan@cifpzonzamas.es',
        'password' => Hash::make('12345678'),
        'rol' => 'Admin', // <--- IMPORTANTE
    ]);
    $authJuan->assignRole($adminRole);

    $authGabriel = User::create([
        'nombre' => 'Gabriel',
        'email' => 'gabriel@cifpzonzamas.es',
        'password' => Hash::make('12345678'),
        'rol' => 'Súper Admin', // <--- IMPORTANTE
    ]);
    $authGabriel->assignRole($adminRole);

    // 6. USUARIOS DE PRUEBA (También necesitan el campo 'rol')
    User::create([
        'nombre' => 'Test User',
        'email' => 'test@example.com',
        'password' => Hash::make('12345678'),
        'rol' => 'Usuario', // <--- O el valor que quieras por defecto
    ]);

    User::create([
        'nombre' => 'Juan Carlos', 
        'email' => 'juancarlos@cifpzonzamas.es',
        'password' => Hash::make('12345678'),
        'rol' => 'Usuario',
    ]);

    User::create([
        'nombre' => 'Federico', 
        'email' => 'federico@cifpzonzamas.es',
        'password' => Hash::make('12345678'),
        'rol' => 'Usuario',
    ]);

    User::create([
        'nombre' => 'Ramon', 
        'email' => 'ramon@cifpzonzamas.es',
        'password' => Hash::make('12345678'),
        'rol' => 'Usuario',
    ]);

        // 7. TABLA ADMINISTRADORES (Usamos el ID del usuario que creamos arriba)
        Administrador::create([
            'usuario_id' => $authNerea->id,
            'rol' => 'Súper Admin'
        ]);
        Administrador::create([
            'usuario_id' => $authJuan->id,
            'rol' => 'Admin'
        ]);
        Administrador::create([
            'usuario_id' => $authGabriel->id,
            'rol' => 'Súper Admin'
        ]);

        // 8. CURSOS
        $cursos = [
            ['titulo' => 'GR', 'descripcion' => 'Este curso ofrece una introducción completa al mundo de las inversiones, ideal para principiantes. Aprenderás conceptos esenciales sobre qué es invertir, cómo funciona el mercado y qué factores influyen en él. Incluye ejemplos prácticos de inversión segura con poco capital, guías sobre aplicaciones de inversión y estrategias de bajo riesgo para iniciarte con confianza. Perfecto para quienes quieren comenzar a invertir sin comprometer grandes recursos.', 'precio' => 0, 'horas' => '20'],
            ['titulo' => 'AV', 'descripcion' => 'Este curso está diseñado para quienes quieren profundizar en el mundo de las inversiones y mejorar su educación financiera. Con 60 horas de contenido, se imparte de manera progresiva, de menos a más, con vídeos de 2 horas cada dos semanas. Aprenderás sobre diferentes servicios de inversión (recomendado eToro), fuentes fiables de información financiera y estrategias adaptadas a distintos niveles de rentabilidad.Además, el curso cubre tipos de inversión como Value Investing, Day Trading y Dividendos, educación financiera personal y conocimientos clave sobre fiscalidad. Incluye descuento del 15% para jubilados, estudiantes y personas con discapacidad. Ideal para quienes buscan consolidar su independencia financiera con herramientas y conocimientos avanzados.', 'precio' => 35, 'horas' => '60'],
            ['titulo' => 'SP', 'descripcion' => 'El Pack Supremo está pensado para quienes buscan dominar las inversiones a nivel profesional. Con 100 horas de curso, incluye 3 vídeos nuevos cada semana, clases personalizadas por videoconferencia, análisis profundo de datos y gráficos de inversión mensuales. Cada mes recibirás un informe detallado del progreso y estrategias de inversión avanzadas.Aprenderás análisis técnico y fundamental, gestión y optimización de portafolios, herramientas avanzadas para la toma de decisiones y planificación fiscal avanzada. Después de los primeros 2 meses, el precio se ajusta a 45€/mes. Incluye 30% de descuento para jubilados, estudiantes y personas con discapacidad. Ideal para quienes quieren llevar sus inversiones al siguiente nivel con seguimiento profesional y formación completa.', 'precio' => 60, 'horas' => '100'],            
        ];

        foreach ($cursos as $curso) {
            Curso::create($curso);
        }
    


        // Donante 1
        Donante::create([
            'usuario_id' => 4,        // Reemplaza con el ID de usuario correspondiente
            'edad'       => 28,
            'importe'    => 150,
            'iban'       => 'ES9121000418450200051332',
            'valoracion' => 'PR', // 5 estrellas
        ]);

        // Donante 2
        Donante::create([
            'usuario_id' => 5,
            'edad'       => 35,
            'importe'    => 200,
            'iban'       => 'ES7921000813610123456789',
            'valoracion' => 'PL', // 3 estrellas
        ]);

        // Donante 3
        Donante::create([
            'usuario_id' => 7,
            'edad'       => 42,
            'importe'    => 500,
            'iban'       => 'ES9821000418401234567891',
            'valoracion' => 'OR', // 4 estrellas
        ]);

}}