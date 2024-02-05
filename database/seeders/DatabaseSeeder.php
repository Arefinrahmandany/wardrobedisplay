<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Admin::create([
            'name'      => 'Arefin Rahman',
            'email'     => 'arefinrahman.dany@gmail.com',
            'cell'     => '01913369287',
            'username'        => 'arefin',
            'password'  => Hash::make('arefin44'),
        ]);
    }
}
