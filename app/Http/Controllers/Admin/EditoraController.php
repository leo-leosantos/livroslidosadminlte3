<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEditora;
use App\Http\Requests\UpdateEditora;
use App\Models\Editora;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class EditoraController extends Controller
{


    private $editora;
    public function __construct(Editora $editora)
    {
        $this->editora = $editora;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $editoras =  $this->editora->with('user')->get();



        return View('admin.editora.index', compact('editoras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.editora.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEditora $request)
    {

        $name_editora = $request->name_editora;
        $user_id  = auth()->user()->id;


        $data =  [
            'name_editora' => $name_editora,
            'user_id' => $user_id
        ];

        if (!$data) {

            return redirect()->back()->with('error', 'Não foi possível cadastrar a editora');
        }


        $this->editora->create($data);

        return redirect()->route('editora.index')->with('success', 'Nova Editora Cadastrada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $editora = $this->editora->find($id);

        if (!$editora) {
            return redirect()->back()->with('error', 'Não foi possível encontrar a editora');
        }


        return view('admin.editora.show', compact('editora'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editora = $this->editora->find($id);

        if (!$editora) {
            return redirect()->back()->with('error', 'Não foi possível encontrar a editora');
        }
        return view('admin.editora.edit', compact('editora'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEditora $request, Editora $editora)
    {

        $id = $editora->id;

        $editora = $this->editora->find($id);

        if (!$editora) {
            return redirect()->back()->with('error', 'Não foi possível encontrar a editora');
        }

        $name_editora = $request->name_editora;
        $user_id  = auth()->user()->id;


        $data =  [
            'id'=> $id,
            'name_editora' => $name_editora,
            'user_id' => $user_id
        ];

        $save =  $this->editora->fill($data)->save();
       // $save = $editora->fill($data)->save();


        if (!$save) {
            return redirect()->back()->with('error', 'Não foi possível atualizar a Editora');
        } else {
            return redirect()->route('editora.index')->with('success', 'Editora Atualizada com sucesso');
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

        $editora = $this->editora->find($id);

        if (!$editora) {
            return redirect()->back()->with('error', 'Não foi possível encontrar a editora');
        }

        $this->editora->destroy($id);
        return redirect()->route('editora.index')->with('success', 'Editora Excluida com sucesso');


    }
}
