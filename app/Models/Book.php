<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;


    protected $fillable = [
        'title', 'slug', 'serie', 'volume', 'page_number', 'date_start_reading', 'date_end_reading',
        'synopses', 'user_id', 'author_id', 'editora_id'];


  //  protected $fillable = ['title','date_start_reading','synopses','user_id','author_id','editora_id'];

    public $incrementing = false;
    protected $keyType = 'string';

    protected $casts = [
        'id' => 'string',
    ];


    public function slug($title)
    {

        $slug = Str::slug($title . '-' . random_int(0, 5));

        return $slug;
    }

    public function editora()
    {
        return $this->belongsTo(Editora::class);
    }
}
