<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesSeeder::class);

        $user = User::create([
            'name'                      =>'Super Admin',
            'email'                     =>'admin@general.com',
            'password'                  =>Hash::make('9449'),
            'email_verified_at'         =>now()
        ]);

        $user->assignRole('admin');
    }
}
