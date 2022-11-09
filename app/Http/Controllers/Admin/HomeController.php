<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Book,
    Editora,
    Author,
    Phrase
};
class HomeController extends Controller
{
    public  function index()
    {
        $books = Book::count();
        $editoras = Editora::count();
        $authores = Author::count();
        $pagesread = Book::sum('page_number');
        $phrase = Phrase::select('phrase','author_phrase')->where('active','=',1)->first();


      
        return view('admin.home.index', compact('books', 'editoras','authores','pagesread','phrase'));
    }
}
