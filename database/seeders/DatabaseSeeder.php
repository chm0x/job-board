<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employer;
use App\Models\OfferedJob;
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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(300)->create();

        $users = User::all()->shuffle();

        for($i = 0; $i < 20; $i++)
        {
            Employer::factory()->create([
                'user_id' => $users->pop()->id
            ]);
        }

        // OfferedJob::factory(100)->create();
        $employers = Employer::all();

        for($i = 0; $i < 100; $i++)
        {
            OfferedJob::factory()->create([
                'employer_id' => $employers->random()->id
            ]);
        }
    }
}
