<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Book;

class BookReservationTest extends TestCase
{
    use RefreshDataBase;
    /** @test */
    public function a_book_can_be_added_to_the_library(){

        $this->withoutExceptionHandling();
        $response = $this->post('/books', [
            'title' =>  'Cool Book Title',
            'author' => 'Dennis'
        ]);

        $response->assertOk();
        $this->assertCount(1, Book::all());
    }

    /** @test */
    public function a_title_is_required(){
        //$this->withoutEXceptionHandling();
        $response = $this->post('/books', [
            'title' =>  '',
            'author' => 'author'
        ]);
        
        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function an_author_is_required(){
        //$this->withoutEXceptionHandling();
        $response = $this->post('/books', [
            'title' =>  'Cool title',
            'author' => ''
        ]);
        
        $response->assertSessionHasErrors('author');
    }

    /** @test */
    public function a_book_can_be_updated(){
        $this->withoutEXceptionHandling();
        $this->post('/books', [
            'title' =>  'Cool title',
            'author' => 'Dennis'
        ]);

        $book = Book::first();

        $response = $this->patch('/books/' . $book->id,[
            'title' => 'New Title',
            'author' => 'Victor'
        ]);
        
        $this->assertEquals('New Title', Book::first()->title);
        $this->assertEquals('Victor', Book::first()->author);
    }
}
