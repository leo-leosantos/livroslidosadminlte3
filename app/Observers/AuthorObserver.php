<?php

namespace App\Observers;
use App\Models\Author;
use Illuminate\Support\Str;
class AuthorObserver
{
    public function creating(Author $author)
    {
        $author->id = Str::uuid();
    }
}
