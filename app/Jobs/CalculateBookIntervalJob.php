<?php

namespace App\Jobs;

use App\Models\Book;
use App\Models\ReadingInterval;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CalculateBookIntervalJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $bookId;

    public function __construct($bookId)
    {
        $this->bookId = $bookId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $readingIntervals = ReadingInterval::where('book_id', $this->bookId)->get();
        $book = Book::find($this->bookId);

        if ($book && count($readingIntervals) > 0) {
            $uniquePagesRead = [];

            foreach ($readingIntervals as $interval) {
                for ($page = $interval->start_page; $page <= $interval->end_page; $page++) {
                    $uniquePagesRead[$page] = true;
                }
            }
            $book->num_of_read_pages = count($uniquePagesRead);
            $book->save();
        }
    }
}
