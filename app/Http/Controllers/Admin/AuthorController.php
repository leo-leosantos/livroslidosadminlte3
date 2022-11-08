<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuthor;
use App\Http\Requests\UpdateAuthor;
use Illuminate\Http\Request;
use App\Models\Author;
use Facade\FlareClient\View;
class AuthorController extends Controller
{

    private $author;
    public function __construct(Author $author)
    {
        $this->author = $author;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authores = $this->author->paginate();



        return view('admin.author.index', compact('authores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthor $request)
    {
        $name_author = $request->name_author;
        $user_id  = auth()->user()->id;


        $data =  [
            'name_author' => $name_author,
            'user_id' => $user_id
        ];

        if (!$data) {

            return redirect()->back()->with('error', 'Não foi possível cadastrar o author');
        }


        $this->author->create($data);



        return redirect()->route('author.index')->with('success', 'Authro Cadasrado cm Sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = $this->author->find($id);

        if (!$author) {
            return redirect()->back()->with('error', 'Não foi possível encontrar o author');
        }


        return view('admin.author.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = $this->author->find($id);

        if (!$author) {
            return redirect()->back()->with('error', 'Não foi possível encontrar o author');
        }
        return view('admin.author.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthor $request, $id)
    {

        $author = $this->author->find($id);

        if (!$author) {
            return redirect()->back()->with('error', 'Não foi possível encontrar o author');
        }

        $name_author = $request->name_author;

        $user_id  = auth()->user()->id;

        $data =  [
            'id' => $id,
            'name_author' => $name_author,
            'user_id' => $user_id
        ];

        $save = $author->fill($data)->save();


        if (!$save) {
            return redirect()->back()->with('error', 'Não foi possível atualizar o author');
        } else {
            return redirect()->route('author.index')->with('success', 'Author Atualizado com sucesso');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = $this->author->find($id);

        if (!$author) {
            return redirect()->back()->with('error', 'Não foi possível encontrar o author');
        }

        $delete = $author->delete();

        if (!$delete) {
            return redirect()->back()->with('error', 'Não foi possível excluir o author');
        } else {
            return redirect()->route('author.index')->with('success', 'Author excluido com sucesso');
        }

    }
}
