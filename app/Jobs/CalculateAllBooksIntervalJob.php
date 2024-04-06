<?php

namespace App\Jobs;

use App\Models\Book;
use App\Models\ReadingInterval;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CalculateAllBooksIntervalJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $books = Book::all();

        foreach ($books as $book) {
            CalculateBookIntervalJob::dispatch($book->id);
        }
    }
}
