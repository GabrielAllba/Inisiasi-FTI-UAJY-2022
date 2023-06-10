<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::factory(10)->create();

        \App\Models\Admin::factory()->create([
            'name' => 'admin',
            'email' => 'inisiasiftiuajy@gmail.com',
            'email_verified_at' => NULL,
            'password'=> Hash::make('Ftiuajyinisiasi2022@)@@'),
            'profile_photo_path'=>NULL,
            'remember_token'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ]);
    }
}
