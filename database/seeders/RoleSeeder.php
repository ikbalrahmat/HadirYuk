<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     // Buat role admin & user
    //     $admin = Role::firstOrCreate(['name' => 'admin']);
    //     $user = Role::firstOrCreate(['name' => 'user']);

    //     // Daftar permission (berdasarkan sidebar/menu)
    //     $permissions = [
    //         'akses.dashboard',
    //         'akses.user',
    //         'akses.undangan',
    //         'akses.susunan',
    //         'akses.rapat',
    //         'akses.materi',
    //         'akses.absensi',
    //         'akses.risalah',
    //         'akses.kuis',
    //         'akses.survey',
    //         'akses.anggaran',
    //         'akses.konsumsi',
    //         'create.konsumsi',
    //         'update.konsumsi',
    //         'delete.konsumsi',
    //         'export.konsumsi',
    //     ];

    //     // Buat permission satu per satu
    //     foreach ($permissions as $permission) {
    //         Permission::firstOrCreate(['name' => $permission]);
    //     }

    //     // Berikan semua permission ke role admin
    //     $admin->syncPermissions($permissions);

    //     // Role user tidak diberi permission awal (diatur saat tambah user)
    // }

    // public function run(): void
    // {
    //     // Buat role
    //     $admin = Role::firstOrCreate(['name' => 'admin']);
    //     $user = Role::firstOrCreate(['name' => 'user']);
    //     $yanumKarawang = Role::firstOrCreate(['name' => 'yanum-karawang']);
    //     $yanumJakarta = Role::firstOrCreate(['name' => 'yanum-jakarta']);

    //     // Daftar permission
    //     $permissions = [
    //         'akses.dashboard',
    //         'akses.user',
    //         'akses.undangan',
    //         'akses.susunan',
    //         'akses.rapat',
    //         'akses.materi',
    //         'akses.absensi',
    //         'akses.risalah',
    //         'akses.kuis',
    //         'akses.survey',
    //         'akses.anggaran',
    //         'akses.konsumsi',
    //         'create.konsumsi',
    //         'update.konsumsi',
    //         'delete.konsumsi',
    //         'export.konsumsi',
    //     ];

    //     foreach ($permissions as $permission) {
    //         Permission::firstOrCreate(['name' => $permission]);
    //     }

    //     // Admin punya semua permission
    //     $admin->syncPermissions($permissions);

    //     // Yanum bisa disesuaikan, contoh: punya semua akses konsumsi
    //     $yanumKarawang->syncPermissions([
    //         'akses.dashboard',
    //         'akses.konsumsi',
    //         'create.konsumsi',
    //         'update.konsumsi',
    //         'delete.konsumsi',
    //         'export.konsumsi',
    //     ]);

    //     // User default kosong
    // }
    public function run(): void
{
    $admin = Role::firstOrCreate(['name' => 'admin']);
    $user = Role::firstOrCreate(['name' => 'user']);
    $yanumKarawang = Role::firstOrCreate(['name' => 'yanum_karawang']);
    $yanumJakarta = Role::firstOrCreate(['name' => 'yanum_jakarta']);

    $permissions = [
        'akses.dashboard',
        'akses.user',
        'akses.undangan',
        'akses.agenda',
        'akses.rapat',
        'akses.materi',
        'akses.absensi',
        'akses.risalah',
        'akses.kuis',
        'akses.survey',
        'akses.anggaran',
        'akses.konsumsi',
        'create.konsumsi',
        'update.konsumsi',
        'delete.konsumsi',
        'export.konsumsi',
    ];


    foreach ($permissions as $permission) {
        Permission::firstOrCreate(['name' => $permission]);
    }

    // Admin punya semua permission
    $admin->syncPermissions($permissions);

    // User default: kosong
    // Yanum default: kosong juga
}


}
