<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        Role::create([
            'id' => 1,
            'nama_role' => 'PELATIHAN'
        ]);
        Role::create([
            'id' => 2,
            'nama_role' => 'AKADEMI'
        ]);

        User::create([
            'name' => 'Admin Pelatihan',
            'email' => 'admin_pelatihan@gmail.com',
            'password' => Hash::make('Pelatihan123'),
            'role_id' => 1
        ]);

        User::create([
            'name' => 'Admin Akademi',
            'email' => 'admin_akademi@gmail.com',
            'password' => Hash::make('Akademi123'),
            'role_id' => 2
        ]);
    }
}
