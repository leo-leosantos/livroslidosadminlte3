<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePhraseMotivacional;
use Illuminate\Http\Request;
use App\Models\Phrase;

class PhraseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $phrase;
    public function __construct(Phrase $phrase)
    {
        $this->phrase = $phrase;
    }
    public function index()
    {
        $phrases = $this->phrase->paginate();
        return view('admin.phrase.index', compact('phrases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.phrase.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePhraseMotivacional $request)
    {

        $data = $request->all();

        $this->phrase->create($data);

        if (!$data) {

            return redirect()->back()->with('error', 'Não foi possível cadastrar a frase');
        }

        return  redirect()->route('phrase.index')->with('success', 'Nova Frase foi Cadastrada com sucesso');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $phrase = $this->phrase->find($id);



        if (!$phrase) {
            return redirect()->back()->with('error', 'Não foi possível encontrar a frase');
        }


        return view('admin.phrase.show', compact('phrase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phrase = $this->phrase->find($id);

        if (!$phrase) {
            return redirect()->back()->with('error', 'Não foi possível encontrar a editora');
        }
        return view('admin.phrase.edit', compact('phrase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePhraseMotivacional $request, $id)
    {

        $data =  $request->only(['phrase', 'author_phrase']);

        $phrase = $this->phrase->find($id);


        if (!$phrase) {
            return redirect()->back()->with('error', 'Não foi possível encontrar a frase');
        }

        $phraseMotivacional = $request->phrase;
        $author_phrase = $request->author_phrase;

        $data =  [
            'id'=> $id,
            'phrase' => $phraseMotivacional,
            'author_phrase' => $author_phrase
        ];



        $save =  $this->phrase->fill($data)->save();
       // $save = $phrase->fill($data)->save();



        if (!$save) {
            return redirect()->back()->with('error', 'Não foi possível atualizar a Frase');
        } else {
            return redirect()->route('phrase.index')->with('success', 'Frase Atualizada com sucesso');
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
        //
    }
}
