<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::factory()->create([
            'name' => 'Test account',
            'email' => 'test@example.com',
            'password' => Hash::make('test'),
        ]);
        $admin->assignRole('admin');

        $users = User::factory()->count(10)->create();
        foreach ($users as $user) {
            $user->assignRole('user');
        }
    }
}
