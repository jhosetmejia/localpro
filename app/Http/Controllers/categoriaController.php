<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriaRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Models\Caracteristica;
use Exception;


class categoriaController extends Controller
{
    /** 
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('categoria.index');
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoriaRequest $request)
    {
        // recibimos los datos del formulario y los validamos po podemos hacer aqui en el controlador o mediante una clase 
        //dd($request);

        try{
            DB::beginTransaction();
            $caracteristica = Caracteristica::create($request->validated());
            $caracteristica->categoria()->create([
                'caracteristica_id' => $caracteristica->id
            ]);
            DB::comit();

        }catch(Exception $e){
            DB::rollback();
        }
        return redirect()->route('categorias.index')->with('success', 'Categoría registrada');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
