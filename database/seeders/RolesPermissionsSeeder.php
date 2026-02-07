<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $abilities = [
            'read',
            'write',
            'create',
        ];

        // Full permissions list for both admin and developer
        $all_permissions = [
            'user management',
            'content management',
            'financial management',
            'reporting',
            'payroll',
            'disputes management',
            'api controls',
            'database management',
            'repository management',
        ];

        // Create all permissions
        foreach ($all_permissions as $permission) {
            foreach ($abilities as $ability) {
                Permission::create(['name' => $ability . ' ' . $permission]);
            }
        }

        // Create full permissions list
        $full_permissions_list = [];
        foreach ($abilities as $ability) {
            foreach ($all_permissions as $permission) {
                $full_permissions_list[] = $ability . ' ' . $permission;
            }
        }

        // Create admin role with full permissions
        Role::create(['name' => 'admin'])->syncPermissions($full_permissions_list);

        // Create developer role with full permissions
        Role::create(['name' => 'developer'])->syncPermissions($full_permissions_list);

        // Assign roles to users
        User::find(1)->assignRole('admin');
        User::find(2)->assignRole('developer');
    }
}
