<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBook;
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


    public function store(StoreBook $request)
    {


        $request->except(['_token','files']);
        $user_id = auth()->user()->id;
        $slug = $this->book->slug($request->title);

        $data = [
            'title' => $request->title,
             'slug' => $slug,
             'serie'=>$request->serie,
             'volume'=>$request->volume,
             'page_number'=>$request->page_number,
             'date_start_reading' => $request->date_start_reading,
             'date_end_reading' => $request->date_end_reading,
             'synopses' => $request->synopses,
             'user_id'=> $user_id,
             'author_id' => $request->author_id,
             'editora_id'=> $request->editora_id ,
        ];



         $save =  $this->book->create($data);

         if(!$save){
            return redirect()->back()->with('error', 'Não foi possível cadastrar o Livro');
         }

         return redirect()->route('book.index')->with('success', 'Livro Cadastro com sucesso');


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
