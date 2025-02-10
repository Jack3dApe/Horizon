<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use Spatie\Permission\Models\Role;

class ReviewSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        if (!Role::where('name', 'clients')->exists()) {
            Role::create(['name' => 'clients']);
        };
        $clientUsers = User::factory()->count(50)->create([
            'created_at' => function () {
                return Carbon::now()->subDays(rand(0, 90))->format('Y-m-d H:i:s');
            },
            'updated_at' => function ($attributes) {
                return $attributes['created_at'];
            },
            'profile_pic' => 'imgs/user_profile_pics/default.jpg',

        ]);
        $clientUsers->each(function ($user) {
            $user->assignRole('clients');
        });

        Review::factory()->count(239)->create([
            'review_date' => function () {
                return Carbon::now()->subDays(rand(0, 90))->format('Y-m-d');
            },
            'id_user' => function () {
                return User::inRandomOrder()->first()->id_user;
            },
        ]);
    }

}
