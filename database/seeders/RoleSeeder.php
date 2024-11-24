<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Role::create(['name' => 'SuperAdmin']);
        Role::create(['name' => 'Driver']);
        Role::create(['name' => 'Client']);

        
    }
}