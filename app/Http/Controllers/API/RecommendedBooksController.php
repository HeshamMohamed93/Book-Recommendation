<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;

class RecommendedBooksController extends Controller
{
    public function getRecommendedBooks()
    {
        $recommendedBooks = Book::orderByDesc('num_of_read_pages')
            ->where('num_of_read_pages', '>' , '0')
            ->take(5)
            ->get();

        return BookResource::collection($recommendedBooks);
    }
}
