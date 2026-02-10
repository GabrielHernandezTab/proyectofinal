<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Usuario;
use App\Models\Administrador;
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
        Usuario::create([
            'id' => $authTest->id,
            'nombre' => 'Test User', // CORREGIDO: 'nombre' en lugar de 'name'
            'email' => $authTest->email,
            'password' => $authTest->password,
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




    }
}