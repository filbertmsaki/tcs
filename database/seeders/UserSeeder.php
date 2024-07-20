<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate([
            'email' => "info@tcs.or.tz",
            'phone' => "+2557123456789",
        ], [
            'first_name' => "TCS",
            'last_name' => "Admin",
            'password' => Hash::make('2024-tcs@!#'),
            'language' => 'en'
        ]);

        $role = Role::whereName('superadministrator')->first();
        $roles =  $user->syncRoles([$role]);
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            $user->givePermission($permission);
        }
    }
}
