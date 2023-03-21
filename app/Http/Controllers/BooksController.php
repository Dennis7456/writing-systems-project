<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class BooksController extends Controller
{
    public function store(){

        Book::create($this->validateRequest());
    }

    public function update(Book $book){
        
        $book->update($this->validateRequest());
    }

    public function validateRequest(){
        return request()->validate([
            'title' => 'required',
            'author' => 'required'

        ]);
    }
}
