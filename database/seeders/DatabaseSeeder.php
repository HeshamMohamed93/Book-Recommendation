<?php

namespace Database\Seeders;

use App\Jobs\CalculateAllBooksIntervalJob;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
            BooksSeeder::class,
            ReadingIntervalsSeeder::class
        ]);

        CalculateAllBooksIntervalJob::dispatch()->afterCommit();
    }
}
