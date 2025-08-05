<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'role_name' => 'Admin',
            'description' => 'Administrator with full access'
        ]);

        Role::create([
            'role_name' => 'Author',
            'description' => 'Can create and manage posts'
        ]);

        Role::create([
            'role_name' => 'Subscriber',
            'description' => 'Can view and comment on posts'
        ]);
    }
}
