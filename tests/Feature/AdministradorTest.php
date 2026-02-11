<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdministradorTest extends TestCase
{
    use RefreshDatabase; // Esto limpia la base de datos en cada prueba

  #[Test]
    public function un_administrador_puede_ver_el_panel_de_gestion()
    {
        // 1. PREPARACIÓN (Arrangement)
        // Creamos el rol y un usuario admin
        $role = Role::create(['name' => 'admin']);
        $admin = User::create([
            'nombre' => 'Admin Test',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'rol' => 'Admin'
        ]);
        $admin->assignRole($role);

        // 2. ACCIÓN (Acting)
        // Intentamos entrar a la ruta de administradores logueados como ese admin
        $response = $this->actingAs($admin)->get('/admin/administradores');

        // 3. VERIFICACIÓN (Assertion)
        // Comprobamos que la página carga bien (status 200) y vemos el texto
        $response->assertStatus(200);
        $response->assertSee('Gestión de Administradores');
    }

  #[Test]
    public function un_usuario_sin_rol_no_puede_ver_el_panel_de_gestion()
    {
        // Creamos un usuario normal sin rol de admin
        $user = User::create([
            'nombre' => 'Usuario Normal',
            'email' => 'user@test.com',
            'password' => bcrypt('password'),
            'rol' => 'Usuario'
        ]);

        // Intentamos entrar
        $response = $this->actingAs($user)->get('/admin/administradores');

        // Debería darnos un error de prohibido (403)
        $response->assertStatus(403);
    }
}