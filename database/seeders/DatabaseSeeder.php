<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'email' => 'admin@yayasanvitka.id'
        ], [
            'email' => 'admin@yayasanvitka.id',
            'password' => bcrypt('admin123'),
            'name' => 'System Administrator',
        ]);
    }

}
