<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // Créer des permissions
        $viewMenuPermission = Permission::create(['name' => 'view menu']);
        $editSettingsPermission = Permission::create(['name' => 'edit settings']);
        foreach (['PROFESSEUR', "ETUDIANT", "SUPER-ADMIN"] as $value) {
            $admin = Role::create(['name' => $value]);
            $admin->givePermissionTo($viewMenuPermission);
            $admin->givePermissionTo($editSettingsPermission);
        }

    }
}
