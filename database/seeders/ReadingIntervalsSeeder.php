<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\ReadingInterval;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReadingIntervalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $books = Book::all();

        foreach ($users as $user) {
            foreach ($books as $book) {
                $startPage = rand(1, 50);
                $endPage = $startPage + rand(5, 20);

                ReadingInterval::create([
                    'user_id' => $user->id,
                    'book_id' => $book->id,
                    'start_page' => $startPage,
                    'end_page' => $endPage,
                ]);
            }
        }
    }
}
