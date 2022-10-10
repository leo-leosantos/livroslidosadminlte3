<?php

namespace App\Observers;
use App\Models\Editora;
use Illuminate\Support\Str;
class EditoraObserver
{
    public function creating(Editora $editora)
    {
        $editora->id = Str::uuid();
    }
}
