<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Channel;
use App\Models\News;
use App\Models\Program;
use App\Models\Series;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@livejock.com',
        //     'password' => 'Admin3@1123',
        //     'phone' => '1234567890',
        //     'is_admin' => true,
        // ]);
        // Channel::factory(rand(8,90))->create();
        // Program::factory(rand(8,90))->create();
        // Series::factory(rand(8,90))->create();

        for ($i = 0; $i < 100; $i++) {
            News::create(
                [
                    'title' => 'News Title ' . $i,
                    'content' => 'News Content ' . $i,
                    'is_important' => rand(0, 1),
                    'cover' => 'news/' . rand(1, 10) . '.jpg',
                ]
            );
        }
    }
}
