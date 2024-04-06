<?php

namespace Tests\Unit;

use App\Models\Book;
use App\Models\User;
use Tests\TestCase;

class SubmitIntervalTest extends TestCase
{
    /** @test */
    public function it_submits_reading_interval_and_with_valid_book_return_success_job()
    {
        $user = User::factory()->create();

        $book = Book::factory()->create();
        $requestData = [
            'book_id' => $book->id,
            'start_page' => 10,
            'end_page' => 30,
        ];

        $response = $this->actingAs($user)
            ->postJson('/api/submit-interval', $requestData);
        $response->assertJson(['message' => 'Reading interval submitted successfully']);
    }

    /** @test */
    public function it_submits_reading_interval_and_with_non_valid_book_return_validation_error_job()
    {
        $user = User::factory()->create();

        $requestData = [
            'book_id' => 100,
            'start_page' => 10,
            'end_page' => 30,
        ];

        $response = $this->actingAs($user)
            ->postJson('/api/submit-interval', $requestData);
        $response->assertJsonValidationErrors(['book_id']);
    }
}
