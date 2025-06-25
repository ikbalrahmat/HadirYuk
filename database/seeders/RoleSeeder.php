<?php

// namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;

// class RoleSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run()
//     {
//         Role::create(['name' => 'admin']);
//         Role::create(['name' => 'user']);
//     }
// }


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat role admin & user
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $user = Role::firstOrCreate(['name' => 'user']);

        // Daftar permission (berdasarkan sidebar/menu)
        $permissions = [
            'akses.dashboard',
            'akses.user',
            'akses.undangan',
            'akses.susunan',
            'akses.rapat',
            'akses.materi',
            'akses.absensi',
            'akses.risalah',
            'akses.kuis',
            'akses.survey',
            'akses.kalkulator',
            'akses.konsumsi',
        ];

        // Buat permission satu per satu
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Berikan semua permission ke role admin
        $admin->syncPermissions($permissions);

        // Role user tidak diberi permission awal (diatur saat tambah user)
    }
}
