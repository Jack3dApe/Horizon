<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Gera 10 usuários fictícios usando a Factory
        #User::factory()->count(10)->create();
        if (!Role::where('name', 'admin')->exists()) {
            Role::create(['name' => 'admin']);
        };
        if (!Role::where('name', 'clients')->exists()) {
            Role::create(['name' => 'clients']);
        };

        $adminUser =  User::factory()->create([
            'username' => 'admin_user',
            'password' => Hash::make('12345678'),
            'email' => 'admin@admin.com',
            'phone' => '999888777',
            'profile_pic' => 'imgs/user_profile_pics/1735933774_admin_profile_pic.jpg',
            'is_2fa_enabled' => false,
            'status' => 'Active',
        ]);
        $adminUser->assignRole('admin');

        $clientUser = User::factory()->create([
            'username' => 'client_user',
            'password' => Hash::make('12345678'),
            'email' => 'client@client.com',
            'phone' => '999888777',
            'profile_pic' => 'imgs/user_profile_pics/1735933845_client_profile_pic.png',
            'is_2fa_enabled' => false,
            'status' => 'Active',
        ]);
        $clientUser->assignRole('clients');
    }
}
