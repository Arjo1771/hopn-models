<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed a test user (optional)
        //User::factory()->create([
          //  'name' => 'Test User',
            //'email' => 'test@example.com',
        //]);

        // ✅ Call the AdminSeeder
        $this->call([
            AdminSeeder::class,
        ]);
    }
}
