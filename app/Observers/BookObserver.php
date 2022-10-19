<?php

namespace App\Observers;

use App\Models\Book;
use Illuminate\Support\Str;

class BookObserver
{

    public function creating(Book $book)
    {
        $book->id = Str::uuid();
    }


}
