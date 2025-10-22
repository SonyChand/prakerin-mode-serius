<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // --- Buat Permissions ---
        // Permission untuk Alumni
        Permission::create(['name' => 'manage alumni']); // Izin untuk CUD
        Permission::create(['name' => 'view alumni']);   // Izin untuk R

        // Permission untuk Logs
        Permission::create(['name' => 'view activity logs']);

        // --- Buat Roles ---
        // Role Admin
        $adminRole = Role::create(['name' => 'Admin']);
        $adminRole->givePermissionTo(Permission::all()); // Admin dapat semua izin

        // Role User
        $userRole = Role::create(['name' => 'User']);
        $userRole->givePermissionTo('view alumni'); // User hanya bisa melihat

        // --- Buat User Admin Default ---
        // Cari user pertama (biasanya yang Anda buat saat registrasi)
        // atau buat baru jika tidak ada.
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@example.com'], // Email unik
            [
                'name' => 'Admin User',
                'password' => bcrypt('password123'), // Ganti dengan password aman
                'email_verified_at' => now(),
            ]
        );
        // Tetapkan role 'Admin' ke user ini
        $adminUser->assignRole($adminRole);

        // --- Buat User Biasa Default (Opsional) ---
        $basicUser = User::firstOrCreate(
            ['email' => 'user@example.com'], // Email unik
            [
                'name' => 'Basic User',
                'password' => bcrypt('password123'), // Ganti dengan password aman
                'email_verified_at' => now(),
            ]
        );
        $basicUser->assignRole($userRole);
    }
}