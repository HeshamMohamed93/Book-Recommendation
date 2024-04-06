<?php

namespace Tests\Unit;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecommendBookTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_top_5_recommended_books()
    {
        $user = User::factory()->create();

        Book::factory()->create(['num_of_read_pages' => 100]);
        Book::factory()->create(['num_of_read_pages' => 90]);
        Book::factory()->create(['num_of_read_pages' => 80]);
        Book::factory()->create(['num_of_read_pages' => 70]);
        Book::factory()->create(['num_of_read_pages' => 60]);
        Book::factory()->create(['num_of_read_pages' => 50]);
        Book::factory()->create(['num_of_read_pages' => 40]);
        Book::factory()->create(['num_of_read_pages' => 30]);


        $response = $this->actingAs($user)
            ->getJson('/api/recommended-books');

        $response->assertStatus(200)
            ->assertJsonCount(5, 'data')
            ->assertJsonFragment(['num_of_read_pages' => 100])
            ->assertJsonFragment(['num_of_read_pages' => 90])
            ->assertJsonFragment(['num_of_read_pages' => 80])
            ->assertJsonFragment(['num_of_read_pages' => 70])
            ->assertJsonFragment(['num_of_read_pages' => 60]);
    }
}
