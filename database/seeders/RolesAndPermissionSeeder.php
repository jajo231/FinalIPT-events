<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'name' => 'Admin',
            'email' => 'montanezkien45@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        $user2 = User::create([
            'name' => 'Client',
            'email' => 'npc23116@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        $viewDashboard = Permission::create(['name' => 'view-dashboard']);
        $viewLogs = Permission::create(['name' => 'view-logs']);
        $create = Permission::create(['name' => 'create']);
        $delete = Permission::create(['name' => 'delete']);

        $user->givePermissionTo($viewDashboard);

        $admin->syncPermissions([
            $viewDashboard
        ]);

        $admin->givePermissionTo($viewLogs);
        $admin->givePermissionTo($create);
        $admin->givePermissionTo($delete);

        $user1->assignRole($admin);
        $user2->assignRole($user);
    }
}
