<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Book,
    Author,
    Editora
};
use Facade\FlareClient\View;

class BookController extends Controller
{
    private $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function index()
    {
       // $books = $this->book->with('author')->paginate();

        return view('admin.book.index');
    }


    public function create()
    {
        $authores =  Author::get();
        $editoras =  Editora::get();



        return view('admin.book.create', compact('authores','editoras'));
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
