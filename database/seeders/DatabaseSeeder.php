<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('rahasia'),
            'role' => 'admin',
            'email' => 'admin@hipmijambi.org',
            'tgl_lahir' => '1990-01-01'
        ]);

        PostCategory::create([
            'name' => 'Uncategorized',
        ]);
    }
}
