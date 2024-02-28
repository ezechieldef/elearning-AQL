<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::find(1);
        $role->permissions()->attach([1]);

        $role = Role::find(2);
        $role->permissions()->attach([2]);

        $role = Role::find(3);
        $role->permissions()->attach([3]);

    }
}
