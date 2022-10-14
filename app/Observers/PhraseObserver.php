<?php

namespace App\Observers;

use App\Models\Phrase;
use Illuminate\Support\Str;

class PhraseObserver
{

    public function creating(Phrase $phrase)
    {
        $phrase->id = Str::uuid();
    }
}
