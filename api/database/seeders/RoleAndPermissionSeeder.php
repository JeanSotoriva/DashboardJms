<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create_users']);
        Permission::create(['name' => 'edit_users']);
        Permission::create(['name' => 'delete_users']);

        Permission::create(['name' => 'create_colaborators']);
        Permission::create(['name' => 'edit-colaborators']);
        Permission::create(['name' => 'delete_colaborators']);

        $adminRole = Role::create(['name' => 'Admin']);
        $colaboratorRole = Role::create(['name' => 'Colaborator']);

        $adminRole->givePermissionTo([
            'create_users',
            'edit_users',
            'delete_users',
            'create_colaborators',
            'edit_colaborators',
            'delete_colaborators',
        ]);

        $colaboratorRole->givePermissionTo([
            'create-blog-posts',
            'edit-blog-posts',
            'delete-blog-posts',
        ]);
    }
}
