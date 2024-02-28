<?php

namespace Database\Seeders;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create permissions
        $permissions = [
            [
                'id'    => 1,
                'name_permission'  => 'Sidebar_superAdmin',
            ],
            [
                'id'    => 2,
                'name_permission'  => 'Sidebar_Professeur',
            ],
            [
                'id'    => 3,
                'name_permission'  => 'Sidebar_Etudiant',
            ],
        ];

        Permission::insert($permissions);

        // foreach ($permissions as $permission){
        //     Permission::create($permission);
        // }


    }
}
