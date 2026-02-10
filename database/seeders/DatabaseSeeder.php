<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Usuario;
use App\Models\Administrador;

use App\Models\Curso;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // 1. LIMPIAR CACHÉ
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 2. ROLES
        $adminRole = Role::create(['name' => 'admin']);
        $createPermission = Permission::create(['name' => 'create post']);
        $adminRole->givePermissionTo($createPermission);

        // 3. NEREA
        $authNerea = User::create([
            'name' => 'Nerea Fernandez',
            'email' => 'nerea_fernandez@cifpzonzamas.es',
            'password' => Hash::make('12345678'),
        ]);
        $userNerea = Usuario::create([
            'id' => $authNerea->id,
            'nombre' => 'Nerea Fernandez', 
            'email' => $authNerea->email,
            'password' => $authNerea->password,
        ]);
        $authNerea->assignRole($adminRole);

        // 4. JUAN
        $authJuan = User::create([
            'name' => 'Juan',
            'email' => 'juan@cifpzonzamas.es',
            'password' => Hash::make('12345678'),
        ]);
        $userJuan = Usuario::create([
            'id' => $authJuan->id,
            'nombre' => 'Juan',
            'email' => $authJuan->email,
            'password' => $authJuan->password,
        ]);
        $authJuan->assignRole($adminRole);

        // 5. GABRIEL (ADMIN PRINCIPAL)
        $authGabriel = User::create([
            'name' => 'Gabriel',
            'email' => 'gabriel@cifpzonzamas.es',
            'password' => Hash::make('12345678'),
        ]);
        $userGabriel = Usuario::create([
            'id' => $authGabriel->id,
            'nombre' => 'Gabriel',
            'email' => $authGabriel->email,
            'password' => $authGabriel->password,
        ]);
        $authGabriel->assignRole($adminRole);

        // 6. TEST USER (Aquí es donde fallaba antes en la línea 82)
        $authTest = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('12345678'),
        ]);
        $authTest=Usuario::create([
            'id' => $authTest->id,
            'nombre' => 'Test User', 
            'email' => $authTest->email,
            'password' => $authTest->password,
        ]);
        $authJuancarlos=User::create([
            'name' => 'Juan Carlos', 
            'email' => 'juancarlos@cifpzonzamas.es',
            'password' => Hash::make('12345678'),
        ]);
        $authJuancarlos=Usuario::create([
            'id' => $authJuancarlos->id,
            'nombre' => 'Juan Carlos', 
            'email' => $authJuancarlos->email,
            'password' => $authJuancarlos->password,
        ]);

        $authFederico=User::create([
            'name' => 'Federico', 
            'email' => 'federico@cifpzonzamas.es',
            'password' => Hash::make('12345678'),
        ]);
        $authFederico=Usuario::create([
            'id' => $authFederico->id,
            'nombre' => 'Juan Carlos', 
            'email' => $authFederico->email,
            'password' => $authFederico->password,
        ]);

        $authRamon=User::create([
            'name' => 'Ramon', 
            'email' => 'ramon@cifpzonzamas.es',
            'password' => Hash::make('12345678'),
        ]);
        $authRamon=Usuario::create([
            'id' => $authRamon->id,
            'nombre' => 'Juan Carlos', 
            'email' => $authRamon->email,
            'password' => $authRamon->password,
        ]);
        

        // 7. TABLA ADMINISTRADORES
        Administrador::create([
            'usuario_id' => $userNerea->id,
            'rol' => 'Súper Admin'
        ]);
        Administrador::create([
            'usuario_id' => $userJuan->id,
            'rol' => 'Admin'
        ]);
        Administrador::create([
            'usuario_id' => $userGabriel->id,
            'rol' => 'Súper Admin'
        ]);
    
        Curso::create([
            'titulo'=>'GR',
            'descripcion'=>'Este curso ofrece una introducción completa al mundo de las inversiones, ideal para principiantes. Aprenderás conceptos esenciales sobre qué es invertir, cómo funciona el mercado y qué factores influyen en él. Incluye ejemplos prácticos de inversión segura con poco capital, guías sobre aplicaciones de inversión y estrategias de bajo riesgo para iniciarte con confianza. Perfecto para quienes quieren comenzar a invertir sin comprometer grandes recursos.',
            'precio'=>'0',
            'horas'=>'20',
        ]);
        Curso::create([
            'titulo'=>'AV',
            'descripcion'=>'Este curso está diseñado para quienes quieren profundizar en el mundo de las inversiones y mejorar su educación financiera. Con 60 horas de contenido, se imparte de manera progresiva, de menos a más, con vídeos de 2 horas cada dos semanas. Aprenderás sobre diferentes servicios de inversión (recomendado eToro), fuentes fiables de información financiera y estrategias adaptadas a distintos niveles de rentabilidad.Además, el curso cubre tipos de inversión como Value Investing, Day Trading y Dividendos, educación financiera personal y conocimientos clave sobre fiscalidad. Incluye descuento del 15% para jubilados, estudiantes y personas con discapacidad. Ideal para quienes buscan consolidar su independencia financiera con herramientas y conocimientos avanzados.',
            'precio'=>'35',
            'horas'=>'60',
        ]);
        Curso::create([
            'titulo'=>'SP',
            'descripcion'=>'El Pack Supremo está pensado para quienes buscan dominar las inversiones a nivel profesional. Con 100 horas de curso, incluye 3 vídeos nuevos cada semana, clases personalizadas por videoconferencia, análisis profundo de datos y gráficos de inversión mensuales. Cada mes recibirás un informe detallado del progreso y estrategias de inversión avanzadas.Aprenderás análisis técnico y fundamental, gestión y optimización de portafolios, herramientas avanzadas para la toma de decisiones y planificación fiscal avanzada. Después de los primeros 2 meses, el precio se ajusta a 45€/mes. Incluye 30% de descuento para jubilados, estudiantes y personas con discapacidad. Ideal para quienes quieren llevar sus inversiones al siguiente nivel con seguimiento profesional y formación completa.',
            'precio'=>'60',
            'horas'=>'100',
        ]);
    }


    
}